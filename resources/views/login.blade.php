<!doctype html>
<html lang="en">

<head>
    <title>Login - MoMeet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style-login.css">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mt-3 mb-2">
                <a href="/home"><img src="images/logo.png" alt=""></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(images/Banner-01.jpg);">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign In</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="https://www.facebook.com/profile.php?id=100094042145649"
                                        class="social-icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-facebook"></span></a>
                                    <a href="https://twitter.com/momeet_info"
                                        class="social-icon d-flex align-items-center justify-content-center"><span
                                            class="fa fa-twitter"></span></a>
                                </p>
                            </div>
                        </div>
                        <form method="post" action="{{ route('do_login') }}" class="signin-form">
                            @csrf
                            @if ($errors->any())
                                @foreach ($errors->all() as $c_error)
                                    <div>{{ $c_error }}</div>
                                @endforeach
                            @endif
                            <div class="form-group mb-3">
                                <label class="label" for="username">Username</label>
                                <input type="text" class="form-control" placeholder="Username" name="username"
                                    id="username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    id="password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                    In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <!-- <div class="w-50 text-left">
                                    <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->
                                <div class="w-50 text-md-left">
                                    <u><a href="#">Lupa Pasword?</a></u>
                                </div>
                            </div>
                        </form>
                        <p class="text-center">Not a member? <a data-toggle="tab" href="/signup">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper-login.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
