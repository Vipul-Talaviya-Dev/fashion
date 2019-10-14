<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
    <style type="text/css">

        .top-right-border {
            border-top: 1px solid #000000;
            border-right: 1px solid #000000;
            line-height: 2;
            text-align: center;
        }
        .border-right-0 {
            border-right: 0;
        }
        .padding-10 {
            padding: 10px;
        }
        .margin-85 {
            margin-top: -85px;
        }

        @media print {
            /*.logo {
                background: url('{{ public_path('front/images/logo.png') }}');
                background-position: center center;
            }*/

            .margin-85 {
                margin-top: -65px;
            }
            @page { margin: 0.9cm }
            th, td {
                width: 50%;
                padding: 1px;
            }
            body {
              font-family: serif;
            }
          
        }
        html, body, {
            float: none !important;
        }

        .break-after {
            page-break-after: always;
            position: relative;
        }

        .break-before {
            page-break-before: always;
            position: relative;
        }

        .multiselect-container > li > a {
            white-space: normal !important;
        }

        ::-webkit-scrollbar {
            display: none;
        }

    </style>
</head>
<body>
    <div align="center">
        <img style="top:0px; left:0px; width:150px; height:115px;" src="{{ public_path('front/images/logo.png') }}">
        <!-- <div class="logo">df</div> -->
    </div><br>
    <div>
        <table border="0" width="100%" style="border: 1px solid #000000;" cellspacing="0" cellpadding="0">
            <tr width="100%">
                <td colspan="4" class="padding-10" width="80%" style="border-bottom: 1px solid #000000;">
                    <div>
                        Form, <br>
                        <b>Shroud Enterprise</b> <br>
                        GF Sahajanand Arcade <br>
                        Near helmet char rasta <br>
                        Ahmedabad - 380007 <br>
                        Gujarat <br>
                        M 8758965327 <br>
                        GST No 24ACOFS6019H1ZX
                    </div><br>
                </td>
                <td colspan="4" style="border-left: 1px solid #000000;border-bottom: 1px solid #000000;">
                    <div class="margin-85">
                        <p style="padding: 2px;border-bottom: 1px solid #000000;display: block;">Invoice Number {{ $order->orderId() }}</p>
                        <p style="padding: 2px;border-bottom: 1px solid #000000;display: block;">Invoice Date {{ date('d/m/Y', strtotime($order->created_at)) }}</p>
                    </div>
                </td>
            </tr>
            <tr> 
                @if(false)
                    <td width="40%" style="border-right: 1px solid #000000;" class="padding-10"> 
                        <strong>To:</strong>
                        <br> GF Sahajanand Arcade <br>
                            Near helmet char rasta <br>
                            Ahmedabad - 380007 <br>
                            Gujarat <br>
                    </td>
                @endif
                <td class="padding-10"> 
                    <strong>To:</strong><br> {{ $order->user->name }} ({{ $address->mobile }})<br> {{ $address->address }},<br> {{ $address->city }} - {{ $address->pincode }}, {{ $address->state }}, {{ $address->country }}
                </td> 
            </tr>
            <tr> 
                <th class="top-right-border">Description</th>
                <th class="top-right-border">Pattern Code</th>
                <th class="top-right-border">HSN Code</th>
                <th class="top-right-border" style="width: 5%;">Qty</th>
                <th class="top-right-border">Unit Rate (Rs)</th>
                <th class="top-right-border border-right-0">Amount (Rs)</th>
            </tr>
            <?php $productTotal = $cgst = $cgst6 = 0;?>
            @foreach($order->orderProducts as $key =>  $orderProduct)
              <tr data-iterate="item">
                <td class="top-right-border">{{ $orderProduct->product->name }}</td>
                <td class="top-right-border">-</td>
                <td class="top-right-border">{{ $orderProduct->orderProductId() }}</td>
                <td class="top-right-border">{{ $orderProduct->qty }}</td>
                <td class="top-right-border">{{ $orderProduct->price }}</td>
                <td class="top-right-border border-right-0">{{ $orderProduct->price * $orderProduct->qty }}</td>
                <?php 
                  $productTotal += ($orderProduct->price * $orderProduct->qty);
                  $cgstAmount = ($orderProduct->price >= 1000) ? 0 : round(($orderProduct->price*2.5)/100, 2);
                  $cgst += $cgstAmount*$orderProduct->qty;

                  /* 6% Hoy to*/
                  $cgstAmount6 = ($orderProduct->price >= 1000) ? round($orderProduct->price*6, 2) : 0;
                  $cgst6 += $cgstAmount6*$orderProduct->qty;
                ?>
              </tr>
            @endforeach
            @if(false)   
                <tr> 
                    <td class="top-right-border">Tshirt</td>
                    <td class="top-right-border">-</td>
                    <td class="top-right-border">61091000</td>
                    <td class="top-right-border">5</td>
                    <td class="top-right-border">350.00</td>
                    <td class="top-right-border border-right-0">1750.00</td>
                </tr>
            @endif
            <tr> 
                <td colspan="2" class="top-right-border">&nbsp;</td>
                <td colspan="3" class="top-right-border">&nbsp;</td>
                <td class="top-right-border border-right-0">&nbsp;</td>
            </tr> 
            <tr> 
                <td colspan="2" class="top-right-border"></td>
                <td colspan="3" class="top-right-border"><b>Sub Total (Rs.)</b></td>
                <td class="top-right-border border-right-0"><b>{{ number_format(($productTotal-($cgst*2) + ($cgst6*2)), 2) }}</b></td>
            </tr>
            <tr> 
                <td colspan="2" class="top-right-border"></td>
                <td colspan="3" class="top-right-border"><b>CGST @ 2.5%</b></td>
                <td class="top-right-border border-right-0">{{ $cgst }}</td>
            </tr>
            <tr> 
                <td colspan="2" class="top-right-border"></td>
                <td colspan="3" class="top-right-border"><b>SGST @ 2.5%</b></td>
                <td class="top-right-border border-right-0">{{ $cgst }}</td>
            </tr>
            <!-- 6 Start -->
            @if($cgst6 > 0)
                <tr> 
                    <td colspan="2" class="top-right-border"></td>
                    <td colspan="3" class="top-right-border"><b>CGST @ 6%</b></td>
                    <td class="top-right-border border-right-0">{{ $cgst6 }}</td>
                </tr>
                <tr> 
                    <td colspan="2" class="top-right-border"></td>
                    <td colspan="3" class="top-right-border"><b>SGST @ 6%</b></td>
                    <td class="top-right-border border-right-0">{{ $cgst6 }}</td>
                </tr>
            @endif
            <!-- 6 End -->

            <tr> 
                <td colspan="2" class="top-right-border"></td>
                <td colspan="3" class="top-right-border"><b>Discount(-)</b></td>
                <td class="top-right-border border-right-0">{{ number_format($order->discount_amount, 2) }}</td>
            </tr>
            <tr> 
                <td colspan="2" class="top-right-border"></td>
                <td colspan="3" class="top-right-border"><b>Gross Amount</b></td>
                <td class="top-right-border border-right-0">{{ number_format($productTotal-$order->discount_amount, 0) }}</td>
            </tr>
            <tr> 
                <td colspan="2" class="top-right-border"></td>
                <td colspan="3" class="top-right-border"><b>Delivery Charge(+)</b></td>
                <td class="top-right-border border-right-0">{{ number_format($order->delivery_charge) }}</td>
            </tr>
            <tr> 
                <td colspan="2" class="top-right-border padding-10" style="text-align: left;font-size: 14px;"><b>{{ \App\Helper\Helper::getIndianCurrency((float) $order->cart_amount) }}</b></td>
                <td colspan="3" class="top-right-border"><b>Grand Total (Rs.)</b></td>
                <td class="top-right-border border-right-0">{{ number_format($order->cart_amount) }}</td>
            </tr>
            <tr>
                <td colspan="3" class="top-right-border border-right-0 padding-10">
                    <div align="left">
                        Terms & Condition :
                        <ul style="list-style: none;display: table-cell;font-size: 12px;">
                            <li>1. The membership offer must not be clubbed with any other offer from SHROUD.</li>
                            <li>2. Any form of payment is not refundable.</li>
                            <li>3. The goods are only exchanged within the criteria.</li>
                            <li>4. Return will be booked within 24 hour after delivery than product will not be exchanged or return.</li>
                            <li>5.  www.shroud.in reserves the right, in its sole discretion, to suspend or cancel any order at any time if the management.</li>
                            <li>6. User are free to contact us 24*7 by website or just give missed call on 93287-89323 or mail us on support@shroud.in. We shall reach you in 24 hour.</li>
                            <li>7. Computer generated invoice and requires no signature.</li>
                        </ul>
                    </div>
                </td>
                <td colspan="5" class="top-right-border border-right-0"><br>
                    <div style="width: 100%;">
                        <b style="font-size: 14px">For Shroud Enterpeise,</b> <p><br></p>

                        <div>
                            <!-- <span>AUTHORIZED SIGNATORY </span> -->
                            @if(false)
                                <img style="margin-top: -70px; left:0px; width:150px; height:90px;" src="{{ public_path('front/images/sign.png') }}">
                            @endif
                        </div>

                    </div>
                </td>
            </tr>
        </table>
    </div>
    <p><br></p>
</body>
</html>