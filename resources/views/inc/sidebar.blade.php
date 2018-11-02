<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Peminjaman buku</span>
    </a>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Menu
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/anggota') }}" class="nav-link {{ url('/anggota') == request()->url() ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Anggota</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/jenis') }}" class="nav-link {{ url('/jenis') == request()->url() ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Jenis</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/buku') }}" class="nav-link {{ url('/buku') == request()->url() ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Buku</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/pinjam') }}" class="nav-link {{ url('/pinjam') == request()->url() ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Peminjaman</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('/pengembalian') }}" class="nav-link {{ url('/pengembalian') == request()->url() ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Pengembalian</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>