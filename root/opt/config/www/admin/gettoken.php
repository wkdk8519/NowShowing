<?php include("../../../opt/php/password_protect.php"); ?>
<?php
include('../../../opt/php/spyc.php');

if(isset($_POST['gettoken'])) {
	$adv_file = "../../cfg/advanced.yaml";
	$plex_username = strip_tags($_POST['plex_username']);
	$plex_password = strip_tags($_POST['plex_password']);
	
	putenv("PLEX_USERNAME=$plex_username");
    putenv("PLEX_PASSWORD=$plex_password");
    exec('ruby /usr/local/sbin/gettoken');
	
	if (file_exists('../../cfg/token.yaml')) {
		$token = Spyc::YAMLLoad('../../cfg/token.yaml');
		$adv_array = Spyc::YAMLLoad('../../cfg/advanced.yaml');
		$adv_array['token'] = array('api_key' => $token['token']['api_key']);
	
		$adv_yaml = Spyc::YAMLDump($adv_array,2,0);
		file_put_contents($adv_file, $adv_yaml);
		sleep(1);
		unlink('../../cfg/token.yaml');
		echo "Plex Token Saved!";
	}
	else {
		echo "Check username/password. Plex token retrieval failed.";
	}
    header("Location: http://".$_SERVER['HTTP_HOST']."/admin/#setup");
    exit;
}
?>