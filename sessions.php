<?php
//file name is first two digits of the hash
class Session{

  function __construct($ip, $id, $hash){
    $this->ip = $ip;
    $this->id = $id;
    $this->hash = $hash;
  }

  function __toString(){
    return "\nIP: " . $this->ip . " ID: " . $this->id . " Hash: " . $this->hash;
  }
}

class SessionMap{
  //Keys is sorted binarily and values coorelates to keys indexically

  function __construct(){
    $this->keys = array();
    $this->values = array();
  }

  //Keys is sorted binarily
  function indexOf($key){
    //Binary search
    $top = count($keys);
    $bot = 0;
    while($top>=$bot){
      //String compare = strcmp
      $res = (strcmp($key, $keys[floor(($top+$bot)/2)]));
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

  function find($key){
    $i = $this->indexOf($key);
    return ($i==-1 ? null : $values[$i]);
  }

  function get($index){
    return $value[$index];
  }

  //TODO use maps instead of arrays
  function insert($key, $value){
    $top = count($this->keys);
    $bot = 0;
    while($top>$bot){
      $res = (strcmp($key, $this->keys[floor(($top+$bot)/2)]));
      if($res<0){
        $top = floor(($top+$bot)/2)-1;
      }elseif($res>0){
        $bot = floor(($top+$bot)/2)+1;
      }
    }
    array_splice($this->keys, floor(($top+$bot)/2), 0, $key);
    array_splice($this->values, floor(($top+$bot)/2), 0, $value);
  }

  function getKeys(){
    return $keys;
  }

  function getValues(){
    return $values;
  }
}

//Session modification functions
function createSession($id, $ip){
  $rand = "";
  for($i = 0; $i<32; $i++){
    $t = floor(rand(0,16));
    if($t>9) $rand .= chr($t+87);
    else $rand .= $t;
  }
  $i = count($GLOBALS['sessions']);
  array_push($GLOBALS['sessions'], new Session($ip, $id, $rand));
  $GLOBALS['sessionHashes']->insert($rand);
  $GLOBALS['sessionIPs']->insert($ip);
  $GLOBALS['sessionIDs']->insert($id);
}


function initialize(){
  $GLOBALS['sessions'] = array();
  $GLOBALS['sessionHashes'] = new SessionMap();
  $GLOBALS['sessionIPs'] = new SessionMap();
  $GLOBALS['sessionIDs'] = new SessionMap();
}

if(!isset($GLOBALS['sessions'])) initialize();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Test</title>
</head>
<body>
  <h1 id="testText"><?php createSession(1, $_SERVER['REMOTE_ADDR']); echo count($GLOBALS['sessions']);?></h1>
</body>
</html>
