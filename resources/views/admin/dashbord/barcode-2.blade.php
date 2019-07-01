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
            height: 157px;
            margin-bottom: 11px;
          }
        }
        .col-md-3 {
            width: 20% !important;
            height: 157px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
<div class="col-md-12">
    <?php $v = 4;?>
    @foreach($products as $key => $variation)
        <div class="col-md-3">
            <div >
                <div style="font-size: 22px;text-transform: uppercase;"><b>Shourd</b></div>
                <div style="font-weight: 600;">Color: {{ substr($variation->color->name, 0, 10) }}</div>
                <div style="font-weight: 600;">SIZE: {{ $variation->size->name }}
                </div>
                <div style="font-weight: 600;">Price. {{ $variation->price }}/- <div style="font-size: 10px;">(inclusive of all texes)</div></div>
                <div >
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($variation->id, 'C39+') }}" style="height: 34px;" /><br>
                    <span style="font-size: 12px;margin-left: 3%">{{$variation->id}}</span>
                </div>
            </div>
        </div>
        @if($key == $v && $v < 28)
            <div class="col-md-12"><p>&nbsp;</p></div>
            <?php $v = $v + 5;?>
        @endif
    @endforeach
</div>
<script type="text/javascript" src="/assets/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/core/libraries/bootstrap.min.js"></script>
</body>
</html>
