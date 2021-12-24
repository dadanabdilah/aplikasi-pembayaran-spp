
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-school"></i>
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <div class="sidebar-brand-text mx-3">Aplkasi SPP</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php $this->req = \Config\Services::request()?>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->req->uri->getSegment(1) == 'dashboard' ? 'active' : '' ?> my-0">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php if (session()->get('level')=='siswa') { ?>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Pembayaran -->
                <li class="nav-item <?= $this->req->uri->getSegment(2) == 'profil' ? 'active' : '' ?>  my-0">
                    <a class="nav-link pb-0" href="/siswa/profil">
                        <i class="fas fa-fw fa-user-alt"></i>
                        <span>Profil Saya</span></a>
                </li>

                <!-- Nav Item - Data Kelas -->
                <li class="nav-item <?= $this->req->uri->getSegment(1) == 'laporan' ? 'active' : '' ?>  my-0">
                    <a class="nav-link pb" href="/laporan/histori/pembayaran">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Histori Pembayaran</span></a>
                </li>
            <?php } ?>

            <?php if (session()->get('level')=='admin') { ?>
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Master
                </div>

                <!-- Nav Item - Pembayaran -->
                <li class="nav-item <?= $this->req->uri->getSegment(1) == 'spp' ? 'active' : '' ?>  my-0">
                    <a class="nav-link pb-0" href="/spp">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Tarif SPP</span></a>
                </li>

                <!-- Nav Item - Data Kelas -->
                <li class="nav-item <?= $this->req->uri->getSegment(1) == 'kelas' ? 'active' : '' ?>  my-0">
                    <a class="nav-link pb-0" href="/kelas">
                        <i class="fas fa-fw fa-user-alt"></i>
                        <span>Data Kelas</span></a>
                </li>

                <!-- Nav Item - Data Siswa -->
                <li class="nav-item <?= $this->req->uri->getSegment(1) == 'siswa' && $this->req->uri->getSegment(2) != 'profil'? 'active' : '' ?>  my-0">
                    <a class="nav-link pb-0" href="/siswa">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Data Siswa</span></a>
                </li>

                <!-- Nav Item - Data Petugas -->
                <li class="nav-item <?= $this->req->uri->getSegment(1) == 'petugas' ? 'active' : '' ?>  my-0">
                    <a class="nav-link pb-0" href="/petugas/tampil">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Data Petugas</span></a>
                </li>

                <!-- Nav Item - Data Petugas -->
                <li class="nav-item <?= $this->req->uri->getSegment(1) == 'user' ? 'active' : '' ?>  my-0">
                    <a class="nav-link" href="/user">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Data User</span></a>
                </li>
            <?php } ?>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php if ( session()->get('level') == 'petugas' ) { ?>
                <!-- Nav Item - Pages SPP -->
                <li class="nav-item <?= $this->req->uri->getSegment(1) == 'pembayaran' ? 'active' : '' ?>">
                    <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-money-check"></i>
                        <span>Transaksi</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pilih Menu:</h6>
                            <a class="collapse-item" href="/pembayaran/spp">Pembayaran</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?= $this->req->uri->getSegment(1) == 'laporan' ? 'active' : '' ?> ">
                    <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Laporan</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white collapse-inner rounded">
                            <h6 class="collapse-header">Pilih Menu:</h6>
                            <a class="collapse-item" href="/laporan/histori-pembayaran">Histori Pembayaran</a>
                            <?php if (session()->get('level')=='admin') { ?>
                                <a class="collapse-item ml-2" href="/laporan/penerimaan">Laporan Penerimaan</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php if ( session()->get('level') == 'admin' ) { ?>
                <!-- Nav Item - Pages SPP -->
                <li class="nav-item <?= $this->req->uri->getSegment(1) == 'pembayaran' ? 'active' : '' ?>">
                    <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-money-check"></i>
                        <span>Transaksi</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pilih Menu:</h6>
                            <a class="collapse-item" href="/pembayaran/spp">Pembayaran</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item <?= $this->req->uri->getSegment(1) == 'laporan' ? 'active' : '' ?> ">
                    <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Laporan</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white collapse-inner rounded">
                            <h6 class="collapse-header">Pilih Menu:</h6>
                            <a class="collapse-item" href="/laporan/histori-pembayaran">Histori Pembayaran</a>
                            <?php if (session()->get('level')=='admin') { ?>
                                <a class="collapse-item ml-2" href="/laporan/penerimaan">Laporan Penerimaan</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <!-- Nav Item - Logout -->
            <li class="nav-item my-0">
                <a class="nav-link" href="/logout">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
