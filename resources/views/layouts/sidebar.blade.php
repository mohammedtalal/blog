<div class="col-sm-3 offset-sm-1 blog-sidebar">
  @if(auth()->check())
  
  <div class="profileCard">
    <img class="profilePicture" src="{{asset('images/avatars/'.auth()->user()->avatar)}}" alt="John" style="width:100%">
    <h3></h3>
    <p class="userTitle">{{ auth()->user()->bio }}</p>
    <p class="numOfPosts"><span>{{auth()->user()->posts->count()}}</span> Post</p>
    <div style="margin: 24px 0;">
      <a href="#"><i class="fa fa-dribbble"></i></a> 
      <a href="#"><i class="fa fa-twitter"></i></a>  
      <a href="#"><i class="fa fa-linkedin"></i></a>  
      <a href="#"><i class="fa fa-facebook"></i></a> 
   </div>
   <button>
      <a href="/setting/{{auth()->id()}}">Change Info</a>
   </button>
  </div>
  @endif

  <!-- hArchives module -->
  <div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">
      @foreach($archives as $stats)
        <li>
          <a href="/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
            
            {{ $stats['month'] . ' ' . $stats['year'] }}
            
          </a>
        </li>
      @endforeach
    </ol>
  </div>
  
  <!-- Tags module -->
  <div class="sidebar-module">
    <h4>Tags</h4>
    <ol class="list-unstyled">
      @foreach($tags as $tag)
        <li>
          <a href="/posts/tags/{{ $tag }}">
            {{ $tag }}
          </a>
        </li>
      @endforeach
    </ol>
  </div>

  <div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
      <li><a href="#">GitHub</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">Facebook</a></li>
    </ol>
  </div>
</div><!-- /.blog-sidebar -->