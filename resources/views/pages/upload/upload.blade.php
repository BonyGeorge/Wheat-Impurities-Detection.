@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheat System| Upload Video/Image.</title>
    <link rel="icon" href="Logo.png">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 500px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
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
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
  margin-left: 400px;
 position: center;

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
.cbutton{
  display: inline-block;
  border-radius: 40px;
  background-color:goldenrod;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 10px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
  margin-left: 450px;
  margin-top: -40px;
}
.cbutton span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.cbutton span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.cbutton:hover span {
  padding-right: 25px;
}

.cbutton:hover span:after {
  opacity: 1;
  right: 0;
}


</style>

</head>

<body>

    <div class="container mt-5">
        <form action="{{URL('/upload')}}" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload Video For Classification.</h3>
          <h6 class="text-center mb-5"> Our program will classify the healthy wheat derived from wild oats and wheat infected with rust. </h6>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select Video</label>
            </div>
            <br>
            <br>
            <br>
            <button class="button" type="submit" name="submit"  class="btn btn-primary btn-block mt-4" >
                Upload Videos
            </button>
        </form>
        
    </div>

    <div class="container">
      <br>
      
  <h2 class="text-center mb-5">For more info about our system</h2>
  <button type="button" class="cbutton" data-toggle="collapse" data-target="#demo">Click here</button>
  <div id="demo" class="collapse">
 <p class="text-center mb-5"> Our system is meant to help you distinguish between healthy wheat, wild oats, and wheat affected with rust.<br>
  It's simple; all you have to do is upload a video of the place you want to inspect, and our program will identify it for you. </p> 
  </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>

</body>
</html>
@include('layouts.footer')
@endsection
