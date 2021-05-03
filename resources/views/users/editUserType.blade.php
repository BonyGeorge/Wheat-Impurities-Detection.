<!-- Modal -->
<head>
    <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Wheat System | Edit User Type.</title>
       <link rel="icon" href="favicon.ico">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">


       </style>
    </head>
   


{{csrf_field()}}
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Change Role.</strong></h3>
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

            {!! Form::label('User Name :') !!} <br>
            {!! Form::text('name', null, ['class'=>'form-control' ,'placeholder' => 'UserName', 'readonly']) !!}
            {!! Form::label('User ID :') !!} <br>
            {!! Form::text('id', null, ['class'=>'form-control' ,'placeholder' => 'UserID', 'readonly']) !!}
            {!! Form::label('Email :') !!} <br>
            {!! Form::email('email', null, ['class'=>'form-control' ,'placeholder' => 'Email','readonly']) !!}
            <center>
            {!! Form::label('User Type :') !!}   <span style="color: red"> *</span> <br>
            {!! Form::select('selection', \App\User_type::pluck('name','id')) !!}    
            </center>

          <br><br><br>
          <div class="text-center mb-3">
            {!! Form::submit("Change.", ['class' => 'btn blue-gradient btn-block btn-rounded z-depth-1a']) !!}
          </div>
      </div>
      
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



