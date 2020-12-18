<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <!-- <meta name="csrf-token" content=" csrf_token() "> -->

    <title>@yield('title', 'Capstone Tracking')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('assets/img/DTU.ico')}}" rel="icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
    <link href="{{asset('assets/css/all.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/theme.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/datatables.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/dataTables.checkboxes.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    @yield('css')

</head>

<body>

    @yield('content')


    <!-- Required vendor scripts (Do not remove) -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.js')}}"></script>

    <!-- Autosize - resizes textarea inputs as user types -->
    <script type="text/javascript" src="{{asset('assets/js/autosize.min.js')}}"></script>
    <!-- Flatpickr (calendar/date/time picker UI) -->
    <script type="text/javascript" src="{{asset('assets/js/flatpickr.min.js')}}"></script>
    <!-- Prism - displays formatted code boxes -->
    <script type="text/javascript" src="{{asset('assets/js/prism.js')}}"></script>
    <!-- Shopify Draggable - drag, drop and sort items on page -->
    <script type="text/javascript" src="{{asset('assets/js/draggable.bundle.legacy.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/swap-animation.js')}}"></script>
    <!-- Dropzone - drag and drop files onto the page for uploading -->
    <script type="text/javascript" src="{{asset('assets/js/dropzone.min.js')}}"></script>
    <!-- List.js - filter list elements -->
    <script type="text/javascript" src="{{asset('assets/js/list.min.js')}}"></script>
    <!-- DataTables.js - sort, seach, pagination -->
    <script type="text/javascript" src="{{asset('assets/js/datatables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/dataTables.checkboxes.min.js')}}"></script>
    <!-- Toastr alerts-->
    <script type="text/javascript" src="{{asset('assets/js/toastr.min.js')}}"></script>

    <!-- Required theme scripts (Do not remove) -->
    <script type="text/javascript" src="{{asset('assets/js/theme.js')}}"></script>


    <script>

        function toasterOptions() {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
        };

        toasterOptions();
        @if(Session::has('errors'))
            toastr.error("{{ Session::get('errors')->first() }}");
            // @if(count($errors) > 0)
            //     @foreach($errors->all() as $error)
            //         toastr.error("{{ $error }}");
            //     @endforeach
            // @endif
        @endif

        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

    </script>

    <script>
        $('body,html').animate({
            scrollTop: 0
        }, 600);
    </script>

    <script>
        window.onscroll = function() {myFunction()};

        function myFunction() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("myBar").style.width = scrolled + "%";
        }
    </script>

    @yield('script')

</body>

</html>
