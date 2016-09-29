<?php
$myfile = fopen("displayindianamt_inp.txt", "r") or die("Unable to open file!");
$i=0;
$total_test_case_cn = 0;
$amount_arr = array();
echo "Input Data <br>";
while ($line = fgets($myfile)) {
  // <... Do your work with the line ...>
  if($i ==0)
	$total_test_case_cn = $line;
  else
	array_push($amount_arr, $line);

	echo "$line <br>";
	$i++;
}
fclose($myfile);
echo "<br>";

if($total_test_case_cn == count($amount_arr)){
	setlocale(LC_MONETARY, 'en_IN');
	echo "Output Data <br>";
	foreach($amount_arr as $v){
		if(strlen($v) <= 10000){
			$amount = $v;
			if (ctype_digit($amount) ) {
				// is whole number
				// if not required any numbers after decimal use this format
				$amount = money_format('%!.0n', $amount);//on windows server it will give undefined function
			}
			else {
				// is not whole number
				$amount = money_format('%!i', $amount);
			}
			echo $amount;
			echo "<br>";
		}
		else{
			echo "amount field length should be less than 10k <br>";
		}
	}
}
else{
	echo "Total Testcase amount is diferent than given no. test cases <br>";
}

?>