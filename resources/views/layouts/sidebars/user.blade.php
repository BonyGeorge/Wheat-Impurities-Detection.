<nav id="sidebar" class="sidebar-wrapper">
  <div class="sidebar-content">
    <div class="sidebar-brand">
      <a href="/"><img src="logo_no.png" alt="" style="height:50px;width:50px;"></a>
      <div id="close-sidebar">
        <i class="fas fa-times"></i>
      </div>
    </div>
    <div class="sidebar-header">
      <div class="">

        @if(Auth::user()->filename == NULL)

        <img class="rounded-circle" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
        alt="" style="width:100px; height:100px; margin-left:20%">
        @else

        <img class="rounded-circle" src="{{asset('storage/ProfilePicture/' .Auth::user()->filename)}}"
        alt="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" style="width:100px; height:100px; margin-left:20%">


        @endif
      </div>
      <br>
      <div class="user-info" style="margin-left:35%">
      <span class="user-name" >
        <strong > {{ Auth::user()->name }}</strong>
      </span>
      <br>
      <span class="user-role" style="margin-left:22%">User</span>
        <span class="user-status">
        </span>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul>

        <li class="sidebar">
          <a href="/profile">
            <i class="fa fa-user"></i>
            <span>Your Profile</span>
          </a>
          </li>
          

          <li class="sidebar">
          <a href="{{ url('/dashboard') }}">
            <i class="fa fa-chart-line"></i>
            <span>Dashboard</span>
          </a>
          </li>


          <li class="sidebar">
          <a href="{{ url('/sendmail') }}">
            <i class="fa fa-envelope"></i>
            <span>Send Mail</span>
          </a>
          </li>


          <li class="sidebar">
          <a href="{{ url('/upload') }}">
            <i class="fa fa-upload"></i>
            <span>Classification</span>
          </a>
          </li>

          <li class="sidebar">
            <a href="/weather_getData">
              <i class="fa fa-cloud-moon-rain"></i>
              <span>Weather Data</span>
            </a>
            </li>

            <li class="sidebar">
              <a href="/wnotifications">
                <i class="fa fa-bell"></i>
                <span>Weather Notifications</span>
              </a>
              </li>
