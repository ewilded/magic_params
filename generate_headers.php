<?php
$words=file('list.txt');
$output=array();
$output2=array();
$output3=array();
foreach($words as $w)
{
	$w=trim($w);
	$output[]="$w=1";
	$output2[]="$w=true";
	$output3[]="$w=yes";
}
echo "Cookie: ".join('; ',$output)."\n\n";
echo "Cookie: ".join('; ',$output2)."\n\n";
echo "Cookie: ".join('; ',$output3)."\n\n";

echo "GET/POST: ".join('&',$output)."\n\n";
echo "GET/POST: ".join('&',$output2)."\n\n";
echo "GET/POST: ".join('&',$output3)."\n\n";
?>
