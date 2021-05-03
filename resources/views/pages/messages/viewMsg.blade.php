<head>
    @extends('layouts.sidebar')
    
    @section('content')
        <title>Wheat | Messages.</title>
        <link rel="icon" href=" 3.png">
    </head>
    
    
    <!-- Editable table -->
    <div class="carda">
        <h3 class="card-header text-center font-weight-bold">Our Messages</h3>
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
                  <th class="text-center ">Name</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Subject</th>
                  <th class="text-center">Message</th>
                  <th class="text-center">Delete</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $i = 1;
                @endphp
           <!-- This is our clonable table line -->
                @forelse ($messages as $Message)
                @php
                  echo'<tr class="hide">
                  <td class="pt-3-half">'.$i.'</td>';
                    $i++;
                  @endphp
                <td class="pt-3-half">{{$Message->name}}</td>
                <td class="pt-3-half">{{$Message->email}}</td>
                <td class="pt-3-half">{{$Message->subject}}</td>
                <td class="pt-3-half">{{$Message->message}}</td>
                <td class="pt-3-half">
                    <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$Message->id}})" 
                      data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a> </td>
                  @empty
          <td colspan="9"><center><-   No data to show   -></center> </td>
      </tr>
         @endforelse  
                  
              </tbody>
            </table>
          </div>
        </div>
        <br><br><br>
      </div>

      <div id="DeleteModal" class="modal fade text-danger" role="dialog">
        <div class="modal-dialog ">
          <!-- Modal content-->
          <form action="" id="deleteForm" method="post">
              <div class="modal-content">
                  <div class="modal-header bg-danger">
                      <h4 class="modal-title text-center" style="color: white">Confirm Delete</h4>
                  </div>
                  <div class="modal-body">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <p class="text-center">Are You Sure Want To Delete ?</p>
                  </div>
                  <div class="modal-footer">
                      <center>
                          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                          <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
                      </center>
                  </div>
              </div>
          </form>
        </div>
      </div>
     </div>
    </div>
 

      <!-- Editable table -->
      <footer id="footer" style="position: relative;margin-top:-30px;clear:both;height:100px">
        @include('layouts.footer')
    </footer>
    @endsection
      <!-- Delete Modal -->
  <script>
    function deleteData(id)
       {
           var id = id;
           var url = '{{ route("messages.destroy", ":id") }}';
           url = url.replace(':id', id);
           $("#deleteForm").attr('action', url);
       }
  
       function formSubmit()
       {
           $("#deleteForm").submit();
       }
    </script>

    