<!DOCTYPE html>
<html lang="en">
<head>
    <title>&nbsp;</title>
    <style type="text/css">
       body {
            margin-top: 0in;
            margin-left: 0in;
        }
        .page {
            /*width: 8.5in;*/
            width: 100%;
            /*height: 10.5in;
            margin-top: 0.5in;
            margin-left: 0.25in;*/
            font-family: sans-serif;
        }
    .label {
            float: left;
            width: 20%;
        }
        /*.page-break {
            clear: left;
            display:block;
            page-break-after:always;
        }*/
        @media print {
          .label {
            float: left;
            width: 20%;
            height: auto;
          }
        }
    </style>
</head>
<body>
    <div class="page">
        @foreach($products as $variation)
            <div class="label">
                <div style="font-size: 24px;text-transform: uppercase;"><b>Shourd</b></div>
                <div style="font-weight: 600;">Color: {{ substr($variation->color->name, 0, 10) }}</div>
                <div style="font-weight: 600;">SIZE: {{ $variation->size->name }} </div>
                <div style="font-weight: 600;">Price. {{ $variation->price }}/- <br><span style="font-size: 10px;">(inclusive of all texes)</span>
                </div>
                <div >
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($variation->id, 'C39+') }}" style="height: 34px;" /><br>
                    <span style="font-size: 12px;margin-left: 3%">{{$variation->id}}</span>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>