<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="media">
        <a class="pull-left" href="#">
        </a>
        <div class="media-body">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/8C0yn0tMA3o" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
        <div class="content">
            <div class="title">System Delivery - Laravel 5
                <p>admin@gmail.com</p>
                <p>client@gmail.com</p>
                <p>deliveryman@gmail.com</p>
                <p>senha->123456</p>
            </div>
            <a class="btn btn-info" href="{{ route('home') }}">Go!</a>
        </div>
    </div>
</body>
</html>
