var memberTabIsOpen = false;
var currentUser = null;

function closeMemberTab(){
  var target = document.getElementById("memberBox");
  target.style.animationName = "closeMemberTab";
  setTimeout(()=>{
    target.style.display = "none";
  }, 250);
  memberTabIsOpen = false;
}

function saveMemberTab(){
  console.log("save");
  if(!currentUser) return;
  var req = new XMLHttpRequest();
  req.onload = function(){
    console.log("resp " + req.responseText);
    currentUser = null;
    closeMemberTab();
    setTimeout(() => {
      //Reload data
    }, 300);
  }
  req.open("POST", "/members/edit.php", true);
  req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var sendData = "user="+currentUser;
  var fields = document.getElementsByTagName("input");
  for(var i=0;i<fields.length;i++){
    console.log(parseInt(fields[i].value)+" "+fields[i].value);
    var isNumber = parseInt(fields[i].value) == fields[i].value;
    sendData+="&"+fields[i].name+"="+encodeURIComponent((isNumber?"":"'")+fields[i].value+(isNumber?"":"'"));
  }
  console.log("sdat " + sendData);
  req.send(sendData);
  return false;
}

function openMemberTab(){
  var target = document.getElementById("memberBox");
  target.style.animationName = "openMemberTab";
  target.style.display = "inline";
  setTimeout(()=>{
    target.style.display = "inline";
  }, 300);
  memberTabIsOpen = true;
}

function loadMemberTab(user){
  var req = new XMLHttpRequest();
  req.onload = function(){
    console.log(req.responseText);
    var data = JSON.parse(req.responseText);
    var all = document.getElementsByTagName("input");
    console.log(all);
    for(k in data){
      console.log(k);
      console.log(all[k]);
      if(all[k]) all[k].value = data[k];
    }
    currentUser = user;
    openMemberTab();
  }
  req.open("GET", "/members/get.php?user="+user, true);
  req.send();
}

function toggleMemberTab(){
  if(memberTabIsOpen) closeMemberTab();
  else openMemberTab();
}
