<?php
$sessions = new array();

function addSession($userID, $ip){
  //Returns a random string to use as an access code to the session
  $hash;
  do{
    $hash = "";
    for($i=0;$i<32;$i++) $hash .= chr(dechex(rand(0,15)));
  }while(isset($sessions[$hash . " " . $ip]));

  $sessions[$hash . " " . $ip] => $userID;
  return true;
}

function isSession($hash, $ip){
  //Takes a hash that should be equal to the hash stored in the hash base
  if array_key_exists($hash . " " . $ip, $sessions)
    return $sessions[$hash . " " . $ip];
  else return -1;
}

function deleteSession($hash, $ip){
  if(array_key_exists($hash . " " . $ip, $sessions))
    unset($sessions[$hash . " " . $ip]);
}
?>
