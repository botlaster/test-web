<html>
<body>
<script language="javascript">
function swap(name) {
  document.getElementById("image").src = name;
}
</script>
<img id="image" src="other.jpg" height="100px"
     onmouseover="javascript:swap('male.png');"
     onmouseout="javascript:swap('female.png');">
</body>
</html>
