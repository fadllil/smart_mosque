<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset("assets/img/basic/favicon.ico")}}" type="image/x-icon">
    <title>Smart Mosque</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/app.css")}}">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }
        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
</head>
<body>
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="l-s-2 blink">LOADING</div>
    </div>
</div>

<div id="app" class="paper-loading">
    <div class="btn-fixed-top-left">
        <a href="documentations.html"
           class="btn-fab  btn-primary shadow1">
            <i class="icon icon-clipboard-list"></i>
        </a>
    </div>
<main>
    <div id="primary" class="p-t-b-100 height-full ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mx-md-auto">
                    <div class="text-center">
                        <img src="assets/img/dummy/u5.png" alt="">
                        <h2>Welcome Back</h2>
                        <p class="p-t-b-20">Hey Soldier welcome back signin now there is lot of new stuff waiting
                            for you</p>
                    </div>
                    <form action="/login" method="post">
                        @csrf
                        <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                            <input type="email" name="email" class="form-control form-control-lg"
                                   placeholder="Email Address" required>
                        </div>
                        <div class="form-group has-icon"><i class="icon-user-secret"></i>
                            <input type="password" name="password" class="form-control form-control-lg"
                                   placeholder="Password" required>
                        </div>
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Log In">
                        <p class="forget-pass">Have you forgot your username or password ?</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #primary -->
</main>


</div>
<!--End Page page_wrrapper -->
<script src="{{asset("assets/js/app.js")}}"></script>

</body>
</html>
