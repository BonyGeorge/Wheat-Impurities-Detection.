@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wheat System | Dashboard.</title>
  <link rel="icon" href="{{asset('Logo.png')}}">
    <style>
      body {
        margin: 0;
        padding: 0;
        width: 100%;
        background-color: #00406a;
        font-family: Tahoma, Helvetica, Arial, sans-serif;
      }

      h1,
      h2,
      h3,
      h4,
      h5 {
        margin: 0;
        padding: 0;
        font-weight: bold;
      }

      .chartCont {
        padding: 0px 12px;
      }

      .border-bottom {
        border-bottom: 1px dashed rgba(0, 117, 194, 0.2);
      }

      .border-right {
        border-right: 1px dashed rgba(0, 117, 194, 0.2);
      }

      #container {
        width: 1200px;
        margin: 0 auto;
        position: relative;
      }

      #container > div {
        width: 100%;
      }

      #userDetail {
        float: right;
      }

      #userDetail img {
        position: absolute;
        top: 16px;
        right: 130px;
      }

      #userDetail div {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 14px;
        font-weight: bold;
        color: goldenrod;
      }

      #userDetail div p {
        margin: 0;
      }

      #userDetail div p:nth-child(2) {
      }

        color: #0e948c;
      #header div:nth-child(3) {
        clear: both;
        border-bottom: 1px solid #0075c2;
      }

      #content div {
        display: inline-block;
      }

      #content > div {
        margin: 0px 20px;
      }

      #content > div:nth-child(1) > div {
        margin: 20px 0 0;
      }

      #content > div:nth-child(2) > div {
        margin: 0 0 20px;
      } 
    </style>
    <script
      type="text/javascript"
      src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"
    ></script>
    <script type="text/javascript">
      FusionCharts.ready(function() {
        var salesRevChart = new FusionCharts({
          type: "column2d",
          renderAt: "sales-chart-container",
          width: "500",
          height: "300",
          dataFormat: "json",
          dataSource: {
            chart: {
              caption: "Wild Oat Classification.",
              xaxisname: "Wheat Land",
              yaxisname: "Wild Oats",
              numberprefix: "",
              showvalues: "0",
              theme: "fusion"
            },
            data: [
              {
                label: "14 May",
                value: "267111"
              },
              {
                label: "15 May",
                value: "217207"
              },
              {
                label: "16 May",
                value: "185836"
              },
              {
                label: "17 May",
                value: "251074"
              },
              {
                label: "18 May",
                value: "273374"
              },
              {
                label: "19 May",
                value: "215724"
              },
              {
                label: "20 May",
                value: "227219"
              },
              {
                label: "21 May",
                value: "268160"
              },
              {
                label: "Yesterday",
                value: "264416"
              }
            ]
          }
        }).render();

        var dailyTransChart = new FusionCharts({
          type: "area2d",
          renderAt: "trans-chart-container",
          width: "550",
          height: "300",
          dataFormat: "json",
          dataSource: {
            chart: {
              caption: "Wheat Rust Classification.",
              xaxisname: "Wheat Land",
              yaxisname: "Wheat Rust",
              showvalues: "0",
              theme: "fusion"
            },
            data: [
              {
                label: "14 May",
                value: "1464"
              },
              {
                label: "15 May",
                value: "1062"
              },
              {
                label: "16 May",
                value: "1014"
              },
              {
                label: "17 May",
                value: "1294"
              },
              {
                label: "18 May",
                value: "1382"
              },
              {
                label: "19 May",
                value: "1085"
              },
              {
                label: "20 May",
                value: "1150"
              },
              {
                label: "21 May",
                value: "1420"
              },
              {
                label: "Yesterday",
                value: "1411"
              }
            ]
          }
        }).render();
      });
    </script>
  </head>

  <body>
    <div id="container">
      <div id="header">
        <div id="logoContainer">
          <img
            src="{{asset('Logo.png')}}"
            alt="Logo"
          />
        </div>
        <div id="userDetail">
          <div>
            <p>Welcome, {{Auth::user()->name}}</p>
            <p>Client</p>
          </div>
        </div>
        <div></div>
      </div>
      <div class="border-bottom" id="content">
        <div class="border-bottom">
          <div class="chartCont border-right" id="sales-chart-container">
            FusionCharts will load here.
          </div>
          <div class="chartCont" id="trans-chart-container">
            FusionCharts will load here.
          </div>
        </div>
        </div>
      </div>
    </div>    </div>
  </body>
</html>
  @include('layouts.footer')
@endsection
