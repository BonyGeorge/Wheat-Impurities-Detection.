<head>
    @extends('layouts.sidebar')
    
    @section('content')
        <title>Wheat System | Notification.</title>
        <link rel="icon" href=" 3.png">
    </head>
    
    <!-- Editable table -->
    <div class="carda">
        <h3 class="card-header text-center font-weight-bold">Weather Notification Table</h3>
        <br><br><br><br><br><br>
        <div class="card-body">

    </div>
          <div id="table" class="table-editable">
          
            <table class="table table-bordered table-responsive-md table-striped text-center">
              <thead>
                <tr style="background-image: linear-gradient(90deg, rgba(174,174,179,0.258140756302521) 0%, rgba(245,222,9,1) 35%, rgba(255,215,0,1) 100%);">
               
    
                  <th class="text-center"> #</th>
                  <th class="text-center"> Notification Time </th>
                  <th class="text-center"> Notification Message </th>

                </tr>
              </thead>
              <tbody>
                @php
                    $i = 1;
                @endphp
           <!-- This is our clonable table line -->
                @forelse ($WeatherNotification as $Weather)
                @php
                  echo'<tr class="hide">
                  <td class="pt-3-half">'.$i.'</td>';
                    $i++;
                  @endphp
                <td class="pt-3-half">{{$Weather->created_at}}</td>
                <td class="pt-3-half">{{$Weather->data}}</td>
                  @empty
          <td colspan="9"><center><-   No Notifications yet -></center> </td>
      </tr>
         @endforelse  
                  
              </tbody>
            </table>
          </div>
        </div>
        <br><br><br>
      </div>
     </div>
    </div>
 
    @endsection