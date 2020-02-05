@extends('layouts.app')

@section('content')
<section class="blog" data-scroll-index="4">
        <div class="container">
          <!-- header of section -->
          <div class="blog-head text-center">
            <h2>Blog</h2>
            <h6>latest news</h6>
          </div>

          <!-- blog items -->
          <div class="row">
            @if(count($posts) > 0)
            @foreach($posts as $post)
              <div class="col-md-6 col-lg-4">
                <div class="item">
                  <div class="img">
                    <img src="/soccer/public/storage/cover_image/{{$post->cover_image}}" alt="">
                  </div>
                  <div class="info">
                    <div class="date">
                      <span>25 <br> Dec</span>
                    </div>
                    <a href="posts/{{$post->id}}"><h5>{{$post->title}}</h5></a>
                    <p>{!!substr($post->body, 0, 40)!!}</p>
                    <a href="#0" class="user"><i class="fas fa-user"></i>{{$post->user->name}}</a>
                    <a href="posts/{{$post->id}}" class="more"><i class="fa fa-arrow-circle-o-right	"></i></a>
                  </div>
                </div>
              </div>
            @endforeach
            @endif

          </div>
          <div align="center">
                {{$posts->links()}}
            </div>
        </div>
      </section>
      <div id="landing">
      <div class="copyright">
            <span>&copy; 2020 SoccerManagment. All rights reserved.</span>
            <a href="#">Terms of Use</a>
            <a href="#">EULA</a>
            <a href="#">Privacy Policy</a>
        
            <div class="social">
              <a href="#" class="fa fa-youtube-play"></a>
              <a href="#" class="fa fa-twitter"></a>
              <a href="#" class="fa fa-facebook"></a>
            </div>
          </div>
@endsection