<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>UTS 2.0</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-4---Tabs-with-Arrows.css">
    <link rel="stylesheet" href="assets/css/login-form-styles.css">
    <link rel="stylesheet" href="assets/css/login-form.css">
    <link rel="stylesheet" href="assets/css/Modern-Contact-Form.css">
    <link rel="stylesheet" href="assets/css/News-Cards-4-Columns-v2.css">
    <link rel="stylesheet" href="assets/css/News-Cards.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form-styles.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/Responsive-News-Card-Slider-styles.min.css">
    <link rel="stylesheet" href="assets/css/Responsive-News-Card-Slider.css">
    <link rel="stylesheet" href="assets/css/x-dropdown.css">

</head>

<body>
    <div class="container full-height">
        <div class="row flex center v-center full-height">
            <div class="col-8 col-sm-4">
                <div class="form-box">
                    <form method="POST" action="{{ route('login') }}">
                        <fieldset class="justify-content-center align-items-center align-content-center">
                            <legend style="font-weight: bold;">Login</legend>
                            <div class="d-flex d-lg-flex justify-content-center align-items-center align-content-center justify-content-lg-center align-items-lg-center" style="margin-bottom: 20px;padding-top: 10px;"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon" style="background: rgb(55, 99, 244);width: 100px;height: 100px;margin: 0px;margin-right: 17px;padding: 0px;padding-right: 0px;"><i class="fa fa-futbol-o" style="font-size: 80px;"></i></span></div>
                            <legend style="font-size: 20px;font-weight: bold;">Talent Bola Hub</legend>
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('error')}}
                                </div>
                            @endif
                            @csrf <!-- Tambahkan token CSRF -->
                            <input class="form-control" type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                            <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                            <button class="btn btn-primary d-block w-100">LOGIN</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
    <script src="assets/js/Dynamically-Add-Remove-Table-Row.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/Responsive-News-Card-Slider.js"></script>
</body>

</html>