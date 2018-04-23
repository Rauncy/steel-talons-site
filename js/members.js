var memberTabIsOpen = false;

function closeMemberTab(){
  var target = document.getElementById("memberBox");
  target.style.animationName = "closeMemberTab";
  setTimeout(()=>{
    target.style.display = "none";
  }, 300);
  memberTabIsOpen = false;
}

function saveMemberTab(user){
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
    var data = JSON.parse(req.responseText);
    var all = document.getElementsByClassName("memberBoxField");
    all.forEach((data) => {
      if(data[all.name]) all.innerHTML = data[all.name];
      //TODO
    });
  }
  req.open("GET", "/members/get.php?user=""+", true);
  req.send();
}

function toggleMemberTab(){
  if(memberTabIsOpen) closeMemberTab();
  else openMemberTab();
}
