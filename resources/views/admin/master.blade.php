<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    @notifyCss
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Employee Management System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <!-- Google fonts - Popppins for copy-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;display=swap"
        rel="stylesheet">
    <!-- Prism Syntax Highlighting-->
    <link rel="stylesheet"
        href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/plugins/toolbar/prism-toolbar.css">
    <link rel="stylesheet"
        href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/themes/prism-okaidia.css">
    <!-- The Main Theme stylesheet (Contains also Bootstrap CSS)-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/css/style.default.63c85ff9.css"
        id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/css/custom.0a822280.css">

    <style>
        /* stye for dashboard icon */
        .custom-small-img {
            width: 80px;
            height: auto;
        }

        /* animation for akik */
        @keyframes fadeInWords {

            0% {
                opacity: 0;
                transform: translateX(0);
                /* Initial and final position off-screen */
            }



            25%,
            50%,
            75%,
            100% {
                opacity: 1;
                transform: translateX(0);
                /* Stay on-screen */
                color: rgb(15, 75, 105)15, 15, 105);
                /* Change color, adjust as needed */
            }
        }

        .animated-text {
            white-space: nowrap;
            /* Prevent text from wrapping */
            overflow: hidden;
            /* Hide overflowing text */
        }

        .animated-text span {
            display: inline-block;
            /* Make each word a block element */
            opacity: 0;
            /* Initially hide each word */
            animation: fadeInWords 5s linear infinite;
            /* Adjust the animation duration */
        }

        .notify {
            z-index: 9999;
            /* align-items: flex-end; */
            /* align-items: center; */
            justify-content: center;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }


        .loader {
            width: 100%;
            height: 100%;
            position: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(51, 51, 51, 0.8);
            /* Semi-transparent background */
            z-index: 99999;
        }
    </style>
    <script>
        function display_ct7() {
                var x = new Date();
                var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                var day = days[x.getDay()]; // Get the day of the week

                var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
                var hours = x.getHours() % 12;
                hours = hours ? hours : 12;
                hours = hours.toString().length == 1 ? '0' + hours.toString() : hours;

                var minutes = x.getMinutes().toString();
                minutes = minutes.length == 1 ? '0' + minutes : minutes;

                var seconds = x.getSeconds().toString();
                seconds = seconds.length == 1 ? '0' + seconds : seconds;

                var month = (x.getMonth() + 1).toString();
                month = month.length == 1 ? '0' + month : month;

                var dt = x.getDate().toString();
                dt = dt.length == 1 ? '0' + dt : dt;

                var dayOfWeekElement = document.getElementById('dayOfWeek');
                dayOfWeekElement.innerHTML = day; // Display the day of the week in uppercase

                var x1 = month + "-" + dt + "-" + x.getFullYear();
                x1 = x1 + " - " + hours + ":" + minutes + " " + ampm;
                document.getElementById('ct7').innerHTML = x1;
                display_c7();
            }

            function display_c7() {
                var refresh = 1000; // Refresh rate in milliseconds
                mytime = setTimeout('display_ct7()', refresh);
            }
            display_c7();
    </script>


</head>

<body>
    <div class="loader">
        <img src="{{ asset('assests/image/ball-triangle.svg') }}" alt="">
    </div>

    {{-- notify --}}
    @include('notify::components.notify')



    <!-- navbar-->
    @include('admin.partials.header')


    <div class="d-flex align-items-stretch">
        <!-- sidebar -->
        @include('admin.partials.sidebar')



        <div class="page-holder bg-gray-100">
            <div class="container-fluid mb-xxl-5 flex-grow-1 h-75   px-lg-4 px-xl-5">


                @yield('content')

            </div>
        </div>
    </div>

    {{-- footer starts from here --}}
    <footer class="bg-dark flex-grow-0  text-center text-white w-100">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/akikhossain.abid"
                    role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/AKHS87" role="button"><i
                        class="fab fa-twitter"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/akikwho/"
                    role="button"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/in/akikhossain/"
                    role="button"><i class="fab fa-linkedin-in"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/akikhossain" role="button"><i
                        class="fab fa-github"></i></a>
            </section>
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)" ;>
            © 2023 Copyright: Employee Management System |
            <a class="text-white" href="https://github.com/akikhossain">Akik Hossain</a>
        </div>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- JavaScript files-->
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <!-- Data Tables-->
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/simple-datatables/umd/simple-datatables.js">
    </script>
    <!-- Init Charts on Homepage-->
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/chart.js/Chart.min.js"></script>
    <script src="js/charts-defaults.8a5fcd99.js"></script>
    <script src="js/index-default.50a9efee.js"></script>

    {{-- Font Awesome Kit --}}
    <script src="https://kit.fontawesome.com/5c95e5cc68.js" crossorigin="anonymous"></script>

    <!-- Main Theme JS File-->
    <script src="js/theme.87f0a411.js"></script>
    <!-- Prism for syntax highlighting-->
    <script src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/prism.js"></script>
    <script
        src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/plugins/normalize-whitespace/prism-normalize-whitespace.min.js">
    </script>
    <script
        src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/plugins/toolbar/prism-toolbar.min.js">
    </script>
    <script
        src="https://d19m59y37dris4.cloudfront.net/bubbly/1-3-2/vendor/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js">
    </script>
    <script type="text/javascript">
        // Optional
            Prism.plugins.NormalizeWhitespace.setDefaults({
                'remove-trailing': true,
                'remove-indent': true,
                'left-trim': true,
                'right-trim': true,
            });
    </script>

    @notifyJs

    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(function() {
                    setTimeout(() => {
                        $('.loader').fadeOut(500);
                    },1000);
                });
    </script>


    @stack('yourJsCode')
</body>

</html>