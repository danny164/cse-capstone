@if(Auth::user()->role_id != 1)
    <div class="scroll-process">
        <div class="progress-container">
            <div class="progress-bar" id="myBar"></div>
        </div>
    </div>
@endif
