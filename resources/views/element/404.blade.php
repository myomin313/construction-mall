@if(request()->is('blogs') || request()->is('blogssearch/*'))
<h4 class="text-center">Not Found. There is no data.</h4> <img src="{{ asset('images/not_found.png') }}" class="img-responsive" style="padding:10px;width:100%;height:400px !important">
@else
<h4 class="text-center">Not Found. There is no data.</h4> <img src="{{ asset('images/not_found.png') }}" class="img-responsive" style="padding:10px;width:100%">
@endif