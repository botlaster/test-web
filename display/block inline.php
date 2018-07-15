<!DOCTYPE html>
<html>
<body>

<p>Select a display type in the list below to change <span id="mySpan" style="color:blue;">this span element's</span> display type.</p>

<select onchange="myFunction(this);" size="3">
<option>block
<option>inline
<option>none
</select>

<script>
function myFunction(x) {
    var whichSelected = x.selectedIndex;
    var sel = x.options[whichSelected].text;
    var elem = document.getElementById("mySpan");
    elem.style.display = sel;
}
</script>

</body>
</html>
