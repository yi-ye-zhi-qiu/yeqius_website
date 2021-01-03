//css effects for moving 用户名 and 密码 translateY, along with form validation & appearence changes on action success (user signed up or changed password, etc.)
const form_elms = document.querySelector('form').elements,
 input = document.querySelectorAll('input'),
 button = document.querySelector('button');
button.disabled = true;
document.querySelector('input').focus()

//Handle *any number* of inputs on a page, and only enable button once they are filled.
//Add 'valid' datastate to trigger text movement of what looks like a placeholder
input.forEach(a => {a.addEventListener('input', evt => {
  //used for button enabling-disabling
  let count = [];
  input.forEach(v => count.push(v.value))
  button.disabled = count.includes('')
  //we use this check array to apply this validation to every input field on the page (dynamical!)
  let check = [];
  input.forEach(v => check.push(v.name))
  check.forEach(function (a){
    item = form_elms[a]
    var value = item.value
    if (!value) {
      item.dataset.state = ''
      return
    }
    var trimmed = value.trim()
    if (trimmed) {
      //We do our validation of uid, mail and password fields here. We do them again in PHP just incase button is enabled via developer console.
      //Should note that the way I wrote this is probably inefficient, there's a lot of redundancies...
      if(item.name === 'uid'){
        //验证用户名的一个例子
        let eng_validuser = /^[a-zA-Z][a-zA-Z0-9_-]{3,15}$/;
        if(eng_validuser.test(item.value) === false) {document.querySelector('.xx8').innerHTML =
        '用户名 | <span style="color: #FF9AA2 !important;">4-15位，- _ 0-9 a-z A-Z 英文字 都OK👌！</span>'; button.disabled=true;}
        else{document.querySelector('.xx8').innerHTML = '用户名';}
      }
      if(item.name === 'mail'){
        let ePattern = /^\S+@\S+\.\S+$/; //NOTE: this is not an actual check of email validity, it's just so that user remembers to enter something@something.com
        if(ePattern.test(item.value) === false) {document.getElementById('xx8v3').innerHTML =
        '邮件 ｜ <span style="color: #FF9AA2 !important;">地址不允许!</span>'; button.disabled=true;}
        else{document.getElementById('xx8v3').innerHTML = '邮件';}
      }
      if(item.name === 'pwd' && document.getElementById('xx8v2')!==null){
        let pPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if(pPattern.test(item.value) === false) {document.getElementById('xx8v2').innerHTML =
        '密码 | <span style="color: #FF9AA2 !important;">8+位，1个letter, 1个0-9'; button.disabled=true;}
        else{document.getElementById('xx8v2').innerHTML = '密码'}
      }
      item.dataset.state = 'valid'
    } else {
      item.dataset.state = 'invalid'
    }
  })
})})

/* adding in arrow-navigation to forms on pages */
var current_inp = 0;
input.forEach(a => {a.addEventListener('keydown', (e) => { switch (e.keyCode) {
    case 38: current_inp = (current_inp == 0) ? form_elms.length - 1 : --current_inp; form_elms[current_inp].focus(); break;
    case 40: current_inp = ((current_inp +1) == form_elms.length) ? 0 : ++current_inp; form_elms[current_inp].focus(); break;}
})})

//form_elms['pwd'].onkeydown = function(e){e.preventDefault(); e.stopPropagation(); switch (e.keyCode) { case 38: form_elms['mailuid'].select(); break;}}

/* DOM  manipulation based off url (for errors & action successes, i.e. sign-up, password reset) */

const queryString = window.location.search,
      urlParams = new URLSearchParams(queryString);

let error = urlParams.get('error')
if (error !== null) {
  if(error === 'wronguidpwd'){
    wronguidpwd()
  } else if(error === 'usertaken'){
    usertaken()
  }
}

const emojis = ["🐧", "🦆", "🐠", "🍂", "🍄", "🌺", "☃️", "🐝", "👻"]
const chosen_emoji = (arr) => arr[Math.floor(Math.random() * arr.length)]

let action_done = urlParams.get('action'), id = urlParams.get('in'), person = urlParams.get('person'), msg = document.querySelector('.yy2');
if (action_done !== null){
  if (action_done === 'success'){
    successful_action();
    if (id === 'sn'){ msg.innerHTML = '欢迎welcome, <span class="underline">'+person+'  '+chosen_emoji(emojis)+'</span> pls login'
                      msg.querySelector('span').focus();
    }
    if (id === 'rs'){ msg.innerHTML = '<span class="curtain_drop"> 邮件已发送了！e-mail sent to you </span>';}
    if (id === 'np'){ msg.innerHTML = 'password reset for 账号 <span class="underline">' +person+'</span> 密码已改了！';}
  }
}

function wronguidpwd() {
  form_elms['pwd'].focus();
  form_elms['mailuid'].value = urlParams.get('un'),
  form_elms['mailuid'].dataset.state = 'valid';
  document.querySelector('.tyu123').innerHTML="<a class='中文' id=rp href=reset-password.php>Forgot password? 重置密码</a>";
}

function usertaken() {
  form_elms['uid'].value = urlParams.get('un');
  form_elms['uid'].dataset.state = 'valid';
  form_elms['uid'].select();
  form_elms['mail'].value = urlParams.get('email');
  form_elms['mail'].dataset.state = 'valid';
}

function successful_action() {
  document.querySelector('.xx1').classList.add('animated_gradient_border');
}
