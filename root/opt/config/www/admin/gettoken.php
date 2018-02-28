<?php include("../../../opt/php/password_protect.php"); ?>
<?php
include('../../../opt/php/spyc.php');

if(isset($_POST['plex_username']) && isset($_POST['plex_password'])) {
	$adv_file = "../../cfg/advanced.yaml";
	$plex_username = strip_tags($_POST['plex_username']);
	$plex_password = strip_tags($_POST['plex_password']);
	
	putenv("PLEX_USERNAME=$plex_username");
    putenv("PLEX_PASSWORD=$plex_password");
	sleep(15);
    exec('ruby /usr/local/sbin/gettoken');
	sleep(15);
	
		if (file_exists('../../cfg/token.yaml')) {
			$token = Spyc::YAMLLoad('../../cfg/token.yaml');
			$adv_array = Spyc::YAMLLoad('../../cfg/advanced.yaml');
			$adv_array['token'] = array('api_key' => $token['token']['api_key']);
		
			$adv_yaml = Spyc::YAMLDump($adv_array,2,0);
			file_put_contents($adv_file, $adv_yaml);
			sleep(1);
			unlink('../../cfg/token.yaml');
			echo "Plex Token Saved!";
			exit;
		}
		else {
			echo "Plex token retrieval failed: Check username/password.";
			exit;
		}
}
echo "Check username/password";
exit;
?>