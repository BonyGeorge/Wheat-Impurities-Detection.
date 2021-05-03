function generateRandomString() {
  var characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  var charactersLength = characters.length;
  var randomString = '';
  for (var i = 0; i < 10; i++) {
    randomString += characters[Math.floor((Math.random() * (charactersLength-1)) + 1)];
  }
  return (randomString);
};

var Reset = document.getElementById('Reset');
var NewPass = generateRandomString();
Reset.onclick = function() {
  var mail = document.getElementById('forgotpassmail').value;
  if (mail == "") {
    alert("Please enter an email");
  }
  else {
  jQuery.ajax({
    type: 'POST',
    url: '../operations/resetpass.php',
    data: 'mail=' + mail  + '&NewPass='+ NewPass + '&type=reset',
    success: function (data) {
      alert(data);
      var name = '';
      var mailsubject = 'Your new password';
      var mailcontent = 'Your new Password is ' + NewPass + ' You can change your password from your profile';
      jQuery.ajax({
        type: 'POST',
        url: '../operations/massmsging.php',
        data: 'email=' + mail + '&name=' + name + '&mailsubject='+ mailsubject + '&mailcontent=' + mailcontent + '&type=newusermail',
        success: function (data) {
        }
      });
      location.reload();
    }
  });
}
};