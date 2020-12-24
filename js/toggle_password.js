const togglePass = document.querySelector('#togglePassword');
const pass = document.querySelector('#passwordbox');
togglePass.addEventListener('click', function(e) {
  const type = pass.getAttribute('type') === 'password' ? 'text' : 'password';
  pass.setAttribute('type', type);
  this.classList.toggle('fa-eye-slash');
})
