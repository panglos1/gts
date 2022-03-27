<!-- Navbar -->
<script src="{{asset('public/js/jquery.min.js')}}"></script>
<script src="{{asset('public/js/jquery-migrate-3.0.1.min.js')}}"></script>

<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
  <div class="container-fluid" style="background-color: #fd7e14">
    <div class="navbar-wrapper">
      <div class="navbar-toggle">
        <button id="toggle-sidebar" type="button" class="navbar-toggler">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <script>
        $(document).ready(function() {
          $('#toggle-sidebar').on('click', function() {
            $('html').toggleClass('nav-open');
          });
        });
      </script>
      <a class="navbar-brand" href="{{route('dashboard')}}">Dashboard</a>
    </div>
  </div>
</nav>
<!-- End Navbar -->
