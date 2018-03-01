<?php

###############################################################
# Page Password Protect 2.13
###############################################################
# Visit http://www.zubrag.com/scripts/ for updates
############################################################### 
#
# Usage:
# Set usernames / passwords below between SETTINGS START and SETTINGS END.
# Open it in browser with "help" parameter to get the code
# to add to all files being protected. 
#    Example: password_protect.php?help
# Include protection string which it gave you into every file that needs to be protected
#
# Add following HTML code to your page where you want to have logout link
# <a href="http://www.example.com/path/to/protected/page.php?logout=1">Logout</a>
#
###############################################################

/*
-------------------------------------------------------------------
SAMPLE if you only want to request login and password on login form.
Each row represents different user.

$LOGIN_INFORMATION = array(
  'zubrag' => 'root',
  'test' => 'testpass',
  'admin' => 'passwd'
);

--------------------------------------------------------------------
SAMPLE if you only want to request only password on login form.
Note: only passwords are listed

$LOGIN_INFORMATION = array(
  'root',
  'testpass',
  'passwd'
);

--------------------------------------------------------------------
*/

##################################################################
#  SETTINGS START
##################################################################

// Add login/password pairs below, like described above
// NOTE: all rows except last must have comma "," at the end of line
$LOGIN_INFORMATION = array(
  'NowShowing' => 'NowShowing'
);

// request login? true - show login and password boxes, false - password box only
define('USE_USERNAME', true);

// User will be redirected to this page after logout
// define('LOGOUT_URL', '../');

// time out after NN minutes of inactivity. Set to 0 to not timeout
define('TIMEOUT_MINUTES', 60);

// This parameter is only useful when TIMEOUT_MINUTES is not zero
// true - timeout time from last activity, false - timeout time from login
define('TIMEOUT_CHECK_ACTIVITY', false);

##################################################################
#  SETTINGS END
##################################################################


///////////////////////////////////////////////////////
// do not change code below
///////////////////////////////////////////////////////

// show usage example
if(isset($_GET['help'])) {
  die('Include following code into every page you would like to protect, at the very beginning (first line):<br>&lt;?php include("' . str_replace('\\','\\\\',__FILE__) . '"); ?&gt;');
}

// timeout in seconds
$timeout = (TIMEOUT_MINUTES == 0 ? 0 : time() + TIMEOUT_MINUTES * 60);

// logout?
if(isset($_GET['logout'])) {
  setcookie("NowShowing", '', $timeout, '/'); // clear password;
  header("Location: http://".$_SERVER['HTTP_HOST']."/admin");
  exit();
}

if(!function_exists('showLoginPasswordProtect')) {

// show login form
function showLoginPasswordProtect($error_msg) {
?>
<html>
<head>
  <title>NowShowing</title>
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
</head>
<body>
  <style>
    input { border: 1px solid black; }
	
	body  { background-image: url("../img/background.jpg"); 
		    color: white;
	}
	
	.mybutton {
	  display: inline-block;
	  vertical-align: middle;
	  -webkit-transform: perspective(1px) translateZ(0);
	  transform: perspective(1px) translateZ(0);
	  box-shadow: 0 0 1px transparent;
	  overflow: hidden;
	  -webkit-transition-duration: 0.2s;
	  transition-duration: 0.2s;
	  -webkit-transition-property: color, background-color;
	  transition-property: color, background-color;
	  background-color: #404040;
	  color: #e6e6e6;
	  padding: 5px 12px;
	  border: 1px solid #e5a00d;
	  font-weight:bold;
	  border-radius: 4px;
	  font-weight: normal;
	  -webkit-box-shadow: inset 0 2px 2px rgba(0,0,0,.075),0 0 2px #e5a00d;
	  box-shadow: inset 0 2px 2px rgba(0,0,0,.075),0 0 2px #e5a00d;
	}
	
	.mybutton:hover, .mybutton:focus, .mybutton:active {
	  background-color: #e5a00d;
	  color: #404040;
	  /* -webkit-box-shadow: inset 0 4px 4px rgba(0,0,0,.075),0 0 4px #e5a00d;
	  box-shadow: inset 0 4px 4px rgba(0,0,0,.075),0 0 4px #e5a00d; */
	}
  </style>
  <div style="width:500px; margin-left:auto; margin-right:auto; text-align:center">
  <form method="post">
    </p>
        <img src="../img/nowshowing-icon.png" alt="NowShowing-Icon" width="68px" style="margin-bottom:5px;margin-right:5px;">
        <img src="../img/nowshowing.jpg" alt="NowShowing" width="400px">
   </p>
    <h3>Admin Access</h3>
    <font color="red"><?php echo $error_msg; ?></font><br />
<?php if (USE_USERNAME) echo 'Username:<br /><input type="input" name="access_login" /><br /><br />Password:<br />'; ?>
    <input type="password" name="access_password" /><p></p>
	<button class="mybutton" type="submit" name="Submit" value="Enter">Login</button>
  </form>
  <br />
  <a style="font-size:9px; color: #B0B0B0; font-family: Verdana, Arial;" href="https://github.com/ninthwalker/nowshowing/wiki" target="_blank">Forgot Password</a>
  <br />
  </div>
</body>
</html>

<?php
  // stop at this point
  die();
}
}

// user provided password
if (isset($_POST['access_password'])) {

  $login = isset($_POST['access_login']) ? $_POST['access_login'] : '';
  $pass = $_POST['access_password'];
  if (!USE_USERNAME && !in_array($pass, $LOGIN_INFORMATION)
  || (USE_USERNAME && ( !array_key_exists($login, $LOGIN_INFORMATION) || $LOGIN_INFORMATION[$login] != $pass ) ) 
  ) {
    showLoginPasswordProtect("Incorrect password.");
  }
  else {
    // set cookie if password was validated
    setcookie("NowShowing", md5($login.'%'.$pass), $timeout, '/');
    
    // Some programs (like Form1 Bilder) check $_POST array to see if parameters passed
    // So need to clear password protector variables
    unset($_POST['access_login']);
    unset($_POST['access_password']);
    unset($_POST['Submit']);
  }

}

else {

  // check if password cookie is set
  if (!isset($_COOKIE['NowShowing'])) {
     showLoginPasswordProtect("");
  }

  // check if cookie is good
  $found = false;
  foreach($LOGIN_INFORMATION as $key=>$val) {
    $lp = (USE_USERNAME ? $key : '') .'%'.$val;
    if ($_COOKIE['NowShowing'] == md5($lp)) {
      $found = true;
      // prolong timeout
      if (TIMEOUT_CHECK_ACTIVITY) {
        setcookie("NowShowing", md5($lp), $timeout, '/');
      }
      break;
    }
  }
  if (!$found) {
     showLoginPasswordProtect("");
  }

}

?>
