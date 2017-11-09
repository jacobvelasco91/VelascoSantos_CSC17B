function validate(){
var email = document.forms["loginform"]["email"].value;
var pass = document.forms["loginform"]["password"].value;

console.log(email);
console.log(pass);
var emailReg = /^[a-zA-Z0-9]+(\.)?[a-z0-9]+@([a-z0-9]+)?(\.)?([a-z0-9]+)?\.(com|net|org|io|edu|gov)*$/im;
var passReg = /^[a-zA-Z0-9(!@#$%^&*()_+}{|"?><~)]{8,25}$/m;

var valemail = emailReg.test(email);
var valpass = passReg.test(pass);
console.log(valemail);
console.log(valpass);




if (valemail == false || valpass == false) {
  if (valemail == false && valpass == false ) {
    document.getElementById('valemail').innerHTML = '<small><sup>*</sup>'+
    'incorrect email</small>';
    document.getElementById('valpass').innerHTML = '<small><sup>*</sup>'+
    'must be at least 8 characters long</small>';
  } else if (valemail == false && valpass == true) {
    document.getElementById('valemail').innerHTML = '<small><sup>*</sup>'+
    'incorrect email</small>';
    document.getElementById('valpass').innerHTML = '';
  } else if (valpass == false && valemail == true) {
    document.getElementById('valpass').innerHTML = '<small><sup>*</sup>'+
    'must be at least 8 characters long</small>';
    document.getElementById('valemail').innerHTML = '';
  }
  return false;
}else if (valemail == true && valpass == true) {
  localStorage.setItem("user",email);
  return true;
}

}
