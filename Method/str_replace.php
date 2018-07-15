<?
$str="<a href='http://phplike.blogspot.com'>'PHP Like' blog</a>";
$str="<table><tr><th>a</th><th>b</th></tr></tr><td>A</td><td></td> </table>";
echo $str."<BR>";
$text = htmlspecialchars($str, ENT_QUOTES);
echo $text."<BR>";




$find = array("Hell","o");
$replace = array("B","O","D");
$arr = array("Hello","world","!");
print_r(str_replace($find,$replace,$arr));
?>
