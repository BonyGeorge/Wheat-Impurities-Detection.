
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
background-image: url({{asset('wheat.jpg')}})">
    @extends('layouts.sidebar')
    
    @section('content')

<form method="POST" action="/profile/{{Auth::user()->id}}" enctype="multipart/form-data" style="max-width:500px;margin:auto" >
    @csrf
    @method('PATCH')
    <fieldset>
        <legend>Profile Page</legend>


    <div style="align-self: ">
    @if(Auth::user()->filename == NULL)
    <img src="{{asset('profile.png')}}">

    @else
    
    <img src="{{asset('storage/ProfilePicture/' .Auth::user()->filename)}}"  alt="Image">
    @endif
    </div> 

  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" name="name" value="{{Auth::user()->name}}" id="usrnm">
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" name="email" value="{{Auth::user()->email}}" id="email">
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" name="address" value="{{Auth::user()->address}}" id="email">
  </div>

  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input class= "number" type="number" name="phone" value="{{Auth::user()->phone}}" id="zipcode-number" maxlength="11" min="0" max="99999999999" style="  width: 100%; padding: 10px;">
  </div>

  

  <div class= "input-container">
      <i class ="fa icon">&#xf224;</i>
      <select name="isMale" id="gen" >
        <option value="1">Male</option>
        <option value="0">Female</option>      
      </select>
      </div>

  <div class="input-container">
    <i class="fa fa-phone icon"></i>
    <input type="file" name="filename" ></div>

    <input type="submit" name="Save Edits" value="Save Edits" class = "btn btn-warning">
</fieldset>
</form>
</div>
</div>
<footer>
        @include('layouts.footer')
</footer>
    @endsection
</body>
</html>