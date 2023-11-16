<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="keywords" content="">
        <title>Human Resources Service</title>
        <!-- Bootstrap -->
        <link href="https://easetemplate.com/free-website-templates/hrms/css/bootstrap.min.css" rel="stylesheet">
        <!-- Style CSS -->
        <link href="https://easetemplate.com/free-website-templates/hrms/css/style.css" rel="stylesheet">
        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <!-- Owl Carousel CSS -->
        <link href="https://easetemplate.com/free-website-templates/hrms/css/owl.carousel.css" rel="stylesheet">
        <link href="https://easetemplate.com/free-website-templates/hrms/css/owl.theme.default.css" rel="stylesheet">
        <!-- FontAwesome CSS -->
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <link href="https://easetemplate.com/free-website-templates/hrms/css/font-awesome.min.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

        <style>
            .logo img {
                max-width: 100px;
                height: auto;
                border-radius: 50px;
            }

            .ft-logo img {
                max-width: 200px;
                height: auto;
                border-radius: 50px;
            }
        </style>
    </head>

    <body>
        <!-- top-header-section-->
        <div class="menu-toggel">
            <a href="#" id="dots" class="dots-icon"><i class="fa fa-ellipsis-v visible-xs"></i></a>
        </div>
        <!-- /.top-header-section-->
        <!-- header-section-->

        @include('Frontend.partials.navbar')
        <!-- /. header-section-->

        <!-- slider -->
        @yield('content')


        <!-- footer -->
        @include('Frontend.partials.footer')
        <!-- /.footer -->


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://easetemplate.com/free-website-templates/hrms/js/jquery.min.js" type="text/javascript"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://easetemplate.com/free-website-templates/hrms/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="https://easetemplate.com/free-website-templates/hrms/js/menumaker.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://easetemplate.com/free-website-templates/hrms/js/jquery.sticky.js"></script>
        <script type="text/javascript" src="https://easetemplate.com/free-website-templates/hrms/js/sticky-header.js"></script>
        <script type="text/javascript" src="https://easetemplate.com/free-website-templates/hrms/js/owl.carousel.min.js">
        </script>
        <script type="text/javascript" src="https://easetemplate.com/free-website-templates/hrms/js/multiple-carousel.js">
        </script>
        <script type="text/javascript">
            $("#dots").click(function() {
                $(".top-header").toggle("slow", function() {
                    // Animation complete.
                });
            });
        </script>

    </body>

</html>
