@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheat System | Mailing.</title>
    <link rel="icon" href="Logo.png">
    <style>
   #mailone {
        background-color: #3bde40;
        position: relative;
        color: black;
        height: 30px;
        border: 1px solid transparent;
        border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
        cursor: pointer;
        user-select: none;
        text-color: black;
    }

    #mailone-text {
        color: black;
    }

    #mcontent,
    #msubject {
        width: 100%;

    }

    #tarea {
        position: relative;
        left: 25%;
        display: flex;
        width: 50%;
    }

    #tareaa {
        position: relative;
        left: 25%;
        display: flex;
        width:
            50%;

    }

    #mcontent {
        border: 2px solid #0070FF;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        padding: 4px;
    }

    #msubject {
        border: 2px solid #0070FF;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        padding: 4px;
    }

    .mbutton {
        width: 0%;
        background-color: white;
        display: inline-flex;
        display: table;
        text-align: center;
        align: center;
        position: relative;
        left: 43%
    }
    .mailer {
        position: relative;
        left: 44.2%
    }

    @media only screen and (max-width: 850px) {
        .mbutton {
            left: 27.5%;
        }

        .mailer {
            position: relative;
            left: 31.2%;
        }
    } </style>
</head>

<body>

    <div class="container box">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss id="alert">
                x
            </button>
            <ul>
                @foreach ($errors->all() as $errormsg)

                <div class="alert alert-danger" role="alert">
                <li>{{$errormsg}}</li>
                </div>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="container box">
        @if($message = Session::get('success'))
    </div>
        <button type="button" class="close" data-dismiss id="alert">
            x
        </button>
        <ul>
            <div class="alert alert-success" role="alert">
            <strong>{{$message}}</strong>
        </div>
    @endif
</div>

    <br>
    <br>
    <h1 style='text-align:center;'>Send mail</h1>
    <br><br>
    {!! Form::open(['action' => 'MailController@mail' , 'method' => 'POST']) !!}
        @csrf
    
        <center>    {!! Form::label('User :') !!}    <span style="color: red"> *</span><br>
            {!! Form::select('selection', \App\User::pluck('email','id'), ['class' => 'mdb-select md-form', 'style' => 'margi-left:50%']) !!}    
              <br>
        </center>
        <legend style='text-align:center;'>From :</legend>
        <br>

        <legend style='text-align:center;'>Mail subject :  <span style="color: red"> *</span></legend> 
        <div id='tarea'>
            {!! Form::text('mailsubject', null ,['id' =>'msubject']) !!}
        </div>
        <br>
        <legend style='text-align:center;'>Mail content :  <span style="color: red"> *</span></legend>
        <div id='tareaa'>
              {!! Form::textarea('mailcontent', null ,['rows' => '8', 'cols' => '50', 'id' => 'mcontent']) !!}
        </div>
        <br><br>
        <div class='mbutton'>
            {!! Form::submit('Send to selected user', ['class' => 'btn btn-primary', 'value' => 'send1', 'name' => 'action', 'id' => 'send1', 'data-target' => '#centralModalSuccess', 'data-toggle' => 'modal']) !!}
    <br>    {!! Form::submit('Send to all users', ['class' => 'btn btn-primary', 'value' => 'send0', 'name' => 'action', 'id' => 'send0', 'data-target' => '#centralModalSuccess', 'data-toggle' => 'modal']) !!}
       
        </div>
    {!! Form::close() !!}
</body>

<!-- Central Modal Medium Success -->
<div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-success" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Mail Success.</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
          <p>Mail has been sent. </p>
        </div>
      </div>
    </div>
    <!--/.Content-->
</div>
</div>  </div>
</div>
<!-- Central Modal Medium Success-->
</html>
@include('layouts.footer')
@endsection
