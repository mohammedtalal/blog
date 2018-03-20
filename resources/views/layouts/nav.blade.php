  <div class="container-fluied">
    <div class="blog-masthead ">
    <nav class=" navbar navbar-expand-lg container ">
    <a class="navbar-brand" href="/">Home</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          @if (Auth::check())
          <a class="nav-link" href="/profile/{{ Auth::user()->id }}">Profile</a>
          @endif
        </li>
        
      </ul>
      <form action="/" method="get" class="form-inline my-2 my-lg-0">
        <input name="searchRequ" class="form-control mr-sm-2" type="search" placeholder="Search" 
        value="{{ isset($searchResults) ? $searchResults : '' }}">
        <button class=" btn  my-2 my-sm-0" type="submit">Search</button>
      </form>
      @if(! Auth::check())  
        <a href="/login" class=" nav-link ml-auto btn-lg">Log in </a> 
      @elseIf( Auth::check())
      <a href="/profile/{{ Auth::user()->id }}" class="nav-link capitaliz">Welcome {{ Auth::user()->name }}</a>
      <a href="/logout" class="nav-link">Log out </a>
      @endif
    </div>
  </nav>
  </div>
</div>

