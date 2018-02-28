<?php include("../../../opt/php/password_protect.php"); ?>
<?php
include('../../../opt/php/spyc.php');
$adv_file = "../../cfg/advanced.yaml";

if(isset($_POST['plex_username']) && isset($_POST['plex_password'])) {

$descriptorspec = array(
   0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
   1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
   2 => array("file", "/config/error-output.txt", "a") // stderr is a file to write to
);
$process = proc_open('ruby /usr/local/sbin/gettoken-pipes', $descriptorspec, $pipes);

	if (is_resource($process)) {
		$userpass = strip_tags($_POST['plex_username']) . '|+/+/+|' . strip_tags($_POST['plex_password']);
		fwrite($pipes[0], $userpass);
		fclose($pipes[0]);

		// ideas about updating the token input field: echo back the api key and json datatype parse the return values.
		// or only echo back api key and do a .match rejex somehow?
		// also 'token' value right now is also returning error messages. da fuq!
		$token = stream_get_contents($pipes[1]);
		$token = str_replace("\n", '', $token);
		fclose($pipes[1]);
		proc_close($process);
	}
	
	$adv_array = Spyc::YAMLLoad('../../cfg/advanced.yaml');
	$adv_array['token'] = array('api_key' => $token);

	$adv_yaml = Spyc::YAMLDump($adv_array,2,0);
	file_put_contents($adv_file, $adv_yaml);
	echo "Plex Token Saved!";
	exit;
}
echo "Check username/password!";
exit;
?>