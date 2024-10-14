<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Shop :: Administrative Panel</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @notifyCss

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
                x1 = x1 + " - " + hours + ":" + minutes + " " +  ampm;
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

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <div class="navbar-nav pl-2">
                <!-- <ol class="breadcrumb p-0 m-0 bg-white">
						<li class="breadcrumb-item active">Dashboard</li>
					</ol> -->
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link p-0 pr-3 avatar p-1" data-toggle="dropdown" href="#">
                        <img src="{{ isset(auth()->user()->employee) && auth()->user()->employee->employee_image ? url('/uploads//' . auth()->user()->employee->employee_image) : asset('assests/image/default.png') }}"
                            class='img-circle elevation-2' width="40" height="40" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                        <h4 class="h4 mb-0"><strong> </strong></h4>
                        <div class="mb-3"> </div>
                        <div class="dropdown-divider"></div>
                        <div class="  text-gray-700">
                            <h6 class="text-uppercase font-weight-bold">{{ auth()->user()->name }}</h6><small
                                class="text-uppercase">{{ auth()->user()->role }}</small>
                        </div>


                        <div class="dropdown-divider" style="margin-top: 15px"></div>
                        <a href="{{ route('admin.logout') }}" class="text-danger" style="margin-top: 15px">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        @include('notify::components.notify')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('Admin.partials.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="padding: 20px">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">

            <strong>Copyright &copy; 2024 OnlineShop All rights reserved By Akik Hossain.
        </footer>

    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin-assets/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <script src={{ asset('admin-assets/plugins/summernote/summernote.min.js') }}></script>
    <script src={{ asset('admin-assets/plugins/select2/js/select2.min.js') }}></script>
    <script src={{ asset('admin-assets/js/datetimepicker.js') }}></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('admin-assets/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/demo.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            $('.dropzone').dropzone({
                url: "/file/post",
                maxFilesize: 2,
                addRemoveLinks: true
            });
        });

         <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
    </script>

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
                $('.loader').fadeOut(30); // Set an extremely quick fade-out time (e.g., 10 milliseconds)
            }, 150); // Adjust the initial delay as needed
        });
    </script>

    @stack('yourJsCode')
    </script>
    @yield('customJs')
</body>

</html>