<?php

echo "TEST"."<BR>";


function abc($a)
{
	$b =	  $a > 100 ? ">100" : ($a>80 
				? ">80" 
				: ($a > 60 
					? ">60" 
					: ($a>40 
						? ">40" 
						: ($a>20 
							? ">20" 
							: ($a>0 
								? ">0" 
								: "<=0")))));
	echo $a.$b."<BR>";
}
abc(101);
abc(81);
abc(61);
abc(41);
abc(21);
abc(1);
abc(0);
abc(-1);
