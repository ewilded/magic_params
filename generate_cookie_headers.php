<?php
$words=file('list.txt');
$output=array();
$output2=array();
foreach($words as $w)
{
	$w=trim($w);
	$output[]="$w=1";
	$output2[]="$w=true";
}
echo "Cookie: ".join('; ',$output)."\n";
echo "Cookie: ".join('; ',$output2)."\n";
?>
