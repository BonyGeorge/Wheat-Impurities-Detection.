<!DOCTYPE html>
@extends('layouts.sidebar')

@section('content')

<html>
<title> Wheat System | Your Profile.</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
.w3-content{
  height: 600px;
  max-width: 1100px;
  margin-block-end: 300px;
  margin-bottom: 100px;
  
}
</style>

<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1100px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
        @if(Auth::user()->filename == NULL)
          <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" style="width:100%" alt="Avatar">
        @else

        <img src="{{asset('storage/ProfilePicture/'.Auth::user()->filename)}}"  alt="User Image" / width="70cm" height="70cm">

        @endif

          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2> {{Auth::user()->name}}</h2>
          </div>
        </div>
        <br>
        <div class="w3-container">
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-yellow"></i> {{Auth::user()->address}}</p>
          <p><i class="fa fa-mars fa-fw w3-margin-right w3-large w3-text-yellow"></i>
                        @php
                         if( Auth::user()->isMale == 1 )
                         {
                            echo 'Male';
                         }
                         else
                         {
                            echo 'Female';
                         }
                      @endphp</p> <hr>
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
    <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-black w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-yellow"></i>Contact Info</h2>
        <div class="w3-container">
          <h6 class="w3-text-yellow"><i class="fa fa-envelope fa-fw w3-margin-right"></i>E-mail</h6>
          <p> {{Auth::user()->email}}</p>
          <hr>
        </div>
        <div class="w3-container">
          <h6 class="w3-text-yellow"><i class="fa fa-mobile fa-fw w3-margin-right"></i>Phone</h6>
          <p> {{Auth::user()->mobile}}</p>
          <hr>
        </div>
       
      </div>
      <br>
      <br>
      <br>
      <a type = "button" class="button" href="/profile/{{Auth::user()->id}}/edit" type="submit" style="vertical-align:middle"><span>Edit Profile </span></a>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
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