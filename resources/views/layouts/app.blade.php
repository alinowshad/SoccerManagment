<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SoccerManagement') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
        html,
        body {
          margin: 0;
          padding: 0;
        }
        
        #landing,
        #landing *,
        #landing :before,
        #landing :after {
          position: relative;
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          vertical-align: middle;
          text-overflow: ellipsis;
          font-family: Montserrat, Arial, Helvetica, Tahoma, Verdana, sans-serif;
        }
        #landing {
          width: 1500px;
          font-size: 16px;
          padding-top: 4.0625em;
          background: #fff;
          text-align: center;
        }
        
        #landing {
          font-size: 1.061vw;
          width: auto;
        }
        
        #landing > * {
          text-align: left;
        }
        #landing .button {
          display: inline-block;
          padding: 0.75em 1.4em;
          border-radius: 2em;
          font-weight: bold;
          line-height: normal;
          text-align: center;
          text-decoration: none;
          text-transform: uppercase;
          background-color: #99ce45;
          border: 0.125em solid #99ce45;
          color: #fff;
          transition: background 0.4s, color 0.4s, border-color 0.4s;
        }
        #landing .button:hover {
          background: transparent;
          color: #99ce45;
        }
        #landing .button:active {
          opacity: 0.5;
        }
        #landing .button-blue {
          background: #01b0fe;
          border-color: #01b0fe;
        }
        #landing .button-blue:hover {
          background: transparent;
          color: #01b0fe;
        }
        #landing .button-orange {
          background: #fe8f4f;
          border-color: #fe8f4f;
        }
        #landing .button-orange:hover {
          background: transparent;
          color: #fe8f4f;
        }
        
        #landing > .header {
          position: fixed;
          left: 0;
          right: 0;
          top: 0;
          height: 4.0625em;
          z-index: 100;
          background: rgba(255, 255, 255, 0.9);
          padding: 0.9em 1.25em;
          line-height: 2em;
          text-align: right;
          border-bottom: 1px solid rgba(0, 0, 0, 0.1);
          word-spacing: 2.5em;
        }
        
        #landing > .header > * {
          display: inline-block;
          word-spacing: normal;
        }
        #landing > .header > .logo {
          display: inline-block;
          position: absolute;
          left: 2em;
          width: 12.66%;
          max-width: 11.8em;
          letter-spacing: -0.5em;
          white-space: nowrap;
          color: transparent;
          overflow: hidden;
          background: url("")
            no-repeat center left;
          background-size: contain;
        }
        #landing > .header > .button {
          font-size: 0.75em;
          border-width: 0.18em;
        }
        #landing > .header > .login {
          font-size: 0.875em;
          color: #03b4fe;
          font-weight: bold;
          text-decoration: none;
          text-transform: uppercase;
          transition: all 0.2s;
          border: 0 solid transparent;
        }
        #landing > .header > .login:before {
          content: "";
          display: inline-block;
          width: 1.429em;
          height: 1.429em;
          margin: -0.2em 0.5em 0 0;
          background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAUVBMVEUAAAABsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4BsP4pJ89bAAAAGnRSTlMA3etU5rMKqwaJW0hPRNAR88qUaybCgWI/MCVqoPAAAAC5SURBVBjTTZBXssMwDAOpZsmOS9or2fsfNBgqynh/RGKIIURzWqqBa6ip2ZcUgJyBkIY2Q1kns2ktMA8tXuzDJXY1EZ96Xr/zv55nJGlHZlOzIh4qNnKzhWIiIIKJwmKV1URGRHNP1cikaooueikD2cSBc3STXeURBVG8jLjdl4rNPvZKT77D3vNTRyS7wc1GpJY1Ov3tnvNxaDA3/2bhy08k9YOcGWe6c+J+PrLjRx60pQYpdWnevgG0mRAe7+n/PQAAAABJRU5ErkJggg==")
            no-repeat center center;
          background-size: contain;
        }
        #landing > .header > .login:hover {
          border: 0.166em solid #03b4fe;
          border-radius: 2em;
          padding: 0 1em;
        }
        #landing > .menu {
          text-align: center;
          background: #01b0fe;
          font-size: 1.125em;
          padding: 1.278em 0;
        }
        #landing > .menu > a {
          display: inline-block;
          width: 12.5em;
          height: 2em;
          line-height: 2em;
          border: 0 solid #0097db;
          border-width: 0 2px;
          margin-left: -2px;
          color: #fff;
          text-decoration: none;
          text-transform: uppercase;
          transition: border-color 0.5s, color 0.1s;
        }
        #landing > .menu > a:first-child {
          border-left: 0 none;
        }
        #landing > .menu > a:last-child {
          border-right: 0 none;
        }
        #landing > .menu > a:hover {
          z-index: 50;
          text-transform: none;
          font-size: 1.335em;
          color: #0a5070;
          width: 9.3635em;
          height: 1.5em;
          line-height: 1.5em;
          border-color: #01b0fe;
        }
        #landing > .feature {
          display: inline-block;
          width: 23.75em;
          margin-top: 5.125em;
          padding: 0 1.625em;
          text-align: center;
          vertical-align: top;
        }
        #landing > .feature > .picture {
          width: 11.9375em;
          max-width: 191px;
          margin-bottom: 2.25em;
        }
        #landing > .feature > .caption {
          font-size: 1.4em;
          font-weight: normal;
          margin-bottom: 0.8em;
          min-height: 2.43em;
          color: #3e4e5c;
          text-align: left;
        }
        #landing > .feature > .summary {
          color: #737d85;
          font-size: 0.86em;
          text-align: left;
        }
        #landing > .features {
          display: inline-block;
          width: 83.75em;
          margin-top: 5.125em;
          padding: 0 1.625em;
          text-align: left;
          vertical-align: top;
        }
        #landing > .features > .picture {
          width: 11.9375em;
          max-width: 191px;
          margin-bottom: 2.25em;
        }
        #landing > .features > .caption {
          font-size: 1.4em;
          font-weight: normal;
          margin-bottom: 0.8em;
          min-height: 2.43em;
          color: #3e4e5c;
          text-align: left;
        }
        #landing > .features > .summary {
          color: #737d85;
          font-size: 1.2em;
          text-align: left;
        }
        #landing > .extra {
          display: inline-block;
          text-align: center;
          color: #3e4e5c;
          font-size: 2.25em;
          width: 13.333em;
          margin: 1.5em 0 3em;
        }
        #landing > .extra .button {
          font-size: 0.65em;
          padding: 0.62em 2.612em;
          text-transform: none;
          font-weight: normal;
          margin-top: 1.5em;
        }
        #landing > .footer {
          display: table;
          width: 100%;
          padding: 0 6em;
        }
        #landing > .footer > * {
          display: table-cell;
          vertical-align: top;
          line-height: 2;
        }
        #landing > .footer a {
          color: #01affe;
          text-decoration: none;
        }
        #landing > .footer a:hover {
          color: #3e4e5c;
        }
        #landing > .footer > .column:nth-child(1) a,
        #landing > .footer > .column:nth-child(2) a,
        #landing > .footer > .column:nth-child(3) a {
          display: block;
          font-size: 0.875em;
        }
        #landing > .footer > .column:nth-child(1) a {
          font-size: 1.125em;
        }
        #landing > .footer > .subscribe {
          width: 50%;
          top: -0.5em;
        }
        #landing > .footer > .subscribe > .caption {
          font-size: 1.125em;
          font-weight: normal;
          color: #3e4e5c;
        }
        #landing > .footer > .subscribe > .summary {
          font-size: 0.875em;
          color: #8e9ea9;
          margin-bottom: 0.5em;
        }
        #landing > .footer > .subscribe > .email {
          width: 83%;
          font-size: 0.875em;
          border: 0.125em solid #e4ebec;
          border-radius: 3px;
          appearance: none;
          line-height: 3em;
          padding: 0 1em;
        }
        #landing > .footer > .subscribe > .email + button {
          width: 17%;
          font-size: 0.875em;
          border: 0;
          border-radius: 3px;
          appearance: none;
          line-height: 3em;
          padding: 0 1em;
          text-align: center;
          text-transform: uppercase;
          background: #01affe;
          color: #fff;
          cursor: pointer;
          margin-left: -0.4em;
        }
        #landing > .copyright {
          font-size: 0.875em;
          border-top: 2px solid #eee;
          margin: 2em 6.8em 0;
          padding: 2em 0;
          color: #8e9ea9;
          word-spacing: 1.5em;
        }
        #landing > .copyright:after {
          content: "";
          display: block;
          height: 0;
          overflow: hidden;
          float: none;
          clear: both;
        }
        #landing > .copyright > * {
          word-spacing: normal;
        }
        #landing > .copyright a {
          color: #01affe;
          text-decoration: none;
        }
        #landing > .copyright a:hover {
          color: #3e4e5c;
        }
        #landing > .copyright > .social {
          float: right;
          word-spacing: 1.5em;
        }
        #landing > .copyright > .social > * {
          word-spacing: normal;
        }
        #landing > .copyright > .social > .ico:before {
          font-family: "ico";
          font-size: 1.8em;
        }
        
        #landing > .copyright > .social > .fa:before {
          display: inline-block;
          font: normal normal normal 1.8em FontAwesome;
          text-rendering: auto;
          -webkit-font-smoothing: antialiased;
          -moz-osx-font-smoothing: grayscale;
        }
        
        #landing .slider {
          position: relative;
          overflow: hidden;
          text-align: center;
        }
        #landing .slider .content {
          text-shadow: 0 0 1px rgba(0, 0, 0, 0.2);
        }
        #landing .slider > img.ratio {
          display: inline-block;
          position: relative;
          box-sizing: border-box;
          width: 100%;
          border: 0 none;
          outline: 0 none;
          margin: 0; /* data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAEALAAAAAABAAEAAAIBTAA7 */
        }
        #landing .slider > input.slide {
          position: absolute;
          width: 0;
          height: 0;
          margin: 0;
          padding: 0;
          border: 0;
          opacity: 0;
          overflow: hidden;
        }
        #landing .slider > input.slide + label {
          display: inline-block;
          width: 3.32em;
          height: 3.125em;
          margin-top: -3.125em;
          padding: 1.5em 0.25em 0;
          top: -0.5em;
          cursor: pointer;
          z-index: 100;
        }
        #landing .slider > input.slide + label:before {
          content: "";
          display: block;
          border: 1px solid rgba(255, 255, 255, 0.3);
          transition: border-color 0.2s;
        }
        #landing .slider > input.slide + label:hover:before {
          border-color: rgba(255, 255, 255, 0.4);
        }
        #landing .slider > input.slide:checked + label:before {
          border-color: rgba(255, 255, 255, 1);
        }
        #landing .slider > input.slide + label + div,
        #landing .slider > input.slide + label + div > img:first-child,
        #landing .slider > input.slide + label + div > img:first-child + div {
          position: absolute;
          z-index: 0;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          text-align: left;
          overflow: hidden;
        }
        #landing .slider > input.slide + label + div > img:first-child {
          width: 100%;
          height: 100%;
          opacity: 0.9;
        }
        #landing .slider > input.slide + label + div {
          transition: opacity 1s, transform 1.5s;
          opacity: 0;
          transform: scale(1.5);
          background: rgba(0, 0, 0, 0.8);
        }
        #landing .slider > input.slide:checked + label + div {
          z-index: 50;
          opacity: 1;
          transform: scale(1);
        }
        
        #landing .slider > input.slide + label + div:before {
          content: "";
          display: block;
          position: absolute;
          bottom: 1px;
          left: 0;
          width: 0;
          opacity: 0;
          z-index: 100;
          background: #0097db;
          height: 2px;
          transition: width 6.8s linear, opacity 3s 1s linear;
          box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
        }
        #landing .slider > input.slide:checked + label + div:before {
          width: 100%;
          opacity: 1;
        }
        span, a, a:hover {
    display: inline-block;
    text-decoration: none;
    color: inherit;
}

.blog img{
    max-width: 100%;
}
.blog-head {
  margin-bottom: 70px;
}

.blog-head h6{
  color: #0755f0;
  position: relative;
  display: inline-block;
  text-transform: capitalize;
}

.blog-head h6:after, .blog-head h6:before{
  position: absolute;
  content: "";
  width: 50px;
  height: 3px;
  background: #07a6f0;
  top: 50%;
}

.blog-head h6:after{
  right: 120%;
}

.blog-head h6:before{
  left: 120%;
}

.overlay{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 0;
}
.blog{
  background-color: #fff;
      padding: 100px 0;
    min-height: 100vh;
}

.blog .item{
  background-color: #fff;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  overflow: hidden;
  position: relative;
}

.blog .item .more{
  position: absolute;
  right: 30px;
  bottom: 20px;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
  color: #0755f0;
  font-size: 19px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  line-height: 40px;
  text-align: center;
  transform: translate(0 , 100px);
  transition: all 0.3s ease-in-out;
}

.blog .item:hover .more{
  transform: translate(0 , 0)
}

.blog .item:hover .img img{
  transition: all 0.4s ease;
}

.blog .item:hover .img img{
  transform: rotate(-5deg) scale(1.2 , 1.2);
}

.blog .item .img{
  clip-path: polygon(0 0, 100% 0, 100% 70%, 0 100%, 0 75%);
}

.blog .item .info{
  padding: 30px;
  position: relative;
}

.blog .item .info .date{
  position: absolute;
  left: calc(50% - 25px);
  top: -54px;
  width: 50px;
  height: 50px;
  line-height: 20px;
  text-align: center;
  background-color: #0755f0;
  color: #fff;
  padding: 5px;
  transform: rotate(45deg);
}

.blog .item .info .date span {
    transform: rotate(-45deg);
    display: inline-block;
}
.blog .item .info h5:hover{
  color: #0755f0;
}

.blog .item .info .user{
  margin-top: 20px;
  color: #0755f0;
}

.blog .item .info .user i{
  margin-right: 5px;
  font-size: 14px;
}

        </style>
<body>
    <div id="app">
            @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/soccer/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
