<!DOCTYPE html>
<html>
<body>

<p id="myP" style="display:none;">This is a p element.</p>

<button type="button" onclick="myFunction()">Return the display type of p</button>

<script>
function myFunction() {
    alert(document.getElementById("myP").style.display);
}
</script>

</body>
</html>
