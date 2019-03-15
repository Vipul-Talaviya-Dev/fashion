<?php

namespace App\Http\Controllers\User;

use Auth;
use Mail;
use Session;
use Validator;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    protected $salt = '';
    protected $hash = '';
	protected $parameters = array();
    protected $testMode = false;
    protected $merchantKey = '';
    protected $liveEndPoint = '';
    protected $testEndPoint = '';
    public $response = '';

    function __construct()
    {
    	$this->liveEndPoint = env('LIVE_PAYMENT_URL');
	    $this->testEndPoint = env('TEST_PAYMENT_URL');
        $this->merchantKey = env('MERCHANT_KEY');
        $this->salt = env('MERCHANT_SALT');
        $this->testMode = env('TEST_MODE');
        $this->parameters['key'] = $this->merchantKey;
        $this->parameters['txnid'] = $this->generateTransactionID();
        $this->parameters['surl'] = route('user.paymentsuccess');
        $this->parameters['furl'] = route('user.paymentfailure');
        $this->parameters['service_provider'] = 'payu_paisa';
    }

	public function orderConfirm()
	{
		if(Session::get('orderId') == null) {
    		return redirect(route('user.index'));
    	}
        $order = Order::with(['orderProducts.product'])->find(Session::get('orderId'));
        $user = Auth::user();
        $productNames = [];
        foreach ($order->orderProducts as $orderProduct) {
        	$productNames[] = $orderProduct->product->name;
        }

		$parameters = [
            'key' => $this->merchantKey,
            // 'txnid' => $this->generateTransactionID(),
            'txnid' => $order->orderId(),
            'surl' => route('user.paymentsuccess'),// this is the name of my route
            'furl' => route('user.paymentfailure'),//this is the name of my route
            'firstname' => $user->name,
            'email' => $user->email,
            'phone' => $user->mobile,
            'productinfo' => implode(',', $productNames),
            'service_provider' => 'payu_paisa',
            'amount' => $order->cart_amount,
      ];

      $order = $this->request($parameters);
      return $order->send();
	}

	public function paymentResponse(Request $request)
    {
    	if(Session::get('orderId') == null) {
    		return redirect(route('user.index'));
    	}

    	$order = Order::with(['orderProducts.product.variations'])->find(Session::get('orderId'));

    	if ($request->get('txnid')) {
    		$response = $this->response($request);
    		$order->payment_response = json_encode($response);

    		if($response['status'] == 'failure') {
    			$order->payment_status = 1;
    			$order->status = 8;
    		}

    		if($response['status'] == 'success') {
    			$order->payment_status = 2;
    			$order->status = 3;
    		}
    		$order->save();
    	}
    	return redirect(route('user.thanks'));
    }

    public function thanks(Request $request)
    {
    	if(Session::get('orderId') == null) {
    		return redirect(route('user.index'));
    	}

    	$order = Order::with(['orderProducts.product.variations'])->find(Session::get('orderId'));
    	$user = Auth::user();
        $address = $user->addresses()->find($order->address_id);

        Mail::send('user.email.order-place', [
            'order' => $order,
            'user' => $user,
            'address' => $address
        ], function ($message) use ($user) {
            $message->from('vipulpatel1152@gmail.com', 'Developer Mail')
                ->subject('Order Placed')
                ->to($user->email, $user->name);
        });

        Session::forget('orderId');

    	return view('user.thanks', [
    		'order' => $order,
            'user' => $user,
            'address' => $address,
            'cart' => false,
            'footer' => true
    	]);
    }

    public function getEndPoint()
    {
        return $this->testMode?$this->testEndPoint:$this->liveEndPoint;
    }
    public function request($parameters)
    {
        $this->parameters = array_merge($this->parameters,$parameters);
        $this->checkParameters($this->parameters);
        $this->encrypt();
        return $this;
    }
    /**
     * @return mixed
     */
    public function send()
    {
        Log::info('Indipay Payment Request Initiated: ');
        return view('user.payment.payumoney')->with('hash',$this->hash)
                             ->with('parameters',$this->parameters)
                             ->with('endPoint',$this->getEndPoint());
    }
    /**
     * Check Response
     * @param $request
     * @return array
     */
    public function response($request)
    {
        $response = $request->all();
        $response_hash = $this->decrypt($response);
        if($response_hash!=$response['hash']){
            return 'Hash Mismatch Error';
        }
        return $response;
    }
    /**
     * @param $parameters
     * @throws IndipayParametersMissingException
     */
    public function checkParameters($parameters)
    {
        $validator = Validator::make($parameters, [
            'key' => 'required',
            'txnid' => 'required',
            'surl' => 'required|url',
            'furl' => 'required|url',
            'firstname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'productinfo' => 'required',
            'service_provider' => 'required',
            'amount' => 'required|numeric',
        ]);
        if ($validator->fails()) {
        	Log::info('Redirect Main Url');
        	return redirect(route('user.index'))->with(['error' => 'Something is wrongs..']);
        }
    }
    /**
     * PayUMoney Encrypt Function
     *
     */
    protected function encrypt()
    {
        $this->hash = '';
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';
        foreach($hashVarsSeq as $hash_var) {
            $hash_string .= isset($this->parameters[$hash_var]) ? $this->parameters[$hash_var] : '';
            $hash_string .= '|';
        }
        $hash_string .= $this->salt;
        $this->hash = strtolower(hash('sha512', $hash_string));
    }
    /**
     * PayUMoney Decrypt Function
     *
     * @param $plainText
     * @param $key
     * @return string
     */
    protected function decrypt($response)
    {
        $hashSequence = "status||||||udf5|udf4|udf3|udf2|udf1|email|firstname|productinfo|amount|txnid|key";
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = $this->salt."|";
        foreach($hashVarsSeq as $hash_var) {
            $hash_string .= isset($response[$hash_var]) ? $response[$hash_var] : '';
            $hash_string .= '|';
        }
        $hash_string = trim($hash_string,'|');
        return strtolower(hash('sha512', $hash_string));
    }
    public function generateTransactionID()
    {
        return substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    }

}
