<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';

if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	$user = new User();
	
	//Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
	$_SESSION['userData'] = $userData;
	
	//Render facebook profile data
    if(!empty($userData)){
       /* $output = '<h1>Google+ Profile Details </h1>';
        $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Email : ' . $userData['email'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Locale : ' . $userData['locale'];
        $output .= '<br/>Logged in with : Google';
        $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        $output .= '<br/>Logout from <a href="logout.php">Google</a>'; */
        //$_SESSION["user"]=$userData['email'];
		header("Location: home.php");
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
	$authUrl = $gClient->createAuthUrl();
	$output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="img/icons/google-1.gif" height="100px" width="100px" alt=""/></a>';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/flash.css"/>
<script type="text/javascript" src="js/pace.js"></script>

<script type="text/javascript" src="js/index.js"></script>
<script type="text/javascript">
function myFunction() {
    var pass1 = document.getElementById("spassword").value;
    var pass2 = document.getElementById("spassword2").value;
    var ok = true;
    if (pass1 != pass2) {
        alert("Passwords Do not match");
        document.getElementById("spassword").style.borderColor = "#E34234";
        document.getElementById("spassword2").style.borderColor = "#E34234";
        ok = false;
    }
    else {
        alert("Passwords Match!!!");
         document.getElementById("spassword").style.borderColor = "#48ce0a";
        document.getElementById("spassword2").style.borderColor = "#48ce0a";
		ok = true;
    }
    return ok;
}
</script>
</head>

<body>
<img src="http://image005.flaticon.com/1/svg/74/74229.svg" alt="user icon" class="logo">
    <div class="cd-tabs">
      <nav>
        <ul class="cd-tabs-navigation">
          <li><a href="#" data-content="login" class="selected">login</a></li>
          <li><a href="#" data-content="signup">signup</a></li>
        </ul>
      </nav>
      <ul class="cd-tabs-content">
        <li data-content="login" class="selected">
          <form enctype="multipart/form-data" name="login-form" method="post" action="checklogin.php">	
            <div class="form-fild">
              <label for="email">Email</label>
              <input type="email"  pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}"  name="email" placeholder="          example: abc@gmail.com" required>
            </div>
            <div class="form-fild">
              <label for="password">password</label>
              <input type="password" name="password" pattern=".{2,12}" title="2 to 12 characters" required>
            </div>
            

            <span class="error"></span>
            <button type="submit">Submit</button><button type="reset">Reset</button>
            <center> <?php echo $output; ?> </center>
		</form>
        </li>
        <li data-content="signup">
          <form enctype="multipart/form-data" name="signup-form" method="post" action="checksignup.php">
            <div class="form-fild">
              <label for="sfullname">fullname</label>
              <input type="text" name="sfullname" placeholder="              Example:Name Surname" required>
            </div>
            <div class="form-fild">
              <label for="semail">Email</label>
              <input type="email" name="semail" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,}" placeholder="            Example: abc@gmail.com" required>
            </div>
			

            <div class="form-fild">
              <label for="spassword">password</label>
              <input type="password" id="spassword" name="spassword" pattern=".{2,12}" title="2 to 12 characters" required>
            </div>
            <div class="form-fild">
              <label for="spassword2">password again</label>
              <input type="password" id="spassword2" name="spassword2" onchange="myFunction()" required>
            </div>
              <div class="form-fild">
            <input type="file" name="uploaded" >
            </div>

            <span class="error"></span>
            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
          </form>
        </li>
      </ul>
    </div> <!-- end cd-tabs -->
   
</body>

</html>
