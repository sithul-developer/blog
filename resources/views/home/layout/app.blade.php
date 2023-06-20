<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog</title>
    <!-- Favicon-->

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Core theme CSS (includes Bootstrap)-->

</head>

<body>
    <!-- Responsive navbar-->
    @include('home.layout.header')
    <!-- Page header with logo and tagline-->
    @include('home.layout.slider')
    <!-- Page content-->
    <div class="container  ">
        <div class="row" >
            <!-- Blog entries-->
            @yield('content')
            <!-- Side widgets-->
            @include('home.layout.aside')
        </div>
    </div>
    <!-- Footer-->
    @include('home.layout.footer')
    <!-- Bootstrap core JS-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
