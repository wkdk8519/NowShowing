<?php include("../../../opt/php/password_protect.php"); ?>
<?php
include('../../../opt/php/spyc.php');

if(isset($_POST['gettoken'])) {
	$adv_file = "../../cfg/advanced.yaml";
	
	putenv("PLEX_USERNAME=$_POST['plex_username']");
    putenv("PLEX_PASSWORD=$_POST['plex_password']");
    exec('ruby /usr/local/sbin/gettoken');
	
	$token = Spyc::YAMLLoad('../../cfg/token.yaml');
	$adv_array['plex'] = array('api_key' => $token);
	
	$token_yaml = Spyc::YAMLDump($adv_array,2,0);
	file_put_contents($adv_file, $token_yaml);
}
?>