<!DOCTYPE html>
@extends('layouts.sidebar')

@section('content')

<html>
<title> Wheat System | Edit Profile.</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheat System | Edit Profile.</title>
    <link rel="icon" href="{{asset('Logo.png')}}">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<style>
.button {
  display: inline-block;
  border-radius: 40px;
  background-color:goldenrod;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 20px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
  margin-left: 300px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

</style>
<body class="w3-light-grey ">

<!-- Page Container -->
<div class="w3-content w3-margin-top " style="max-width:1100px;">

  <!-- The Grid -->
  <div class="w3-row-padding ">
  
    <!-- Left Column -->
    <div class="w3-col m5 w3-center"  >
    
      <div class="w3-white w3-text-grey w3-card-4 ">
        <div class="w3-display-container ">
        @if(Auth::user()->filename == NULL)
          <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" style="width:100%" alt="Avatar">
        @else

        <img src="{{asset('storage/uploads/ProfilePicture/'.Auth::user()->filename)}}"  alt="User Image" / width="70cm" height="70cm">

        @endif

      <form method="POST" action="/profile/{{Auth::user()->id}}" enctype="multipart/form-data" style="max-width:500px;margin:auto" >
    @csrf
    @method('PATCH')

          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2> {{Auth::user()->name}}</h2>
          </div>
        </div>
        <br>
        <div class="w3-container ">

    <h6 class="w3-text-yellow"><i class="fa fa-user icon"></i>
    <input class="input-field" type="text" name="name" value="{{Auth::user()->name}}" id="email"style="  width: 60%; margin:10px; ">
    
    <br>
    <h6 class="w3-text-yellow"><i class="fa fa-envelope icon "></i>
    <input class="input-field" type="email" name="email" value="{{Auth::user()->email}}" id="email"style="  width: 60%; margin:10px; ">

    <h6 class="w3-text-yellow"> <i class="fas fa-home icon"></i>
    <input class="input-field" type="text" name="address" value="{{Auth::user()->address}}" id="email"style="  width: 60%; margin:10px; ">
   <br>
    <h6 class="w3-text-yellow"><i class="fa fa-phone icon"></i>
    <input class= "number"  name="phone" value="{{Auth::user()->phone}}" id="zipcode-number"  style="  width: 60%; margin:10px; ">
   <br>

   <h6 class="w3-text-yellow"><i class ="fas fa-transgender icon"></i>
      <select name="isMale" id="gen"   class="input-field" style="width: 60%; margin-left:4% ; margin-right:3%;height: 25px; ">
        <option value="1">Male</option>
        <option value="0">Female</option>      
      </select>

   <h6 class="w3-text-yellow"> <i class="fa fa-upload icon"></i>
    <input type="file" name="filename" style="  width: 60%; margin:10px; "></div>
    <button type="submit" name="Save_Edits"  class = "btn btn-warning">Save Edits</button>
  
        
      </div><br> 
  
    </div>
    
  </form>
  </div>
  
 
  </div>
                       

</body>
</html>
 <!-- jQuery -->
 <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>

  <footer id="footer">
  @include('layouts.footer')
</footer>
@endsection