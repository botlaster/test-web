<html>
<body>
<?php
session_start();
?>
<input type="hidden" id="hdnSession" data-value="@Request.RequestContext.HttpContext.Session['abc']" />
<div id="abc">abc</div>
<button onclick="GetUserName()">Try it</button>
<script>

function myFunction() {
    var sessionValue= $("#hdnSession").data('value');
document.getElementById("abc").innerHTML = sessionValue;

}

        var username = "<?php echo $_SESSION['abc'] ?>";
        document.getElementById("abc").innerHTML= username;
    
</script>
</body>
</html>