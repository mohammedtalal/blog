@extends('layouts.master')

@section('content')

  <div class="col-sm-8 blog-main">
    
    @foreach($posts as $post)

      @include('posts.post')
      
    @endforeach

<!-- appends posts to show search result -->
{{  $posts->appends(['searchResults' => $searchResults]) }}

  </div><!-- /.blog-main -->
     
@endsection('content')

@section('footer')

@endsection('footer')