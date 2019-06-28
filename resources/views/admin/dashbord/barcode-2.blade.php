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
            width: 33%;
            height: auto;
          }
        }
    </style>
</head>

<body>
<div class="col-md-12">
    <table>
        <tbody>
           @foreach($products as $variation)
            <tr class="col-md-3 pull-left">
                <th>
                    <div >
                        <div style="font-size: 24px;"><b>Shourd</b></div>
                        <div style="font-weight: 600;">{{ $variation->product->name }}</div>
                        <div style="font-weight: 600;">QTY: 1</div>
                        <div style="font-weight: 600;">Color: {{ $variation->color->name }}</div>
                        <div style="font-weight: 600;">SIZE: {{ $variation->size->name }} <br><span style="font-size: 12px;">(Maximum Retail Price)</span></div>
                        <div style="font-weight: 600;">RS. 549/- <br><span style="font-size: 12px;">(inclusive of all texes)</span></div>
                        <div >
                            <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($variation->id, 'C39+') }}" style="height: 34px;" /><br>
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
