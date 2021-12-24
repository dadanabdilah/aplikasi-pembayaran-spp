                <?= $this->extend('layout/konten') ?>

                <?= $this->section('content') ?>
                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ubah Password</h1>
                    </div> -->

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <?php if (\Config\Services::request()->uri->getSegment(1) == "first") { ?>
                                <div class="card-header py-3 d-flex align-items-center justify-content-between bg-white">
                                    <h6 class="m-0 font-weight-bold text-">Ubah password agar bisa mengakses aplikasi!</h6>
                                </div>
                                <?php } ?>
                                <!-- Card Body -->
                                <div class="card-body">
                                     <form method="POST" action="/user/simpan-password">

                                        <div style="display: none;" class="form-group">
                                            <label for="exampleFormControlInput1">Id User</label>
                                            <input type="text" class="form-control" value="<?= session()->get('id_user') ?>" id="id_user" name="id_user" readonly>
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
                    <?= $this->endSection() ?>
                