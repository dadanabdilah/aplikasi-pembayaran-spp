                    <?= $this->extend('layout/konten') ?>

                    <?= $this->section('content') ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?=$sub_title;?></h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/siswa/profil">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">NISN</label>
                                    <input type="number" class="form-control" id="nisn" name="nisn" placeholder="Masukan NISN" autocomplete="off" autofocus readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">NIS</label>
                                    <input type="number" class="form-control" id="nis" name="nis" placeholder="Masukan NIS" autocomplete="off" autofocus readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukan nama siswa" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="exampleFormControlInput1">Jenis Kelamin</label>
                                    <select name="jk" id="jk" class="form-control">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="exampleFormControlInput1">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan alamat" autocomplete="off" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="exampleFormControlInput1">No Telepon</label>
                                    <input type="number" name="no_telp" id="no_telp" class="form-control" placeholder="Masukan alamat" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="exampleFormControlInput1">Kelas</label>
                                    <input type="number" name="kelas" id="kelas" class="form-control" placeholder="Kelas" autocomplete="off" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="exampleFormControlInput1">Tarif SPP</label>
                                    <input type="number" name="no_telp" id="no_telp" class="form-control" placeholder="Tarif SPP" autocomplete="off" readonly>
                                </div>

                                <div class="modal-footer mb-0">
                                    <button type="subtmit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="card shadow-sm">
                      <div class="card-body">
                        <h5 class="card-title text-gray-800">Profile</h5>
                        <div class="row pl-3">
                            <!-- <div class="col-md-1,5">
                                <img width="90px" src="/logo.jpg">
                            </div> -->
                            <!--end of col-->

                            <div class="col-lg">
                                <h6 class="card-subtitle mb-2">Nama Kamu : <?=session()->get('nama_petugas')?></h6>
                                <h6 class="card-subtitle mb-2">Username : <?=session()->get('username')?></h6>
                                <p class="card-text">Some quick example text to build on the card title and make up.</p>
                                <a href="#" class="card-link update_profile" data-toggle="modal" data-target="#modalUpdateProfil">Update</a>
                                <a href="#" class="card-link" data-toggle="modal" data-target="#ubahPasswordModal">Ubah Password</a>
                            </div>
                          <!--end of col-->
                        </div>
                        <!--end of row-->
                      </div>
                    </div>
                    <!-- modal -->
                    <div class="modal fade" id="modalUpdateProfil" tabindex="-1" role="dialog" aria-labelledby="modalUpdateProfil" aria-hidden="true">
                        <div class="modal-dialog modal modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDataUserTitle">Ubah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/user/ubah">
                                        <div style="display: none;" id="hide-id-user" class="form-group">
                                            <label for="exampleFormControlInput1">Id User</label>
                                            <input type="text" class="form-conrol" id="id_user" name="id_user">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nama User</label>
                                            <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Masukan nama lengkap" autocomplete="off" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" autocomplete="off">
                                        </div>
                                        <div id="hide-password" class="form-group">
                                            <label class="exampleFormControlInput1">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label class="exampleFormControlInput1">Level Petugas</label>
                                            <select name="level" id="level" class="form-control">
                                                <option value="admin">Admin SPP</option>
                                                <option value="petugas">Petugas SPP</option>
                                                <option value="siswa">Siswa</option>
                                            </select>
                                        </div>

                                        <div class="modal-footer mb-0">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="subtmit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <?= $this->endSection() ?>
                