function registerCheck(){

  var email = document.getElementById('registerEmail').value;
  var pass = document.getElementById('registerPassword').value;
  var confirmPass = document.getElementById('confirmPassword').value;

  if(pass != confirmPass){
      alert("Your passwords do not match. Please try again.");
      return false;
  }
  else if (pass.length < 6) {
      alert("Your password must be at least 6 characters long!");
      return false;
  }
  else if(!email.test(/.+?@.+?\..+/)){
    alert("Please enter a valid email address!");
    return false;
  }

  return true;
}
