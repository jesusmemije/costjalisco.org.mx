/* [ALL YOU NEED] */
function show(){
  document.getElementById("spinner-back").classList.add("show");
  document.getElementById("spinner-front").classList.add("show");
}
function hide(){
  document.getElementById("spinner-back").classList.remove("show");
  document.getElementById("spinner-front").classList.remove("show");
}

/* [AJAX DEMO] */
// ! NOTES !
// Use http:// not file:// 
// On localhost, this can be so fast you don't see the loading screen
function demoAJAX () {
  show(); // Block page while loading
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "page.html");
  xhr.onload = function(){
    document.getElementById("container").innerHTML = this.response;
    hide(); // Unblock page
  };
  xhr.send();
}