 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-dark">
  <ul class="navbar-nav ml-auto">
    <ul class="nav navbar-nav" style="margin-top:4px;">
        <li class="nav-item d-none d-lg-block">
            <a href="#" class="link ">
                <h3 class="pl-1">
                    SMP NEGERI 5 TEBO</h3>
            </a>
        </li>
                                </ul>
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }} <span class="badge badge-danger">{{ auth::user()->role }}</span></span>
            
        </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
    aria-labelledby="userDropdown">
    <a class="dropdown-item" href="/profilsaya">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Profile
    </a>
        <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        {{ __('Logout') }}
         </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
</div>
</li>

</ul>


</nav>
  <!-- /.navbar -->
  