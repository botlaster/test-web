<html>
    <head>
        <title>popup</title>
        <script>function reload_view(t) {
   window.opener.location.reload();
   setTimeout("self.close()",(t * 1000));
}</script>
    </head>
    <body>
		<button name='555' type="submit" onClick="reload_view(1)">56456</button>
    </body>
</html>
