<a id="reflectedlink" href="http://www.google.com/search">http://www.google.com/search</a>
<input id="searchterm"/>

<script type="text/javascript">
    var link= document.getElementById('reflectedlink');
    var input= document.getElementById('searchterm');
    input.onchange=input.onkeyup= function() {
        link.search= '?q='+input.value;
        link.firstChild.data= link.href;
    };
	input.onblur=function()
	{
		window.location.href=link;
	}
</script>