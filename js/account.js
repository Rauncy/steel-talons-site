function register(){


  var email = document.getElementById('registerEmail').value;
  var pass = document.getElementById('registerPassword').value;
  var confirmPass = document.getElementById('confirmPassword').value;

  if(pass != confirmPass){
      alert("Your passwords did not match!");
      location.reload();
  }
  else if (pass.length < 6) {
      alert("Please make your password at least 6 digits long!");
      location.reload();
  }
  else if(!email.test(/.?@.?\./)){
    alert("Please enter a valid email address!");
    location.reload();
  }
}
