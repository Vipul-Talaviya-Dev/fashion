<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>&nbsp;</title>
    <link rel="icon" href="/front/images/favicon.png" >
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        @media print {
          .col-md-3 {
            float: left;
            width: 33.33%;
            height: auto;
          }
        }
        .col-md-3 {
            width: 20% !important;
        }
    </style>
</head>

<body>
<div class="col-md-12">
    <table>
        <tbody>
           @foreach($products as $variation)
            <tr class="col-md-3">
                <th>
                    <div >
                        <div style="font-size: 22px;text-transform: uppercase;"><b>Shourd</b></div>
                        <!-- <span style="font-weight: 600;">{{ substr($variation->product->name, 0, 15).'...' }}</span> -->
                        <!-- <div style="font-weight: 600;">QTY: 1</div> -->
                        <div style="font-weight: 600;">Color: {{ substr($variation->color->name, 0, 10) }}</div>
                        <div style="font-weight: 600;">SIZE: {{ $variation->size->name }}
                            <!-- <span style="font-size: 10px;">(Maximum Retail Price)</span> -->
                        </div>
                        <div style="font-weight: 600;">Price. {{ $variation->price }}/- <div style="font-size: 10px;">(inclusive of all texes)</div></div>
                        <div >
                            <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($variation->id, 'C39+') }}" style="height: 34px;width: 100%;" /><br>
                            <span style="font-size: 12px;margin-left: 3%">{{$variation->id}}</span>
                        </div>
                    </div>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript" src="/assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/core/libraries/bootstrap.min.js"></script>
</body>
</html>
