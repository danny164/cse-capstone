@extends('layouts.app')

@section('title', '404 - Page not Found')

@section('content')
    <div class="main-container fullscreen">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-7">
                    <div class="text-center">
                        <h1 class="display-1">4<img src="{{ url('assets/img/404.png') }}" alt="&#x1f635;">4</h1>
                        <p>The page you were looking for was not found. Redirecting to Home after <span id="countdown">10</span> seconds</p>
                        <div class="mt-2">
                            <a class="fs-0" href="/home"><span class="pallette-grey-4">&larr; Back to Home</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">

    // Total seconds to wait
    var seconds = 10;

    function countdown() {
        seconds = seconds - 1;
        if (seconds < 0) {
            // Chnage your redirection link here
            window.location = "http://cse.capstone.vn/home";
        } else {
            // Update remaining seconds
            document.getElementById("countdown").innerHTML = seconds;
            // Count down using javascript
            window.setTimeout("countdown()", 1000);
        }
    }

    // Run countdown function
    countdown();

</script>
@endsection
