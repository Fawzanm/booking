<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--    <link rel="icon" href="../../../../favicon.ico">--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bookingz App</title>

    <!-- Custom styles for this template -->
    <link href="css/app.css" rel="stylesheet">
    <link href="css/album.css" rel="stylesheet">

    <script type="text/javascript">
        var datefield = document.createElement("input");
        datefield.setAttribute("type", "date")
        if (datefield.type != "date") { //if browser doesn't support input type="date", load files for jQuery UI Date Picker
            document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
        }
    </script>
    <script>
        if (datefield.type != "date") { //if browser doesn't support input type="date", initialize date picker widget:
            jQuery(function ($) { //on document.ready
                $('#booking_date').datepicker();
            })
        }
    </script>
</head>

<body>

<header>

    <nav class="nav float-md-right">
        <a class="nav-link active" href="{{ route('bookings') }}">Home</a>
        <a class="nav-link" href="{{ route('register') }}">Register</a>
        <a class="nav-link" href="{{ route('login') }}">Login</a>
        {{--        <a class="nav-link disabled" href="#">Contact</a>--}}
    </nav>
</header>


<div role="main" id="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Affordable Rooms in UAE</h1>
            <p class="lead text-muted">Are ypu looking for affordable rooms in UAE for short term? We got you covered.
                Checkout our deals.</p>
            <p>
                <input class="form-control" type="date" placeholder="YYYY-MM-DD" id="booking_date">
                <a href="#" class="btn btn-primary my-2" @click="filterRooms">Check availability</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-4" v-for="room in rooms">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top"
                             src="images/default.jpg"
                             alt="Card image cap">
                        <div class="card-body">
                            <h3>@{{room.name}}</h3>
                            <p class="card-text">@{{room.description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a type="button" class="btn btn-sm btn-outline-secondary"
                                       href="/booking?id=1">Book Now</a>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">@{{room.price}}AED / day</small>
                            </div>
                        </div>
                    </div>
                </div>

                <p>We don't have any rooms yet. Please check back later.</p>
            </div>
        </div>
    </div>

</div>


<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Bookinz llc. Dubai, UAE</p>

    </div>
</footer>
<script src="js/main.js"></script>

</body>
</html>


