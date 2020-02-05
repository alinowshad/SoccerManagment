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

    <input class="slide" type="radio" name="slider-1" id="s-1-3" checked /><label for="s-1-3"></label>
    <div>
      <img src="/soccer/public/storage/landingpage/about.png" />
      <div align ="center" class="content">
        <h3>About Us</h3>
        <p><strong> More About Our SoccerManagment WebService</strong></p>
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
  
  <div class="features">
        <h4 class="caption">Our Team</h4>
        <p class="summary">A hard-working team that has been driving the world of youth sports forward for over 17 years. We are thought leaders in sports and technology, and connect these worlds through innovation, teamwork, and results-driven success.
                Once three independent youth sports technology providers, Blue Sombrero, Affinity Sports, and Stack Sports joined forces to create a unified, all-in-one solution to help efficiently manage sports organizations worldwide. Our mission is to set the standard in sports technology services. We want to make sports easy by connecting administrators, coaches, teams, and families with tools that help save time, reduce burnout, and grow participation. Our commitment is to be thought leaders to our partners, constantly improve our services, develop customer-focused solutions, and back it with friendly, knowledgeable support. 
        </p>
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
</body>
</html>
