<!DOCTYPE html>
<html>
<body>

<form action="/action_page.php" method="get">
  First name: <input type="text" name="fname"><br>
  Last name: <input type="text" name="lname"><br>
  <button type="submit">Submit</button>
  <button type="submit" formmethod="post" formaction="/action_page_post.php">Submit using POST</button>
</form>

<p><strong>Note:</strong> The formmethod attribute of the button tag is not supported in Internet Explorer 9 and earlier versions.</p>

</body>
</html>
