<!DOCTYPE html>
<html>
<head>
<style> 
div {
    width: 100px;
    height: 100px;
    background-color: red;
    position: relative;
    -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
    -webkit-animation-duration: 4s; /* Safari 4.0 -8.0*/
	-webkit-animation-iteration-count: infinite;
	/*-webkit-animation-direction: reverse; //กลับด้าน webkit ใช้กับ safari */
	/* -webkit-animation: myfirst 5s linear 2s infinite alternate; /* Safari 4.0 - 8.0 
} สามารถประกาศยาวได้ */
	-webkit-animation-direction: alternate; 
    animation-name: example;
    animation-duration: 4s;
    animation-iteration-count: infinite;
    /*animation-direction: reverse; //กลับด้านทิศ */
    animation-direction: alternate; //กลับไปเรื่อยๆ
	/* animation: myfirst 5s linear 2s infinite alternate; // ประกาศยาวได้ */
}

/* Safari 4.0 - 8.0 */
@-webkit-keyframes example {
    0%   {background-color:red; left:0px; top:0px;}
    25%  {background-color:yellow; left:200px; top:0px;}
    50%  {background-color:blue; left:200px; top:200px;}
    75%  {background-color:green; left:0px; top:200px;}
    100% {background-color:red; left:0px; top:0px;}
}

/* Standard syntax */
@keyframes example {
    0%   {background-color:red; left:0px; top:0px;}
    25%  {background-color:yellow; left:200px; top:0px;}
    50%  {background-color:blue; left:200px; top:200px;}
    75%  {background-color:green; left:0px; top:200px;}
    100% {background-color:red; left:0px; top:0px;}
}
</style>
</head>
<body>

<p><b>Note:</b> This example does not work in Internet Explorer 9 and earlier versions.</p>

<div></div>

</body>
</html>