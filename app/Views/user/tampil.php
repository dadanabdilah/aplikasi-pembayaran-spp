                    <?= $this->extend('layout/konten') ?>

                    <?= $this->section('content') ?>

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?=$sub_title;?></h1>
                    </div> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header bg-white d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-primary" id="tambah_user" data-toggle="modal" data-target="#modalDataUser"><i class="fas fa-fw fa-plus-circle"></i>
                              Tambah Data
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama User</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach ($data_user as $d) : ?>
                                           <tr>
                                                <td><?=$i?></td>
                                                <td><?=$d['nama_user']?></td>
                                                <td><?=$d['username']?></td>
                                                <td><?=$d['level']?></td>
                                                <td align="center">
                                                    <a href="#" id="ubah_user" class="btn btn-warning btn-circle btn-sm" id_user="<?=$d['id_user'];?>" data-toggle="modal" data-target="#modalDataUser">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a OnClick="return confirm('Hapus <?=$d['nama_user'];?>, dari database?')" href="user/hapus/<?= $d['id_user'];?>" class="btn btn-danger btn-circle btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </a>

                                                    <a OnClick="return confirm('Reset password <?=$d['nama_user'];?>, ke default (123)?')" href="/user/resetpass/<?=$d['id_user'];?>" class="btn btn-success btn-sm">
                                                        <i class="fas fa-redo-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $i++;?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modalDataUser" tabindex="-1" role="dialog" aria-labelledby="modalDataUser" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDataUserTitle">Tambah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/user/ubah">
                                        <div style="display: none;" id="hide-id-user" class="form-group">
                                            <label for="exampleFormControlInput1">Id User</label>
                                            <input type="text" class="form-control" id="id_user" name="id_user">
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
