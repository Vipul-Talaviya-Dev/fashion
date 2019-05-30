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
          <img src="/front/images/logo.png" alt="Fashion" class="img-responsive" />
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
        <span id="number"># {{ $order->orderId() }}</span>
        
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
            <th>Total</th>
          </tr>
          <?php $productTotal = $cgst = 0;?>
          @foreach($order->orderProducts as $key =>  $orderProduct)
          <tr data-iterate="item">
            <td>{{ $key+1 }}</td>
            <td>{{ $orderProduct->product->name }}</td>
            <td>{{ $orderProduct->qty }}</td>
            <td>{{ $orderProduct->price }}</td>
            <td>{{ $orderProduct->price * $orderProduct->qty }}</td>
            <?php 
              $productTotal += ($orderProduct->price * $orderProduct->qty);
              $cgstAmount = round(($orderProduct->price*2.5)/100, 2);
              $cgst += $cgstAmount*$orderProduct->qty;
            ?>
          </tr>
          @endforeach
        </table>
        
      </section>
      
      <section id="sums">
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th>Subtotal :</th>
            <td>Rs. {{ number_format($order->total, 2) }}</td>
          </tr>
          
          <tr data-iterate="tax">
            <th>SGST(2.5%) (+) </th>
            <td>Rs. {{ $cgst }}</td>
          </tr>
          <tr data-iterate="tax">
            <th>CGST(2.5%) (+)</th>
            <td>Rs. {{ $cgst }}</td>
          </tr>

          <tr data-iterate="tax">
            <th>Discount(-) </th>
           <td>Rs. {{ number_format($order->discount_amount, 2) }}</td>
          </tr>

          <tr data-iterate="tax">
            <th>Delivery Charge(+) </th>
            <td>Rs. {{ number_format($order->delivery_charge, 2) }}</td>
          </tr>
          
          <tr data-hide-on-quote="true">
            <th>Total</th>
            <td>Rs. {{ number_format($order->cart_amount, 2) }}</td>
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
