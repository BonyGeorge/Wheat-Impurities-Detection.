var register = document.getElementById("Register");
var card = document.getElementById("card");
var login = document.getElementById("login");
var signupform = document.getElementById("Signuptab");
var loginform = document.getElementById("Logintab");

register.onclick = function() {
  login.classList.remove("selected");
  register.classList.add("selected");
  card.classList.add("extend");
  signupform.style.display = "block";
  loginform.style.display = "none";
  card.classList.remove("Logintab");
  card.classList.add("Signuptab");
};

login.onclick = function() {
  login.classList.add("selected");
  register.classList.remove("selected");
  card.classList.remove("extend");
  signupform.style.display = "none";
  loginform.style.display = "block";
  card.classList.remove("Signuptab");
  card.classList.add("Logintab");
};

$("#newusersubmit").on("click", function() {
  var mail = document.getElementById("Email").value;
  var name = document.getElementById("fullname").value;
  var mailsubject = "Welcome to SYSTEMNA";
  var mailcontent =
    "Welcome to SYSTEMNA, you signed up successfully, please wait for an HR to review and verify your account.";
  jQuery.ajax({
    type: "POST",
    url: "operations/massmsging.php",
    data:
      "email=" +
      mail +
      "&name=" +
      name +
      "&mailsubject=" +
      mailsubject +
      "&mailcontent=" +
      mailcontent +
      "&type=newusermail",
    success: function(data) {}
  });
});
