<?php
# Load current advanced.yaml settings
include('spyc.php');
$adv = Spyc::YAMLLoad('/config/cfg/advanced.yaml');

$recipients_array = implode(',',$adv['mail']['recipients']);
$recipients_email_array = implode(',',$adv['mail']['recipients_email']);
$libraries_to_skip_array = implode(',',$adv['plex']['libraries_to_skip']);
?>
