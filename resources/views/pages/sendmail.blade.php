@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('lang.SEtitle')</title>
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
        border: 2px solid gold;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        padding: 4px;
    }

    #msubject {
        border: 2px solid gold;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        padding: 4px;
    }

    .mbutton {
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
  margin-left: 450px;
    }

.mbutton span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.mbutton span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.mbutton:hover span {
  padding-right: 25px;
}

.mbutton:hover span:after {
  opacity: 1;
  right: 0;
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
    <h1 style='text-align:center;'>@lang('lang.SEtitle2')</h1>
    <br><br>
    {!! Form::open(['action' => 'MailController@mail' , 'method' => 'POST']) !!}
        @csrf
    
        
        <legend style='text-align:center;'>@lang('lang.from') {{Auth::user()->email}}</legend>
        <br>
        <legend style='text-align:center;'>{!! Form::label('') !!}    <span style="color: rgb(14, 13, 13)"> @lang('lang.user')</span><br>
            {!! Form::select('selection', \App\User::pluck('email','id'), ['class' => 'mdb-select md-form', 'style' => 'margi-left:50%']) !!}    
              <br>
              </legend>
              <br> 

        <legend style='text-align:center;'>@lang('lang.mailS')  <span style="color: red"> *</span></legend>
        <br> 
        <div id='tarea'>
            {!! Form::text('mailsubject', null ,['id' =>'msubject']) !!}
        </div>
        <br>
        <legend style='text-align:center;'>@lang('lang.mailC')  <span style="color: red"> *</span></legend>
        <br>
        <div id='tareaa'>
              {!! Form::textarea('mailcontent', null ,['rows' => '8', 'cols' => '50', 'id' => 'mcontent']) !!}
        </div>
        <br><br>
        <div>
            {!! Form::submit('Send', ['class' =>'mbutton',  'value' => 'send1', 'name' => 'action', 'id' => 'send1', 'data-target' => '#centralModalSuccess', 'data-toggle' => 'modal']) !!}  
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
        <p class="heading lead"> @lang('lang.message1') </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
          <p> @lang('lang.message2') </p>
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
