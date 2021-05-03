<head>
@extends('layouts.sidebar')

@section('content')
    <title>Wheat System | Requested Users.</title>
    <link rel="icon" href="favicon.ico">
</head>


<!-- Editable table -->
<div class="carda">
    <h3 class="card-header text-center font-weight-bold">Requested Users</h3>
    <br><br><br><br><br><br>
    <div class="card-body">

      <div class="container box">
    @if($message = Session::get('success'))
        <button type="button" class="close" data-dismiss id="alert">
            x
        </button>
        <ul>
            <div class="alert alert-success" role="alert">
            <strong>{{$message}}</strong>
        </div>
    @endif
</div>
      <div id="table" class="table-editable">
      
        <table class="table table-bordered table-responsive-md table-striped text-center">
          <thead>
            <tr style="background-image: linear-gradient(90deg, rgba(174,174,179,0.258140756302521) 0%, rgba(245,222,9,1) 35%, rgba(255,215,0,1) 100%);">
                

              <th class="text-center"> # </th>
              <th class="text-center ">Person Name</th>
              <th class="text-center">Email</th>
              <th class="text-center">Role</th>
              <th class="text-center">Accepted</th>
            </tr>
          </thead>
          <tbody>
            @php
                $i = 1;
            @endphp
       <!-- This is our clonable table line -->
            @foreach ($users as $user)
            @php
              echo'<tr class="hide">
              <td class="pt-3-half">'.$i.'</td>';
                $i++;
              @endphp
            <td class="pt-3-half">{{$user->name}}</td>
                <td class="pt-3-half">{{$user->email}}</td>

                <td class="pt-3-half">
                    <h5>
                   
             
                      @php
                         if( $user->type_id == 1 )
                         {
                            echo 'Admin.';
                         } 
                         elseif( $user->type_id == 2 )
                         {
                            echo 'Client.'; 
                         }
                      @endphp

                    </h5>
                <td>
                    <div class="text-center">
                      <a href="/requestedusers/{{$user->id}}/edit" class="btn btn-warning btn-rounded" role="button" data-target="#elegantModalForm">Accept</a>
                    </div>
                  </span>
              
                </td>

              </tr>
         
            @endforeach     
              
          </tbody>
        </table>
        {{$users->links()}}
      </div>
    </div>
    <br><br><br>
  </div>

 
  <!-- Editable table -->
  <footer id="footer" style="position: relative;margin-top:-30px;clear:both;height:100px">
    @include('layouts.footer')
</footer>
@endsection