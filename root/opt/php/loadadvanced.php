<?php
# Load current advanced.yaml settings
include('spyc.php');
$adv = Spyc::YAMLLoad('/config/cfg/advanced.yaml');

if (!empty($adv['mail']['recipients'])) {
        $recipients_array = implode(',',$adv['mail']['recipients']);
}
else {
        $recipients_array = "";
}

if (!empty($adv['mail']['recipients_email'])) {
        $recipients_email_array = implode(',',$adv['mail']['recipients_email']);
}
else {
        $recipients_email_array = "";
}

if (!empty($adv['plex']['libraries_to_skip'])) {
        $libraries_to_skip_array = implode(',',$adv['plex']['libraries_to_skip']);
}
else {
        $libraries_to_skip_array = "";
}
?>
