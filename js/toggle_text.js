const li = document.querySelectorAll('li');
li.forEach(a => {a.addEventListener('click', evt => {
  let this_txtblock = a.innerText
  let toggleText = (this_txtblock) => {
    var reveal_this = document.getElementById(this_txtblock)
    if (reveal_this.style.display === "none") {
      reveal_this.style.display = "block";
    } else {
      reveal_this.style.display = "none";
    }
  }
  toggleText(this_txtblock);
 })})
