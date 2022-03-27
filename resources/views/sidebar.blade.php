
	<script src="{{asset('public/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->

      <div class="logo">
        <a href="{{route('home')}}" class="simple-text logo-normal" style="font-size: 12px;">
          GENERAL TECHNOLOGY & SERVICES
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
            <a href="{{route('dashboard')}}">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ (request()->is('dashboard/services') || request()->is('dashboard/add-service') || request()->is('dashboard/edit-service/*')) ? 'active' : '' }}">
            <a href="{{route('dashboard.services')}}">
              <i class="now-ui-icons business_briefcase-24"></i>
              <p>Services</p>
            </a>
          </li>
          <li class="{{ (request()->is('dashboard/projects') || request()->is('dashboard/add-project') || request()->is('dashboard/edit-project/*')) ? 'active' : '' }}">
            <a href="{{route('dashboard.projects')}}">
              <i class="now-ui-icons design_app"></i>
              <p>Projects</p>
            </a>
          </li>
<!--           <li>
            <a href="{{route('dashboard.posts')}}">
              <i class="now-ui-icons files_paper"></i>
              <p>Posts</p>
            </a>
          </li> -->
          <li>
            <a href="{{route('dashboard.demandes')}}">
              <i class="now-ui-icons loader_refresh"></i>
              <p>Requests</p>
            </a>
          </li>
          <li>
            <a href="{{route('dashboard.admins')}}">
              <i class="now-ui-icons users_single-02"></i>
              <p>Admins</p>
            </a>
          </li>
          <li>
            <a href="{{ route('dashboard.utilisateur') }}">
              <i class="now-ui-icons users_single-02"></i>
              <p>Clients</p>
            </a>
          </li>
          <li>
            <a href="{{route('dashboard.settings')}}">
              <i class="now-ui-icons loader_gear"></i>
              <p>Settings</p>
            </a>
          </li>
          <li>
            <a href="{{route('dashboard.apropos')}}">
              <i class="now-ui-icons loader_gear"></i>
              <p>A propos</p>
            </a>
          </li>
          <li>
            <a href="{{route('dashboard.reference')}}">
              <i class="now-ui-icons loader_gear"></i>
              <p>Référence</p>
            </a>
          </li>
          <li>
            <a href="{{route('dashboard.temoignage')}}">
              <i class="now-ui-icons loader_gear"></i>
              <p>Témoignages</p>
            </a>
          </li>
          <li>
            <a href="{{route('dashboard.contact')}}">
              <i class="now-ui-icons loader_gear"></i>
              <p>Contact</p>
            </a>
          </li>
          <li>
            <a href="{{route('logout')}}">
              <i class="now-ui-icons media-1_button-power"></i>
              <p>Se déconnecter</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
