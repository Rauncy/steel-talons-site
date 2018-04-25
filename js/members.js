var memberTabIsOpen = false;
var currentUser = null;

function closeMemberTab(){
  var target = document.getElementById("memberBox");
  target.style.animationName = "closeMemberTab";
  setTimeout(()=>{
    target.style.display = "none";
  }, 300);
  memberTabIsOpen = false;
}

function saveMemberTab(){
  if(!currentUser) return;
  var req = new XMLHttpRequest();
  req.onload = function(){
    console.log(req.responseText);
    currentUser = null;
    closeMemberTab();
  }
  console.log("/members/edit.php?user="+currentUser);
  req.open("POST", "/members/edit.php", true);
  req.send("user="+currentUser);
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
    var all = document.getElementsByClassName("memberBoxField");
    console.log(all);
    for(k in data){
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