<?php
include('header.php');
?>
 <link rel="stylesheet" type="text/css" href="./css/news.css">
 <link rel="stylesheet" href="video.css">
<title>Vidéos</title>
<!--
  Don't use the "5-unsafe" CDN version in your own code. It will break on you. 
  Instead go to videojs.com and copy the CDN urls for the latest version.
-->

<div id="instructions">

  <video id="my_video_1" class="video-js vjs-default-skin" width="640px" height="267px"
      controls preload="none" poster='http://video-js.zencoder.com/oceans-clip.jpg'
      data-setup='{ "aspectRatio":"640:267", "playbackRates": [1, 1.5, 2] }'>
    <source src="https://vjs.zencdn.net/v/oceans.mp4" type='video/mp4' />
    <source src="https://vjs.zencdn.net/v/oceans.webm" type='video/webm' />
  </video>

  <p>Custom skin for <a href="http://www.videojs.com" target="_blank">video.js</a>. Requires v5.0.0 or higher.</p>
  
  <h2>HOW TO CUSTOMIZE:</h2>
  <ol>
    <li>Click the CodePen <strong>Fork</strong> link above to create a new copy</li>
    <li>Change the CSS (SCSS) as desired</li>
    <li>Click <strong>Save</strong> to save your changes</li>
    <li>Click <strong>Settings</strong> to name and describe your skin</li>
    <li>Click the <strong>Share</strong> link to tweet your skin, and include @videojs so we know about it</li>
  </ol>
  <h2>HOW TO USE:</h2>
  <ol>
    <li>Click "Refresh" if you made any changes</li>
    <li>Copy the CSS contents of the following box</li>
    <li>Include it in the page with your player in a &lt;style&gt; tag or with a <a href="https://www.w3schools.com/css/css_howto.asp">stylesheet include</a></li>
  </ol>
  <textarea id="css_result"></textarea>
  <button id="refresh">Refresh</button>
</div>
  
<style>
  #instructions { max-width: 640px; text-align: left; margin: 30px auto; }
  #instructions textarea { width: 100%; height: 100px; }
  
  /* Show the controls (hidden at the start by default) */
  .video-js .vjs-control-bar { 
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
  }

  /* Make the demo a little prettier */
  body {
    margin-top: 20px;
    background: #222;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    background: radial-gradient(#333, hsl(200,30%,6%) );
  }

</style>
<script src="./js/video.js"></script>
