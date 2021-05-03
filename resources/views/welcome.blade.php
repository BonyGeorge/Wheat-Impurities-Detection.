@extends('layouts.navbar')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <title>Wheat System| Welcome.</title>
            
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
           <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
           <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <link rel="stylesheet" href="{{asset('css/style2.css')}}">
            <script src="{{asset('js/validate.js')}}"></script>
           <script>
              AOS.init();
            </script>
            <style>
                .horizontal {
                    display: none;
                    border-bottom: 1vw solid #4169E1;
                    width: 99.5vw;
                }
                .login {
                    padding: 0vw 5vw 0vw 5vw;
                }
                .paddingview {
                    padding: 0vw 10vw 0vw 10vw;
                }
                table th {
                    font-weight: normal;
                }
    
            @media screen and (max-width: 800px) {
                .horizontal {
                    display: block;
                    padding-top: 5em;
                }
                .login {
                    padding: 2em 0em 5em 0em;
                }
                .paddingview {
                    padding: 0em 2em 0em 2em;
                }
                table th {
                    display: inline-block;
                }
            }
            </style>
        </head>
        <body>
          
            <table style="width: 100%; text-align: center;" data-aos="flip-left"
            data-aos-easing="ease-out-cubic"
            data-aos-duration="2000">
                <tr>
                    <th>
                        <div class="paddingview">
                            <img src="Logo.png" alt="Sustaino Logo" style="align:center; width: 400px; height:300px;">

                            <br><br><br><br>
                            <h1>Welcome To Our <span style="background:  #FFBA01;
                              -webkit-background-clip: text;
                              -webkit-text-fill-color: transparent;">Wheat System</span>.</h1>
                            <br><br>
                            <h2 style="text-decoration: underline solid  #FFBA01; font-size: 2em;" class="Mission">Our Mission :-</h2>
                            <p style="font-size: 1.5em;" class="Mpara">is to improve the wheat nutrition value and increase it's productivity among all the world .</p>
                            <br><br>
                            <br>
                            <h2 style="text-decoration: underline solid  #FFBA01; font-size: 2em;" class="Vision">Our Vision :-</h2>
                            <br>
                            <p style="font-size: 1.5em;" class="Vpara"> Our system would detect all the wheat impurities and monitor the wheather changes to prevent wheat rust .</p>
                        </div>
                    </th>
                    <br><br><br>
                    <th><div class = "horizontal"></div></th> 
                     
                </tr>
            </table>
            <br><br>
            
            <br><br>
            <br><br>

  
      
      <!-- ======= Contact Section ======= -->
    <section id="about" class="contact" data-aos="fade-up"
    data-aos-duration="3000">
        <div class="container">
  
          <div class="section-title">
            <h2>Contact Us</h2>
          <div class="row mt-5">
  
            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                    <i class="fas fa-search-location"></i>
                  <h4>Location:</h4>
                  <p>Cairo, Egypt.</p>
                </div>
  
                <div class="email">
                    <i class="fas fa-envelope-open-text"></i>
                  <h4>Email:</h4>
                  <p> info.WheatSystem@gmail.com</p>
                </div>
  
                <div class="phone">
                    <i class="fas fa-phone"></i>
                  <h4>Call:</h4>
                  <p> +022 012 0282 0504</p>
                </div>
  
              </div>
  
            </div>
  
            <div class="col-lg-8 mt-5 mt-lg-0">

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
            

              <form action="/message" method="patch" role="form" class="php-email-form">
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col-md-6 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validate"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="mb-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit"  data-toggle="modal" data-target="#centralModalSuccess">Send Message</button></div>
              </form>
  
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
          <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            
         
            <footer id="footer" style="position: relative;margin-top:-100px;clear:both;height:100px">
                @include('layouts.footer')
            </footer>
        </body>         
    </html>
@endsection