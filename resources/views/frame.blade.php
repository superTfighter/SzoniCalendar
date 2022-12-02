<!doctype html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.min.js" crossorigin="anonymous"></script>



</head>

<body>

    <div class="container">

        <div class="text-center">
            <h1>Adventi kalendárium</h1>
        </div>


        @yield('content')



    </div>
</body>

</html>
