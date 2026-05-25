<?php

require ( '/home/hitsevey/public_html/koshkcomics/FB/Facebook/autoload.php' );

$fb = new Facebook\Facebook([
  'app_id' => '170161316509571',
  'app_secret' => '92fcf6d4ac1dc115b01755afaacd4f9f',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getCanvasHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  echo 'No OAuth data could be obtained from the signed request. User has not authorized your app yet.';
  exit;
}

// Logged in
//echo '<h3>Signed Request</h3>';
//var_dump($helper->getSignedRequest());

//echo '<h3>Access Token</h3>';
//var_dump($accessToken->getValue());


try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,first_name, last_name', $accessToken->getValue());
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();

//echo 'Name: ' . $user['name'];


//header('Location: https://www.koshkcomics.org/public/auth/facebook/login');
//header('Location: https://www.koshkcomics.org/public/login');
header('Location: https://koshkcomics.com/FB/home.php?book=11&id=7&fname='.$user['first_name'].'&fid='.$user['id'].'&lname='.$user['last_name']);

/* header('Location: https://koshkcomics.com/FB/comicbook.php?book=11&id=11'); End of file index.php */
/* Location: ./index.php */