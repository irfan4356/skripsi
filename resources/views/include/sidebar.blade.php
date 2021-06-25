<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIAKAD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if(auth()->user()->role == 'admin')
          <li class="nav-item">
            <a class="nav-link collapsed" href="/pengumuman" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pengumuman</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Buat Pengumuman</h6>
                    <a class="collapse-item" href="/pengumuman">Buat Pengumuman</a>
                </div>
            </div>
          </li>
          <li class="nav-item">
          <a href="{{route('siswa.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('guru.index')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Guru
              </p>
            </a>
          
          <li class="nav-item">
            <a href="{{route('kelas.index')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Kelas
              </p>
            </a>
            
          <li class="nav-item">
            <a href="{{route('mapel.index')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Mata Pelajaran
              </p>
            </a>
          </li>
        </ul>
      </nav>
        @endif
         {{-- endadmin --}}
            {{-- start siswa --}}
        @if(auth()->user()->role == 'siswa')
      <nav class="mt-2">
        <li class="nav-item">
          <a href="/nilaisaya" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Nilai
            </p>
          </a>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                MataPelajaran
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bahasa Indonesia</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Matematika</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bahasa Inggris</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
    </ul>
    </li>
    @endif
    {{-- end siswa --}}
    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    </div>
</aside>