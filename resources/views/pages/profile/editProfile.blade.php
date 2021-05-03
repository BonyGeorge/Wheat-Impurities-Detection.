
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheat System | Edit Profile.</title>
    <link rel="icon" href="{{asset('Logo.png')}}">


<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    }
* {box-sizing: 
border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 20px;
  margin-left: 100px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;

}

.icon {
  padding: 10px;
  background-color:  #B38728;  
  color: white;
  min-width: 50px;
  border-radius: 4px;
  text-align: center;
  margin-right: 7px;
}

.input-field {
  width: 100%;
  padding: 10px;
}


.btn {
  background-color: #B38728; 
  color: white;
  padding: 10px ;
  margin-top:30px ;
  margin-left: 80px;
  border: none;
  width: 70%;
  border-radius: 12px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  opacity: 0.9;
}
body{
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
form{
    background-color: rgb(231, 235, 225);
    font-size: x-large;
}
fieldset{
    margin: 20px;
}
img{
   margin-left: 150px;
   width:150px;
   height:150px;   
   border-radius: 10000px;   
}

</style>


</head>
<body style="
background-image: url({{asset('w.jpeg')}})">

<form action="/action_page.php" style="max-width:500px;margin:auto" >
    <fieldset>
        <legend>Profile Page</legend>


    <div style="align-self: ">
    <img src="{{asset('profile.png')}}">
    </div> 

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Username" id="usrnm" required>
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" placeholder="Email" id="email" required>
  </div>
  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class= "number" type="number" placeholder="Phone number" id="zipcode-number" maxlength="11" min="0" max="99999999999" style="  width: 100%; padding: 10px;" required >
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" id="password"required>
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Confirm Password"  id="ConfirmPassword" required>
  </div>

  <div class= "input-container">
      <i class ="fa icon">&#xf224;</i>
      <select name="gen" id="gen" >
        <option value="Male">Male</option>
        <option value="Female">Female</option>      
      </select>
      </div>

  <button type="button" class="btn" onclick="return Validate()" > <b>Next</b></button>
</fieldset>
</form>

    <script>
        function Validate() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("ConfirmPassword").value;
            if (password != confirmPassword) {
                alert("Passwords do not match, Recheck your password.");
                return false;
            }
            return true;
        }

        var inputQuantity = [];
        $(function() {     
        $(".number").on("keyup", function (e) {
        var $field = $(this),
            val=this.value,
            $thisIndex=parseInt($field.data("idx"),10); 
        if (this.validity && this.validity.badInput || isNaN(val) || $field.is(":invalid") ) {
            this.value = inputQuantity[$thisIndex];
            return;
        } 
        if (val.length > Number($field.attr("maxlength"))) {
          val=val.slice(0, 11);
          $field.val(val);
        }
        inputQuantity[$thisIndex]=val;
      });      
    });



   </script>
 
</body>
</html>