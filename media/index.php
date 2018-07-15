<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<audio  autoplay loop>
  <source src="Floating flow - Foxtail Grass.ogg" type="audio/ogg">
  <source src="Floating flow - Foxtail Grass.mp3" type="audio/mp3">
Your browser does not support the audio element.
</audio>
<video id="myVideo" width="50%" height="50%" controls>
  <source src="1.mp4" type="video/mp4">
  <source src="mov_bbb.ogg" type="video/ogg">
  Your browser does not support HTML5 video.
</video>
<button onclick="getVolume()" type="button">What is the volume?</button>
<button onclick="setHalfVolume()" type="button">Set volume to 0.2</button>
<button onclick="setFullVolume()" type="button">Set volume to 1.0</button>
<script>
var vid = document.getElementById("myVideo");

function getVolume() { 
    alert(vid.volume);
} 
  
function setHalfVolume() { 
    vid.volume = 0.2;
} 
  
function setFullVolume() { 
    vid.volume = 1.0;
} 
</script> 
<p>new blank page <a href="https://www.google.com/" target="_blank">Google</a>.</p><br />
<p>in page <a href="https://www.google.com/">Google</a>.</p>
</body>
</html>