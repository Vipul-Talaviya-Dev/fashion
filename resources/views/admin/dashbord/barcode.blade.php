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
            width: 8.5in;
            height: 10.5in;
            margin-top: 0.5in;
            margin-left: 0.25in;
            font-family: sans-serif;
        }
    .label {
            width: 2.1in;
            /*height: .9in;*/
            padding: .125in .3in 0;
            margin-right: 0.125in;
            float: left;
            text-align: left;
            overflow: hidden;
        }
    .page-break {
            clear: left;
            display:block;
            page-break-after:always;
        }
    </style>
</head>
<body>
    <div class="page">
        @foreach($products as $variation)
            <div class="label">
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
        @endforeach
    </div>
</body>
</html>