<?php
//file name is first two digits of the hash
class Session{
  $ip;
  $id;
  $hash;

  __construct($ip, $id, $hash){
    $this->ip = $ip;
    $this->id = $id;
    $this->hash = $hash;
  }
}

if(isset($GLOBALS['sessions']){

}if(isset($GLOBALS['sessionHashes'])){

}if(isset($GLOBALS['sessionIPs'])){

}if(isset($GLOBALS['sessionIDs'])){

}
?>
