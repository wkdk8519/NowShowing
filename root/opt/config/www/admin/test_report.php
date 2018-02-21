<?php
function run_in_background($Command)
   {
       $PID = shell_exec("nohup $Command > /dev/null 2> /dev/null & echo $!");
       return($PID);
   }
function is_process_running($PID)
   {
       exec("ps $PID", $ProcessState);
       return(count($ProcessState) >= 2);
   }

# check for details   
if (empty($_POST['test_details'])) {
	$testreport = "combinedreport -t";
	}
else {
	$testreport = "combinedreport -d -t";
}
# run test report and check for process and end once completed
$ps = run_in_background("$testreport");
  while(is_process_running($ps))
   {
     echo(" ");
     sleep(1);
   }
?>
