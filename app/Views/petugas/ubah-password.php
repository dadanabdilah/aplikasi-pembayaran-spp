                <?=$this->include('layout/header');?>
                <?=$this->include('layout/sidebar');?>
                <?=$this->include('layout/navbar');?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                                </div> -->
                                <!-- Card Body -->
                                <div class="card-body">
                                     <form method="POST" action="/petugas/simpan-password">

                                        <div style="display: none;" class="form-group">
                                            <label for="exampleFormControlInput1">Id Petugas</label>
                                            <input type="text" class="form-control" value="<?= session()->get('level') == 'siswa' ? session()->get('id_user') : session()->get('id_petugas') ?>" id="id_petugas" name="id_petugas" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Password Baru</label>
                                            <input type="password" class="form-control" id="password_baru_satu" name="password_baru_satu" placeholder="Masukan password baru" autocomplete="off" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Ulangi Password Baru</label>
                                            <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Ulangi password baru" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <button type="subtmit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?=$this->include('layout/footer');?>
                