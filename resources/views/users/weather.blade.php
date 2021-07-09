<head>
    @extends('layouts.sidebar')
    
    @section('content')
        <title>@lang('lang.weatherD')</title>
        <link rel="icon" href=" 3.png">
        <style>
        span {
        content: "\00B0";
        }
        .humid {
          content: "\00B0";
        }
        </style>
    </head>
    
    <!-- Editable table -->
    <div class="carda">
        <h3 class="card-header text-center font-weight-bold"> @lang('lang.weatherTitle')</h3>
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
                <tr style="background-image: linear-gradient(90deg, rgba(174,174,179,0.258140756302521) 0%, rgba(245,222,9,1) 35%, rgba(255,215,0,1) 100%);">
               
    
                  <th class="text-center">@lang('lang.readingH') </th>
                  <th class="text-center"> @lang('lang.readingT') </th>
                  <th class="text-center ">@lang('lang.Temp')</th>
                  <th class="text-center">@lang('lang.Humd')</th>
                  <th class="text-center">@lang('lang.windS')</th>
                  <th class="text-center">@lang('lang.windD')</th>
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
                <td class="pt-3-half">{{$WeatherData->temprature}} <span>&#x2103;</span></td>
                <td class="pt-3-half">{{$WeatherData->humidity}} <span>%rh</span></td>
                <td class="pt-3-half">{{$WeatherData->wind_speed}} <span>(m/s)</span></td>
                <td class="pt-3-half" id="humid">{{$WeatherData->wind_direction}} <span>&#176;</span></td>
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
  <!-- Editable table -->
  <footer id="footer" style="position: relative;margin-top:-30px;clear:both;height:100px">
    @include('layouts.footer')
</footer>
@endsection