<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="https://www.kodeeo.com/backend/assets/css/style.css">
    <link rel="stylesheet" href="https://www.kodeeo.com/backend/assets/css/components.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Panel</title>
    {{-- style for animation --}}
    <style>
        @keyframes slideFromTopToBottom {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        #animated-content {
            animation: slideFromTopToBottom 1s ease-in-out;
        }

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            /* display: flex;
            justify-content: center;
            align-items: center; */
            position: relative;
            background-image: url('https://i.ibb.co/swbydjh/markus-spiske-i-ABDzn-UDy6c-unsplash.jpg');
            background-size: cover;
            /* background-position: center; */
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);

        }

        .login-container {
            position: relative;
            z-index: 1;
            /* text-align: center; */
            color: white;
        }

        .login-card {
            width: 100%;
            /* Adjust width */
            max-width: 350px;
            /* Adjust max-width */
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    {{--
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        ">
        </div>
        <!-- Background image -->

        <div class="card w-25 mx-auto shadow-5-strong" id="animated-content" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
            <div class="card-body py-5 px-md-5 w-100 mx-auto">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Login</h2>

                        <form action="{{ route('admin.login.post') }}" method="post">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4 text-left">
                                <label class="form-label mt-2" for="form3Example3">Email address</label>
                                <input name="email" required placeholder="Your Email" type="email" id="form3Example3"
                                    class="form-control" />
                                @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4 text-left ">
                                <label class="form-label mt-2" for="form3Example4">Password</label>
                                <input name="password" required placeholder="Your Password" type="password"
                                    id="form3Example4" class="form-control" />
                                @error('password')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit button -->

                            <button type="submit" class="text-white btn btn-info btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</body> --}}
<div class="overlay">
    <div id="app" class="login-container">
        <section class="section">
            <div class="container mt-5 ">
                <div class="row" id="animated-content">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand flex justify-content-center">
                            <img src="https://i.ibb.co/w7GnVBw/4101adc6-07bf-42cd-9723-b7baa76d9bef.jpg" alt="logo"
                                width="100" class="shadow-light rounded-circle">
                        </div>
                        <div class="card login-card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('admin.login.post') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control " name="email" value=""
                                            tabindex="1" required placeholder=" Please fill in your email">
                                        @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" type="password" class="form-control " name="password"
                                            tabindex="2" required placeholder=" please fill in your password">
                                        @error('password')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-3 simple-footer text-white fw-bold ">
                            Copyright &copy; HRM System 2023 | Akik Hossain
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</body>

</html>