
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (auth()->user()->level=="admin")
              <li class="nav-item">
                <a href="{{route('halaman-dashboard')}}" class="nav-link active">
                  <i class="fa fa-bars"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('halaman-customer')}}" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('halaman-supplier')}}" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('halaman-penjualan')}}" class="nav-link">
                  <i class="fa fa-shopping-cart"></i>
                  <p>Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('halaman-pembelian')}}" class="nav-link">
                  <i class="fa fa-credit-card"></i>
                  <p>Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('halaman-inventory')}}" class="nav-link">
                  <i class="fa fa-database"></i>
                  <p>Inventory</p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-university"></i>
                  <p>
                    Keuangan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('halaman-pemasukan')}}" class="nav-link">
                    <i class="fa fa-credit-card"></i>
                    <p>Pemasukkan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('halaman-pengeluaran')}}" class="nav-link">
                    <i class="fa fa-credit-card"></i>
                    <p>Pengeluaran</p>
                  </a>
                </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="{{route('halaman-akun')}}" class="nav-link">
                  <i class="fa fa-balance-scale"></i>
                  <p>Akun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('halaman-bukubesar')}}" class="nav-link">
                  <i class="fa fa-address-card"></i>
                  <p>Buku Besar</p>
                </a>
              </li>
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-university"></i>
                  <p>
                    Laporan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('cetak-penjualan')}}" class="nav-link">
                    <i class="fa fa-credit-card"></i>
                    <p>Laporan Penjualan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('cetak-pembelian')}}" class="nav-link">
                    <i class="fa fa-credit-card"></i>
                    <p>Laporan Pembelian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('cetak-pemasukan')}}" class="nav-link">
                    <i class="fa fa-credit-card"></i>
                    <p>Laporan Pemasukkan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('cetak-bukubesar')}}" class="nav-link">
                    <i class="fa fa-credit-card"></i>
                    <p>Laporan Buku Besar</p>
                  </a>
                </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="{{route('password.edit')}}" class="nav-link">
                  <i class="fa fa-cog"></i>
                  <p>Pengaturan</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>