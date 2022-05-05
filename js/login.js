const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
const errormsg = document.querySelector(".msg");

const homeLink = document.querySelector('#home_link');
const adminLink = document.querySelector('#admin_link');
const policeLink = document.querySelector('#police_link');
const userLink = document.querySelector('#user_link');

if(signupBtn){
  signupBtn.onclick = (()=>{
    loginForm.style.marginLeft = "-50%";
    loginText.style.marginLeft = "-50%";
    errormsg.style.display = "none";
  });
}

if(loginBtn){
  loginBtn.onclick = (()=>{
    loginForm.style.marginLeft = "0%";
    loginText.style.marginLeft = "0%";
  });
}

if(signupLink){
  signupLink.onclick = (()=>{
    signupBtn.click();
    return false;
  });
}
var check = function() {
  if (document.getElementsByName('password')[0].value ==
    document.getElementsByName('confirm_password')[0].value) {
    document.getElementsByName('message')[0].style.color = 'green';
    document.getElementsByName('message')[0].innerHTML = 'matching';
  } else {
    document.getElementsByName('message')[0].style.color = 'red';
    document.getElementsByName('message')[0].innerHTML = 'not matching';
  }
}

$(".sidenav").on('click', 'a', function(e) {
  $(this).parent().find('a.active').removeClass('active');
  $(this).addClass('active');
});
