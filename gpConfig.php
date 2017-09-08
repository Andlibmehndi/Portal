<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '34305658822-bap28hliq7lo28gortbluo269gjdg479.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'YAL921uPQARW9JpgoU2hcsjx'; //Google client secret
$redirectURL = 'http://localhost/portal/login_signup.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to BAProject.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);
$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
