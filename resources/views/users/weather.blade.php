<head>
    @extends('layouts.sidebar')
    
    @section('content')
        <title>Weather.</title>
        <link rel="icon" href=" 3.png">
    </head>
    
    <!-- Editable table -->
    <div class="carda">
        <h3 class="card-header text-center font-weight-bold">Weather Informatations</h3>
        <br><br><br><br><br><br>
        <div class="card-body">
    
          <div class="container box">
        @if($WeatherData = Session::get('success'))
            <button type="button" class="close" data-dismiss id="alert">
                x
            </button>
            <ul>
                <div class="alert alert-success" role="alert">
                <strong>{{$WeatherData}}</strong>
            </div>
        @endif
    </div>
          <div id="table" class="table-editable">
          
            <table class="table table-bordered table-responsive-md table-striped text-center">
              <thead>
          <tr style="background-image: linear-gradient(90deg, rgba(20, 20, 231, 0.258) 0%, rgb(245, 56, 9) 35%, rgb(23, 238, 191) 100%);">
               
    
                  <th class="text-center"> Reading Hour </th>
                  <th class="text-center"> Reading Time </th>
                  <th class="text-center ">Temprature</th>
                  <th class="text-center">humidity</th>
                  <th class="text-center">Wind Speed</th>
                  <th class="text-center">Wind Direction</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $i = 1;
                @endphp
           <!-- This is our clonable table line -->
                @forelse ($WeatherInfo as $WeatherData)
                @php
                  echo'<tr class="hide">
                  <td class="pt-3-half">'.$i.'</td>';
                    $i++;
                  @endphp
                <td class="pt-3-half">{{$WeatherData->created_at}}</td>
                <td class="pt-3-half">{{$WeatherData->temprature}}</td>
                <td class="pt-3-half">{{$WeatherData->humidity}}</td>
                <td class="pt-3-half">{{$WeatherData->wind_speed}}</td>
                <td class="pt-3-half">{{$WeatherData->wind_direction}}</td>
                  @empty
          <td colspan="9"><center><-   No Weather data to show   -></center> </td>
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