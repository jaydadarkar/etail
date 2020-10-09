<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            width: 100%;
            margin: 0px;
            background-color: #ccc;
        }
        .container{
            margin: 5%;
            padding: 0px;
            width: 90%;
            background-color: white;
            border-radius: 5px;
            box-shadow: 5px 5px 10px #444;
        }
        .title{
            text-align: center;
            font-size: 1.8rem;
            padding: 1.5rem;
            font-family: Verdana, sans-serif;
        }
        .body{
            text-align: left;
            font-size: 0.9rem;
            padding: 1.5rem;
            font-family: Verdana, sans-serif;
        }
        .footer{
            text-align: center;
            font-size: 0.8rem;
            padding: 1.5rem;
            font-family: Verdana, sans-serif;
        }
        .extreme-footer{
            text-align: center;
            font-size: 0.8rem;
            padding: 1rem;
            font-family: Verdana, sans-serif;
            color: #969696;
        }
        hr{
            border-color: rgb(194, 194, 194);
            width: 80%;
            margin-right: 10%;
            margin-left: 10%;
        }
        .cta{
            width: 100%;
            text-align: center;
        }
        .button{
            padding: 0.8rem;
            background-color: rgb(61, 79, 137);
            color: #fff;
            font-family: Verdana, sans-serif;
            font-size: 0.8rem;
            text-align: center;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">
            {{ Config::get('app.name')}}
        </div>
        <hr />
        <div class="body">
            {{ $greeting }}
            <br />
            {{ $body }}
            <br />
            <br />
            <div class="cta">
                <a class="button" href="{{ $URL }}">{{ $CTA }}</a>
            </div>
        </div>
        <div class="footer">
            {{ $footer }}
        </div>
    </div>
    <div class="extreme-footer">
        You are receieving this email..<br />
        Unable To View Email..<br />
        Copyrights &copy; 2020 {{ Config::get('app.name')}}<br />
        {{ Config::get('app.url')}}
    </div>
</body>
</html>