@extends('layouts.sidebar')

@section('content')


<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheat | Profile.</title>
    <link rel="icon" href=" 3.png">
<h4 style="
    color: dodgerblue;
    margin-left: 20;">Your Profile</h4>
    </style>

    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">


   <style>
            @media screen  and (max-width: 800px) {
                .container {
                    display: block;
                    width: 16em;
                }
                .square {

                    height: 300em;
                    width: 200em;
}
            }
            </style>

</head>


<div class="square" style="

  height: 100%;
  width: 80%;
  background-color: #9DCE07;
  position: relative;
  left: 5%;
  opacity: 10%;
  border-radius: 30px;
  "></div>

<div class="container" style="background: transperent;height: 550px;width: 1090px;" >

<div class="container" style="background: transparent;border-radius: 10px;height: 30%;top: 30%;position: absolute;width: 38%;">
<div class="container" style="background: #04A9D9;border-radius: 10px;margin-left: 7px;width: 65%;height: 229%;">


 <div class="col-12 col-lg-auto mb-3" style="width: 140px;">
  </div>
                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px;">
                      @if(Auth::user()->filename == NULL)

                      <img src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"  alt="Image" / width="70cm" height="70cm">

                      @else

                      <img src="{{asset('storage/ProfilePicture/' .Auth::user()->filename)}}"  alt="Image" / width="70cm" height="70cm">

                      @endif
</div>


<br>

<b><label style="font-size: 30px;">Basic Info</label></b>
<br>
<br>

<div class="row">
                          <div class="col">
                            <div class="fa fa-male">
                              <label>Name: </label>
                          {{Auth::user()->name}}
                            </div>
                          </div>
                        </div>

<br>
<div class="row">
                          <div class="col">
                            <div class="fa fa-id-card">
                              <label>SSN: </label>
                             {{Auth::user()->ssn}}
                            </div>
                          </div>
                        </div>



<br>

                        <div class="row">

                          <div class="col">
                            <div class="fa fa-map-marker-alt">

                              <label>Address</label>:
                             {{Auth::user()->address}}
                            </div>
                          </div>
                        </div>
<br>
 <div class="row">
                        <div class="col">
                            <div class="fa fa-mars">
                              <label>Gender: </label>

                            @php
                         if( Auth::user()->isMale == 1 )
                         {
                            echo 'Male';
                         }
                         else
                         {
                            echo 'Female';
                         }
                      @endphp

                            </div>
                          </div>
                        </div>

<br>
                                                <div class="row">

                          <div class="col">
                            <div class="fa fa-birthday-cake">

                              <label>Birthday</label>:
                             {{Auth::user()->birthday}}
                            </div>
                          </div>
                        </div>

</div>
</div>


<div class="container" style="background-color:#04A9D9;border-radius: 10px;height: 50%;width: 42%;position: relative;bottom: 125%;left: 17%;">
<div class="container" style="background: transparent;border-radius: 10px;height: 203px;margin-left: 7px;">

<b><label style="font-size: 30px;">Contact Info</label></b>
<br>
<br>

<div class="row">
                          <div class="col">
                            <div class="fa fa-envelope">
                              <label>Email: </label>
                             {{Auth::user()->email}}
                            </div>
                          </div>
                        </div>


<div class="row">
                          <div class="col">
                            <div class="fa fa-phone">
                              <label>Mobile: </label>
                          {{Auth::user()->mobile}}
                            </div>
                          </div>
                        </div>
</div>

</div>
</div>

<a class="btn btn-success" role=" button" href="/profile/{{Auth::user()->id}}/edit" data-target="#editModel" style="

    bottom: 620px;
    left: 75%;
    border-radius: 20px;
    ">Edit Profile</a>
</div>
<footer id="footer">
  @include('layouts.footer')
</footer>
</html>
@endsection

  <!-- jQuery -->
  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
