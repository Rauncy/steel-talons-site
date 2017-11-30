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

class MapEntry{
  $key;
  $value;

  __construct($key, $value){
    $this->key = $key;
    $this->value = $value;
  }
}

class SessionMap{
  //Keys is sorted binarily and values coorelates to keys indexically
  $keys;
  $values;

  __construct(){
    $keys = new array();
    $values = new arary();
  }

  //Keys is sorted binarily
  function indexOf($key){
    //Binary search
    $top = count($keys);
    $bot = 0;
    while($top>=$bot){
      //String compare = strcmp
      $res = strcmp($key,$keys[floor(($top+$bot)/2)]);
      if($res<0){
        $top = floor(($top+$bot)/2)-1;
      }elseif($res>0){
        $bot = floor(($top+$bot)/2)+1;
      }else{
        return floor(($key+$val)/2);
      }
    }
    return -1;
  }

  function get($key){
    $i = $this->indexOf($key);
    return ($i==-1 ? null : $keys[$i]));
  }
}

function initialize(){
  $GLOBALS['sessions'] = new SessionMap();
  $GLOBALS['sessionHashes'] = new array();
  $GLOBALS['sessionIPs'] = new array();
  $GLOBALS['sessionIDs'] = new array();
}

function validateIP($hash, $ip){

}

//Only works for MapEntry arrays that are sorted
function find($value, $array){

}

//Only works for MapEntry arrays that are sorted
function insert($value, $array){

}

//Sorts a MapEntry array by key
function sort($array){

}

if(isset($GLOBALS['sessions'])) initialize();
?>
