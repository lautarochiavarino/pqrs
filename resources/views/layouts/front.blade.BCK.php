<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PQRS v2.0</title>

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('/site/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/site/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/site/css/sb-admin.css')}}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />


</head>

<body class="bg-dark">

@yield('content')

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('/site/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('/site/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('/site/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<script src="{{ asset('/js/app.js')}}"></script>
</body>

</html>
