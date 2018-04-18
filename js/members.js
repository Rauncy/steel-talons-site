var memberTabIsOpen = false;

function toggleMemberTab(){
  var target = document.getElementById("memberBox");
  target.style.animationName = "closeMemberTab";
  if(memberTabIsOpen){
    target.style.animationName = "closeMemberTab";
    setTimeout(()=>{
      target.style.display = "none";
    }, 300);
  }
  else{
    target.style.animationName = "openMemberTab";
    target.style.display = "inline";
  }
  memberTabIsOpen = !memberTabIsOpen;
}
