<?php
# check for details checkbox
if (empty($_POST['test_details'])) {
	$command = "combinedreport -t";
}
else {
	$command = "combinedreport -d -t";
}
# run test report
exec("$command", $output, $return);
	if($return !== 0) {
		echo "report failed";	
	}
	else {
		echo "report completed";
	}
?>
