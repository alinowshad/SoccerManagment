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
      <img src="/soccer/public/storage/landingpage/help.jpg" />
      <div align ="center" class="content">
        <h3>Help & Support</h3>
        <p><strong>How We Can Help ??</strong></p>
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
  

  <div class="feature">
        <img class="picture" src="https://d3949ah8cpww7d.cloudfront.net/static/2.240.000/themes/v2/images/frontend/icons/contact/mail.svg" />
        <h4 class="caption">Write Us</h4>
        <p class="summary">In case you did not find an answer in the FAQ, send us a message.</p>
      </div>
    
      <div class="feature">
        <img class="picture" src="https://d3949ah8cpww7d.cloudfront.net/static/2.240.000/themes/v2/images/frontend/icons/contact/phone.svg" />
        <h4 class="caption">Call Us</h4>
        <p class="summary">Explain us on the phone your issue by calling +00 0 00 00 00 00.</p>
      </div>
    
      <div class="feature">
        <img class="picture" src="https://d3949ah8cpww7d.cloudfront.net/static/2.240.000/themes/v2/images/frontend/icons/contact/help.svg" />
        <h4 class="caption">Read the FAQ</h4>
        <p class="summary">You'll find answers to most common questions.</p>
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
