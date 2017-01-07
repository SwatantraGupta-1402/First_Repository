<?php 

$a=10;
$b=20;
list($a,$b) = array($b,$a);
echo "Swaping Value of a is"." " . $a;
echo "</br>";
echo "Swaping Value of b is"." " . $b; 

?>
<?php echo "<hr>"; ?>

<?php 

for ($row=0; $row <=5 ; $row++) { 
	for ($col=1; $col<=$row ; $col++) { 
		echo "*";
	}
	echo "</br>";
}
?>

<?php echo "<hr>"; ?>

<?php 

for ($row=0; $row <=5 ; $row++) { 
	for ($col=5-$row; $col>=1 ; $col--) { 
		echo "*";
	}
	echo "</br>";
}
?>

<?php echo "<hr>"; ?>

<?php 
for($row=0 ; $row<=5 ; $row++) {
	echo str_repeat('*', $row);
	echo "</br>";
	}
?>

<?php echo "<hr>"; ?>

<?php 
$swat = "Swatantra is a software Developer in Tracknovate MRM Pvt. Ltd. at Indore";
function swat($var) { 

$a = explode(" ", $var);
return $a;

}

print_r(swat($swat));
?>

<?php echo "<hr>"; ?>

<?php 
$test = array('Swatantra', 'is', 'a', 'software', 'Developer', 'in', 'Tracknovate', 'MRM', 'Pvt.', 'Ltd.', 'at', 'Indore');
function demo($var) { 

$a = implode(" ", $var);
return $a;

}

print_r(demo($test));

?>

<?php echo "<hr>"; ?>

<?php 
$str1 = array('Red','Green','Yellow','Red','Black','Green','Cyan','Black');
$str2 = array('BMW','AUDI','HONDA','SUZUKI','FORD','MAHINDRA','ISUZU','JAGUAR');
print_r(array_unique($str1));
echo "</br>";
print_r(array_merge(array_unique($str1),$str2));
?>

<?php echo "<hr>"; ?>

<pre>
<?php 
$name = array('Swatantra','Rohit','Pragya','Neha','Shiril','Mahima');
$age = array('25','28','23','22','24','24',);
$person = array_combine($name, $age);
print_r($person);
?>
</pre>

<?php echo "<hr>"; ?>

<pre>
<?php 
$name = array('Swatantra','Rohit','Pragya','Neha','Shiril','Mahima');
$age = array('25','28','23','22','24','24',);
$person = array_merge_recursive($name, $age);
print_r($person);
?>
</pre>

<?php echo "<hr>"; ?>

<pre>
<?php 
$name = array("Swatantra","Rohit","Pragya","Neha","Shiril","Mahima");
//$age = array('25','28','23','22','24','24',);
array_pop($name);
print_r($name);
?>
</pre>

<?php echo "<hr>"; ?>

<pre>
<?php 
$name = array("Swatantra","Rohit","Pragya","Neha","Shiril","Mahima");
$name1 = array("0"=>"Swatantra","1"=>"Rohit","2"=>"Pragya","3"=>"Neha","4"=>"Shiril","5"=>"Mahima");
//$age = array('25','28','23','22','24','24',);
array_push($name,"Neelesh","Brijesh","Narendra","Vikash");
array_push($name1,"Raj","Sumit","Abhishek","Priyanka");
print_r($name);
print_r($name1);
?>
</pre>

<?php echo "<hr>"; ?>
<pre>
<?php 
	$raja = array("0"=>"Swat","1"=>"Gupta","2"=>"Ramji","3"=>"Gupta");
	array_shift($raja);
	print_r($raja);
?>
</pre>

<?php echo "<hr>"; ?>
<pre>
<?php 
	$raja = array("0"=>"Swat","1"=>"Gupta","2"=>"Ramji","3"=>"Gupta");
	echo array_shift($raja);
	echo "</br>";
	print_r($raja);
?>
</pre>

<?php echo "<hr>"; ?>
<pre>
<?php
$a=array("red","green","blue","yellow","brown");
print_r(array_slice($a,2));
print_r(array_slice($a,1,2));
print_r(array_slice($a,-2,1));
print_r(array_slice($a,1,2,true));
print_r(array_slice($a,1,2,false));
?>
<?php echo "<hr>"; ?>
<?php
$a=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow","e"=>"brown");
print_r(array_slice($a,1,2));

$a=array("0"=>"red","1"=>"green","2"=>"blue","3"=>"yellow","4"=>"brown");
print_r(array_slice($a,1,2));
?>

</pre>
<?php echo "<hr>"; ?>

<pre>
	
<?php
$a=array("a"=>"red","b"=>"green");
//array_unshift($a,"blue");
print_r(array_unshift($a,"blue"));
echo "</br>";
print_r($a);
?>

</pre>

<pre>
	<?php 
		function Redo($v1,$v2) {
			return $v1. "*" .$v2;
		}
		$amp = array("Swatantra","Freedom","Vipin");
		print_r(array_reduce($amp, "redo"));
		echo "</br>";
		print_r(array_reduce($amp, "redo",10));

	?>
	<?php echo "<hr>"; ?>

	<?php 
		function Redos($v1,$v2) {
			return $v1+$v2;
		}
		$amp = array("10","20","40");
		print_r(array_reduce($amp, "Redos",10));
		
	?>
</pre>

<?php echo "<hr>"; ?>

<pre>
	<?php
		function myfunction($num)
		{
		  return($num*$num);
		}

		$a=array(1,2,3,4,5);
		print_r(array_map("myfunction",$a));
	?>
<?php echo "<hr>"; ?>
	<?php
		function myfunctions($v) 
		{
		$v=strtoupper($v);
		  return $v;
		}

		$a=array("Animal" => "Elephant", "Type" => "Big");
		print_r(array_map("myfunctions",$a));
    ?>

<?php echo "<hr>"; ?>
    <?php
		function myfunct($v1,$v2)
		{
		if ($v1===$v2)
		  {
		  return "same";
		  }
		return "different";
		}

		$a1=array("Horse","Dog","Cat");
		$a2=array("Cow","Dog","Rat");
		print_r(array_map("myfunct",$a1,$a2));
	?>

<?php echo "<hr>"; ?>
	<?php
		$a1=array("Dog","Cat");
		$a2=array("Puppy","Kitten");
		print_r(array_map(null,$a1,$a2));
	?>
</pre>

<?php echo "<hr>"; ?>

<pre>

<?php
function test_odd($var)
{
return($var & 2);
}

$a1=array("a","b",2,3,4);
print_r(array_filter($a1,"test_odd"));
?>
</pre>