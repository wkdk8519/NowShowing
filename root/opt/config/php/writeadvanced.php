<?php
include('Spyc.php');
if(isset($_POST['submit'])) {
  $file = "../advanced.yaml";

  $libraries_to_skip = explode(',',$_POST['libraries_to_skip']);
  $recipients_email = explode(',',$_POST['recipients_email']);
  $recipients = explode(',',$_POST['recipients']);

  $array['email'] = array('title' => $_POST['title'], 'image' => $_POST['image'], 'footer' => $_POST['footer'], 'language' => $_POST[language]);
  $array['web'] = array('title_image' => $_POST['title_image'], 'logo' => $_POST['logo'], 'headline_title' => $_POST['headline_title'], 'headliners' => $_POST['headliners'], 'footer' => $_POST['web_footer'], 'language' => $_POST['web_language']);
  $array['plex'] = array('plex_user_emails' => $_POST['plex_user_emails'], 'libraries_to_skip' => $libraries_to_skip);
  $array['mail'] = array('from' => $_POST['from'], 'subject' => $_POST['subject'], 'recipients_email' => $recipients_email, 'recipients' => $recipients);
  $array['report'] = array('interval' => $_POST['interval'], 'report_type' => $_POST['report_type'], 'email_report_time' => $_POST['email_report_time'], 'web_report_time' => $_POST[web_report_time], 'extra_details' => $_POST[extra_details], 'test' => $_POST['test']);

  $yaml = Spyc::YAMLDump($array,2,0);
  file_put_contents($file, $yaml);
  #header("Location: index2.php");
  header('Location: '.$_SERVER['PHP_SELF']);
  exit;
}
?>
