<?php
$sessions = new array();

function addSession($userID, $ip){
  //Returns a random string to use as an access code to the session
  $hash = "";
  for($i=0;$i<32;$i++) $hash .= chr(dechex(rand(0,15)));
  if(!isset($sessions[$userID])) $sessions[$userID] => $ip . " " . ;
}

function isSession($hash, $ip){
  //Takes a hash that should be equal to the hash stored in the hash base

}
?>
