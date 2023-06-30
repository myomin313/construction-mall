@if ( Session::has('process_success') )
<div class="alert alert-success">{{ Session::get('process_success') }}</div>
@endif

@if ( Session::has('process_fail') )
<div class="alert alert-danger">{{ Session::get('process_fail') }}</div>
@endif

@if ( Session::has('message') )
<div class="alert alert-danger">{{ Session::get('message') }}</div>
@endif