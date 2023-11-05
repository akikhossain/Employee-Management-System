<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin Login Panel</title>
    </head>

    <body>
        <!-- Section: Design Block -->
        <section class="text-center">
            <!-- Background image -->
            <div class="p-5 bg-image"
                style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        ">
            </div>
            <!-- Background image -->

            <div class="card     w-50 mx-auto shadow-5-strong"
                style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
                <div class="card-body py-5 px-md-5 w-75 mx-auto">

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="fw-bold mb-5">Admin Login</h2>

                            <form action="{{ route('admin.login.post') }}" method="post">
                                @csrf
                                <!-- Email input -->
                                <div class="form-outline mb-4 text-left">
                                    <label class="form-label mt-2" for="form3Example3">Email address</label>
                                    <input name="email" required placeholder="Your Email" type="email"
                                        id="form3Example3" class="form-control" />
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

    </body>

</html>
