<head>
    @extends('layouts.sidebar')
    
    @section('content')
        <title>@lang('lang.NotificationTitle')</title>
        <link rel="icon" href=" 3.png">
    </head>
    
    <!-- Editable table -->
    <div class="carda">
        <h3 class="card-header text-center font-weight-bold">@lang('lang.NotificationTitle2')</h3>
        <br><br><br><br><br><br>
        <div class="card-body">

    </div>
          <div id="table" class="table-editable">
          
            <table class="table table-bordered table-responsive-md table-striped text-center">
              <thead>
                <tr style="background-image: linear-gradient(90deg, rgba(174,174,179,0.258140756302521) 0%, rgba(245,222,9,1) 35%, rgba(255,215,0,1) 100%);">
               
    
                  <th class="text-center"> #</th>
                  <th class="text-center"> @lang('lang.Notification')</th>
                  <th class="text-center"> @lang('lang.NotificationM') </th>

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
                <td class="pt-3-half">{{substr(strip_tags($Weather->data),2,53)}}</td>
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
  <!-- Editable table -->
  <footer id="footer" style="position: relative;margin-top:-30px;clear:both;height:100px">
    @include('layouts.footer')
</footer>
@endsection