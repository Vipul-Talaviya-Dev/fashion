<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Order Invoice </title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Invoice Order">
    <meta name="author" content="">
    <link rel="stylesheet" href="/assets/css/generator.min.css">
    <link rel="stylesheet" href="/assets/css/invoice.css">
  </head>
  <body>
    <div id="container">
      <section id="memo">
        <div class="logo">
          <h1>Logo</h1>
          <!-- <img data-logo="{company_logo}" /> -->
        </div>
        <!-- <div class="company-info">
          <div>{company_name}</div>
          <br />
          <span>{company_address}</span>
          <span>{company_city_zip_state}</span>

          <br />
          
          <span>{company_phone_fax}</span>
          <span>{company_email_web}</span>
        </div> -->
      </section>

      <section id="invoice-title-number">
        <span id="title">Invoice</span>
        <span id="number"># {{ 'FHN'.date('Ymd', strtotime($order['created_at'])).$order->id }}</span>
        
      </section>
      
      <div class="clearfix"></div>
      
      <section id="client-info">
        <span>To:</span>
        <div>
          <span class="bold">{{ $order->user->name }}</span>
        </div>
        
        <div>
          <span>{{ $address->address }},</span>
        </div>
        
        <div>
          <span>{{ $address->city }} - {{ $address->pincode }}, {{ $address->state }}, {{ $address->country }}</span>
        </div>
        
        <div>
          <span>{{ $user->mobile }}</span>
        </div>
        
        <div>
          <span>{{ $user->email }}</span>
        </div>
      </section>
      
      <div class="clearfix"></div>
      
      <section id="items">
        
        <table cellpadding="0" cellspacing="0">
        
          <tr>
            <th></th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Total</th>
          </tr>
          @foreach($order->orderProducts as $key =>  $orderProduct)
          <tr data-iterate="item">
            <td>{{ $key+1 }}</td>
            <td>{{ $orderProduct->product->name }}</td>
            <td>{{ $orderProduct->qty }}</td>
            <td>{{ $orderProduct->price }}</td>
            <td>{{ $orderProduct->discount }}</td>
            <td>{{ $orderProduct->price * $orderProduct->qty }}</td>
          </tr>
          @endforeach
        </table>
        
      </section>
      
      <section id="sums">
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th>Subtotal :</th>
            <td>{{ $order->cart_amount }}</td>
          </tr>
          
          <tr data-iterate="tax">
            <th>Delivery Charge(+) </th>
            <td>0</td>
          </tr>
          
          <tr class="amount-total">
            <th> Total</th>
            <td>{{ $order->total }}</td>
          </tr>
          
          <tr data-hide-on-quote="true">
            <th>Grand Total</th>
            <td>{{ $order->cart_amount }}</td>
          </tr>
          
        </table>

        <div class="clearfix"></div>
        
      </section>
      
      <div class="clearfix"></div>

      <!-- <div class="thank-you">Vopul</div> -->

      <div class="clearfix"></div>
    </div>

  </body>
</html>
