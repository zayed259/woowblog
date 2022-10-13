@if(Session::has('message'))          
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('message')}}
  </div>
@endif

@if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
  </div>
@endif 
    
@if ($message = Session::get('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
  </div>
@endif
     
@if ($message = Session::get('warning'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
  </div>
@endif
     
@if ($message = Session::get('info'))
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
  </div>
@endif