@extends('layouts.sidebar')

@section('content')
<!-- Modal -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('lang.editusertypetitle')</title>
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

      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>@lang('lang.editusertypetittle2')</strong></h3>
      </div>
      <!--Body-->
      <div class="modal-body mx-4">
        <!--Body-->
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
          </div>
      
        
  {!! Form::model($user, ['method' => 'GET', 'action' => ['RequestedUserController@update', $user]] ) !!}

            @lang('lang.usernamee') <br> 
            {!! Form::text('name', null, ['class'=>'form-control' ,'placeholder' => 'UserName', 'readonly']) !!} <br>
            @lang('lang.userIdd') <br> 
            {!! Form::text('id', null, ['class'=>'form-control' ,'placeholder' => 'UserID', 'readonly']) !!} <br>
            @lang('lang.emaill') <br>
            {!! Form::email('email', null, ['class'=>'form-control' ,'placeholder' => 'Email','readonly']) !!} <br>
            <center>
              @lang('lang.usertypee')   <span style="color: red"> *</span> <br>
            {!! Form::select('selection', \App\User_type::pluck('name','id')) !!}    
            </center>

          <br>
          <div class="text-center mb-3">
            {!! Form::submit("Change", ['class' => 'btn blue-gradient btn-block btn-rounded z-depth-1a']) !!}
          </div>
      </div>
    </body>
      
      <!--Footer-->
    </div>
    <!--/.Content-->
  </div>
  {!! Form::close() !!}

</div>
<!-- Modal -->


  <!-- jQuery -->
  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>



