<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Laravel</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
</head>
<body>

@include('partials.nav')

<div class="container" style="padding-top: 60px">
    @include('flash::message')

    @yield('content')
</div>


<script src="//code.jquery.com/jquery.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

<script>
    $('#flash-overlay-modal').modal();

    /*$('div.alert').not('.alert-important').delay(3000).slideUp(300);*/
</script>

@yield('footer')

</body>
</html>
