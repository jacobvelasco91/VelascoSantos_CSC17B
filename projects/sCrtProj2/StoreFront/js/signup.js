
//WORK ON UPDATING THE DOM NOT CREATING A WHOLE NEW PAGE

function validate(){
  var email = document.forms["signupform"]["email"].value;
  var pass = document.forms['signupform']['pass'].value;
  var cpass = document.forms['signupform']['confirmPass'].value;

  var emailReg = /^[a-zA-Z0-9]+(\.)?[a-z0-9]+@([a-z0-9]+)?(\.)?([a-z0-9]+)?\.(com|net|org|io|edu|gov)*$/im;
  var passReg = /^[a-zA-Z0-9(!@#$%^&*()_+}{|"?><~)]{8,25}$/m;

  var valemail = emailReg.test(email);
  var valpass = passReg.test(pass);

  if (valemail == false || valpass == false) {
    //write code to output to screen that both password and email are wrong
    if (valemail==false && valpass==false) {
      document.write("email/pass error");
    }else if (valemail == false && valpass == true) {
      document.write("email error")
    } else if (valemail==true&&valpass==false) {
      document.write("pass error");
    }
  } else if (valemail ==true && valpass == true) {
    if (pass != cpass) {
      document.write("passwords do not match");
    } else {
      return true;
    }
    return false;
  }

}//END of function
