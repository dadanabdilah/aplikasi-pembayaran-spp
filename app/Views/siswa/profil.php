                    <?= $this->extend('layout/konten') ?>

                    <?= $this->section('content') ?>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?=$sub_title;?></h1>
                    </div>

                    <div class="card shadow-sm col-lg-9">
                    <?php
                        echo session()->get('pesan');
                        session()->remove('pesan');
                    ?>
                      <div class="card-body">
                        <h5 class="card-title text-gray-800">Profile</h5>

                        <div class="row pl-3">
                            <!-- <div class="col-md-1,5">
                                <img width="90px" src="/logo.jpg">
                            </div> -->
                            <!--end of col-->

                            <div class="col-lg">
                                <h6 class="card-subtitle mb-2">NISN : <?=$nisn;?></h6>
                                <h6 class="card-subtitle mb-2">NIS : <?=$nis;?></h6>
                                <h6 class="card-subtitle mb-2">Nama : <?=$nama_siswa;?></h6>
                                <h6 class="card-subtitle mb-2">Kelas : <?=$nama_kelas;?></h6>
                                <h6 class="card-subtitle mb-2">Spp Per Bulan : <?=$nominal;?></h6>
                                <p class="card-text">Telepon <?=$no_telp;?>, Alamat <?=$alamat;?></p>
                                <a href="#" class="card-link update_profile" data-toggle="modal" data-target="#modalUpdateProfil">Update</a>
                                <a href="/user/ubah-password" class="card-link">Ubah Password</a>
                            </div>
                          <!--end of col-->
                        </div>
                        <!--end of row-->
                      </div>
                    </div>
                    <!-- modal -->
                    <div class="modal fade" id="modalUpdateProfil" tabindex="-1" role="dialog" aria-labelledby="modalUpdateProfil" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalUpdateProfilTitle">Ubah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/siswa/ubah">
                                        <div class="row">
                                            <div class="col lg-6">
                                                 <div style="display: none;" id="hide-nisn" class="form-group">
                                                    <label for="exampleFormControlInput1">Id Siswa</label>
                                                    <input type="number" class="form-control" id="id_siswa" name="id_siswa" value="<?=$id_siswa;?>" placeholder="Masukan Id Siswa" autocomplete="off" autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">NIS</label>
                                                    <input type="number" class="form-control" id="nis" name="nis" value="<?=$nis;?>" placeholder="Masukan NIS" autocomplete="off" autofocus>
                                                </div>
                                                <div id="hide-nisn" class="form-group">
                                                    <label for="exampleFormControlInput1">NISN</label>
                                                    <input type="number" class="form-control" id="nisn" name="nisn" value="<?=$nisn;?>" placeholder="Masukan NISN" autocomplete="off" autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Nama Siswa</label>
                                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?=$nama_siswa;?>" placeholder="Masukan nama siswa" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label class="exampleFormControlInput1">Jenis Kelamin</label>
                                                    <select name="jk" id="jk" class="form-control">
                                                        <option value="L" <?= $jk == 'L' ? 'selected' : ''?> >Laki-laki</option>
                                                        <option value="P" <?= $jk == 'P' ? 'selected' : ''?> >Perempuan</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label class="exampleFormControlInput1">Jenis Kelamin</label>
                                                    <input name="jk" id="jk" class="form-control" value="<?=$jk;?>">
                                                </div> -->
                                                <div class="form-group">
                                                    <label class="exampleFormControlInput1">Alamat</label>
                                                    <textarea type="textarea" name="alamat" id="alamat" class="form-control" placeholder="Masukan alamat" autocomplete="off"><?=$alamat;?></textarea>
                                                </div>
                                            </div>
                                            <div class="col lg-6">
                                                <div class="form-group">
                                                    <label class="exampleFormControlInput1">No Telepon</label>
                                                    <input type="number" name="no_telp" id="no_telp" class="form-control" value="<?=$no_telp;?>" placeholder="Masukan no telepon" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label class="exampleFormControlInput1">Kelas</label>
                                                    <input type="text" name="nama_kelas" id="nama_kelas" value="<?=$nama_kelas;?>" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="exampleFormControlInput1">Tarif SPP</label>
                                                    <input type="number" name="nominal" id="nominal" class="form-control" value="<?=$nominal;?>" readonly>
                                                </div>

                                                <div class="mb-0">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="subtmit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <?= $this->endSection() ?>
