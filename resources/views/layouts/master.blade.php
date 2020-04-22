<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
  crossorigin="anonymous">

  <link rel="stylesheet" href="{{ url('css/style.css')}}">

  <script src="{{ url('js/jquery.min.js') }}"></script>
  <script src="{{ url('js/main.js') }}"></script>
</head>
<body>
  @include('includes.header')
  
  <div class="container">
    @yield('content')
  </div>
</body>
</html>