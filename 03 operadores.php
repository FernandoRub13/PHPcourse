<?php

	$x = 5;
	$y = 10;

	echo $x+$y."<br/>";
	echo $x-$y."<br/>";
	echo $x*$y."<br/>";
	echo $x/$y."<br/>";
	echo $x%$y."<br/>";
	echo $x**$y."<br/>"."<br/>"."<br/>";

	 $x+=$y; 
	echo $x."<br/>";
	 $x-=$y; 
	echo $x."<br/>";
	 $x*=$y; 
	echo $x."<br/>";
	 $x/=$y; 
	echo $x."<br/>";
	 $x%=$y; 
	echo $x."<br/>";
	 $x**=$y;
	echo $x."<br/>";
	

	var_dump($x === $y)."<br/>";
	var_dump($x > $y)."<br/>";
	var_dump($x < $y)."<br/>";
	var_dump($x <= $y)."<br/>";
	var_dump($x >= $y)."<br/>";
	var_dump($x <> $y)."<br/>";
	var_dump($x != $y)."<br/>";
	var_dump($x !== $y)."<br/>";


	echo $x++."<br/>";
	echo $x--."<br/>";
	echo --$x."<br/>";
	echo --$x."<br/>";
?>