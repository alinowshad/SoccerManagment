@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<title>SoccerMangment</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<body>
<div id="landing">
  <div class="slider slider-1">
    <img class="ratio" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAEALAAAAAABAAEAAAIBTAA7" />

    <input class="slide" type="radio" name="slider-1" id="s-1-1" /><label for="s-1-1"></label>
    <div>
      <img src="/soccer/public/storage/landingpage/slide2.jpg" />
      <div class="content">
        <h3>Manage Your Team Easy</h3>
        <p>Manage multiple teams, with players data and performances. Enter the matches calls up, lineups, substitutions, assists, cards, scorers and player ratings. Configure the training date and track the attendances.</p>
        <a href="{{ route('register') }}" class="button button-blue">Get Started</a>
      </div>
    </div>

    <input class="slide" type="radio" name="slider-1" id="s-1-2" /><label for="s-1-2"></label>
    <div>
      <img src="/soccer/public/storage/landingpage/slide1.jpg" />
      <div class="content">
        <h3>Schedule team events</h3>
        <p>SoccerMangment allows you to easily organize your games, practices & events</p>
        <a href="{{ route('register') }}" class="button button-orange">Create Your Team Now</a>
      </div>
    </div>

    <input class="slide" type="radio" name="slider-1" id="s-1-3" checked /><label for="s-1-3"></label>
    <div>
      <img src="/soccer/public/storage/landingpage/slide4.jpg" />
      <div class="content">
        <h3>Set your team's lineups</h3>
        <p>Add & delete your players on the team, like in a video game!</p>
        <a href="{{ route('register') }}" class="button button">Go Now</a>
      </div>
    </div>
    <style type="text/css">
      #landing .slider-1 img.ratio {padding:0 33%;}
      #landing .slider-1 .content {max-width:33%; margin:5% 0 0 18%;}
      #landing .slider-1 .content h3 {color:#fff; font-size:2.125em; font-weight:normal; margin:0 0 4%;}
      #landing .slider-1 .content p {color:#fff; font-size:1.1em; font-weight:normal;}
      #landing .slider-1 .button {position:absolute; bottom:17%; min-width:12.5em; font-size:.95em; font-weight:normal; border-width:.14em;}
    </style>
  </div>

  <div class="menu">
    <a href="{{ route('register') }}">Getting Started</a><a href="{{ route('register') }}">Create Account</a><a href="/soccer/public/contact">Contact Us</a><a href="/soccer/public/posts">Blog</a>
  </div>

  <div class="feature">
    <img class="picture" src="/soccer/public/storage/landingpage/clock.png" />
    <h4 class="caption">Team Management</h4>
    <p class="summary">Manage multiple teams, with players data and performances. Enter the matches calls up, lineups, substitutions, assists, cards, scorers and player ratings. Configure the training date and track the attendances.</p>
  </div>

  <div class="feature">
    <img class="picture" src="/soccer/public/storage/landingpage/travel.png" />
    <h4 class="caption">Freedom</h4>
    <p class="summary">You can manage as many teams as you wish and configure multiple seasons. You will be able to switch between teams and seasons and find historical data.</p>
  </div>

  <div class="feature">
    <img class="picture" src="/soccer/public/storage/landingpage/graph.png" />
    <h4 class="caption">Statistics</h4>
    <p class="summary">Data for teams (segmented by competitions) and players (top scorers, average ratings, assists, matches and training attendances). Keep trace of statistics data for each player.</p>
  </div>

  <div class="slider slider-2">
    <img class="ratio" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAEALAAAAAABAAEAAAIBTAA7" />

    <input class="slide" type="radio" name="slider-2" id="s-2-1" /><label for="s-2-1"></label>
    <div>
      <img src="https://developer.playphone.com/App/Landing/img/main-slide-4.png" />
      <div class="content">
        <h3>What they say</h3>
        <p>
                "I've use many Sports managing apps, and this one is by far the best one."
                
        </p>
        <small>
            Julia. W<br />
        </small>
      </div>
    </div>

    <input class="slide" type="radio" name="slider-2" id="s-2-2" checked /><label for="s-2-2"></label>
    <div>
      <img src="https://developer.playphone.com/App/Landing/img/main-slide-5.png" />
      <div class="content">
        <h3>What they say</h3>
        <p>
                "Very useful and easy to use"
                
        </p>
        <small>
            Christian Z.<br />
        </small>
      </div>
    </div>
    <style type="text/css">
      #landing .slider-2 img.ratio {padding:0 30.4%;}
      #landing .slider-2 {margin-top:6em;}
      #landing .slider-2 .content h3 {font-size:1.125em; margin:0 0 3em; color:#99ce45; text-transform:uppercase; font-weight:normal;}
      #landing .slider-2 .content p {font-size:1.3em; color:#fff;}
      #landing .slider-2 .content small {font-size:1.125em; margin:3em 0 0; display:block; color:#fff; text-transform:uppercase; font-weight:normal;}

      #landing .slider-2 #s-2-1 + label + div > .content {max-width:30%; margin:8% 0 0 17%;}
      #landing .slider-2 #s-2-1 + label + div > .content p {font-size:1.6em}
      #landing .slider-2 #s-2-2 + label + div > .content {max-width:35%; margin:8% 0 0 16%;}
    </style>
  </div>

  <div class="extra">
    Get started in 10 minutes.
    <br />
    <a href="{{ route('register') }}" class="button button-green">Get Started</a>
  </div>

  <div class="footer">
    <div class="column">
      <a href="{{ route('register') }}">Get Started</a>
      <a href="/soccer/public/posts">Blog</a>
    </div>
    <div class="column">
      <a href="/soccer/public/about">About Us</a>
      <a href="/soccer/public/contact">Contact Us</a>
    </div>
    <form class="column subscribe" action="javascript:void(0)">
      <h4 class="caption">Subscribe for updates</h4>
      <p class="summary">Stay informed on SoccerManagment news, announcements and new features!</p>
      <input class="email" type="email" placeholder="Enter your email" />
      <button type="submit">Submit</button>
    </form>
  </div>

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

</div>
<script>
function doSlide(slider) {
  var id,
    o = slider.querySelectorAll("input.slide"),
    last = o.length - 1,
    current = slider.querySelector("input.slide:checked");
  for (var i = 0; i < o.length; i++)
    if (o[i] === current) {
      id = i;
      break;
    }
  o[id >= last ? 0 : id + 1].click();
}
function onSlide(e) {
  var o = e.target.parentNode;
  clearTimeout(o.autoslider);
  o.autoslider = setTimeout(function() {
    doSlide(o);
  }, 7e3);
}
$(function() {
  $(document).on("click", "input.slide", onSlide);
  $(".slider").each(function() {
    doSlide(this);
  });
});
</script>

</body>
</html>
