@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Single Blog Post</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans:700|Poppins:400');

html {font-size: 100%;} /*16px*/

body {
  background-color: white;
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.65;
  color: #131313;
}

p {margin-bottom: 1.15rem;}

h1, h2, h3, h4, h5 {
  margin: 2.75rem 0 1.05rem;
  font-family: 'Open Sans', sans-serif;
  font-weight: 700;
  line-height: 1.15;
}

h1 {
  margin-top: 0;
  font-size: 40px;
  color: #0A3EA6;
}

h2 {font-size: 31.25px;}

h3 {font-size: 1.953em;}

h4 {font-size: 1.563em;}

h5 {font-size: 1.25em;}

small, .text_small {font-size: 0.8em;
font-style : italic;}

/* layout */

.container {
  max-width : 992px;
  overflow: hidden;
  margin: 0 auto;
}

.header {
  padding: 40px;
  text-align: center;
}

.header-image {
  max-width: 720px;
  max-height:  400px;
  overflow: hidden;
  border-radius : 16px;
  margin:  0  auto 40px auto;
}

.header-image > img {
  max-width: 100%;
}

hr {
  color: #131313;
  max-width : 500px;
}

svg {
  margin: 0 8px 8px 8px;
  padding: 0;
}

.meta {
  display: flex;
  align-items: center;
  justify-content: center;
}

.content {
  padding: 40px;
}
</style>
<body>
  
  <div class="container">
    <header class="header">
      <div class="header-image">
        <img src="/soccer/public/storage/cover_image/{{$post->cover_image}}" alt="blog image">
      </div>
      <h1>{{$post->title}}</h1>
      <div class="meta">
        <p class="text_small">Published</p> 
        <svg width="16" height="16" viewBox="0 0 24 24">
  <path d="M7,8V6H5V19H19V6H17V8H7M9,4A3,3 0 0,1 12,1A3,3 0 0,1 15,4H19A2,2 0 0,1 21,6V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V6A2,2 0 0,1 5,4H9M12,3A1,1 0 0,0 11,4A1,1 0 0,0 12,5A1,1 0 0,0 13,4A1,1 0 0,0 12,3Z"></path>
</svg> 
        <p class="text_small">{{$post->created_at}}</p> <img src="" alt=""> 
        <svg width="16" height="16" viewBox="0 0 24 24">
            <path d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
        </svg>
        <p class="text_small">{{$post->user->name}}</p>
      </div>
      <hr>
    </header>
    <main class="content">
      <p>{!!$post->body!!}</p>
    </main>
    
  </div>
  
  
</body>
</html>