//DOM manipulation upload href change (I have it so wrong username/password, empty username/password trigger url changes based off the backend


const href = window.location.href,
        pwdbox = document.getElementById('passwordbox'),
        pwdboxborder = document.querySelector('#qwe'),
        pwdboxtext = document.querySelector('.xx8'),
        emailbox = document.getElementById('loginbox'),
        emailboxborder = document.querySelector('#xx11'),
        queryString = window.location.search,
        urlParams = new URLSearchParams(queryString),
        emailfromurl = urlParams.get('un'),
        forgotpwdtext = document.querySelector('.tyu123');

  if(href.indexOf('emptypass') >-1){
    pwdbox.focus();
    pwdbox.classList.add('shake');
    pwdboxborder.classList.add('xxAddBorder')
    pwdboxborder.classList.remove('xxxx11')
    pwdboxtext.classList.add('xxMoveText')
    emailbox.value = emailfromurl
  }

  if(href.indexOf('emptyuidpass') > -1){
    emailbox.focus();
    emailbox.classList.add("shake");
    emailbox.classList.add('xxAddBorder')
    emailboxborder.classList.remove('xxxx11')
  }

  if(href.indexOf('wronguidpwd') > -1){
    pwdbox.focus();
    pwdbox.classList.add('shake');
    pwdboxborder.classList.add('xxAddBorder')
    pwdboxborder.classList.remove('xxxx11')
    pwdboxtext.classList.add('xxMoveText')
    emailbox.value = emailfromurl
    forgotpwdtext.innerHTML="<a class='中文' id=rp href=reset-password.php>Forgot password? 重置密码</a>";
  }
