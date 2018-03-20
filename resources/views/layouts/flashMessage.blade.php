<!-- this conditions to show a message to user when do something like add new flyer what ever ...  -->
@if (session('success'))
  <div class="alert alert-success">
      <center><h4>{{ session('success') }}</h4></center>
  </div>
@endif
@if (session('danger'))
    <div class="alert alert-danger">
        <center><h4>{{ session('danger') }}</h4> </center>
    </div>
@endif
@if (session('warning'))
    <div class="alert alert-danger">
        <center><h4>{{ session('danger') }}</h4> </center>
    </div>
@endif
@if (session('info'))
    <div class="alert alert-danger"> 
        <center><h4>{{ session('info') }}</h4> </center>
    </div>
@endif