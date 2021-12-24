                    <?= $this->extend('layout/konten') ?>

                    <?= $this->section('content') ?>

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
                    </div> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <?php
                            echo session()->get('pesan');
                            session()->remove('pesan');
                        ?>
                        <div class="card-header bg-white d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-primary" id="tambah_kelas" data-toggle="modal" data-target="#modalDataKelas"><i class="fas fa-fw fa-plus-circle"></i>
                              Tambah Data
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Kompetensi Keahlian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach ($data_kelas as $d) : ?>
                                            <tr>
                                                <td><?=$i?></td>
                                                <td><?=$d['nama_kelas']?></td>
                                                <td><?=$d['kompetensi_keahlian']?></td>
                                                <td align="center">
                                                    <a href="#" id="ubah_kelas" class="btn btn-warning btn-circle btn-sm" id_kelas="<?=$d['id_kelas'];?>" data-toggle="modal" data-target="#modalDataKelas">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a OnClick="return confirm('Hapus data ini?')" href="kelas/hapus/<?= $d['id_kelas'];?>" class="btn btn-danger btn-circle btn-sm">
                                                        <i class="fas fa-trash"></i>
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
                    <div class="modal fade" id="modalDataKelas" tabindex="-1" role="dialog" aria-labelledby="modalDataKelas" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDataKelasTitle">Tambah Data Kelas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/kelas/tambah">

                                        <div id="hide-id-kelas" class="form-group">
                                            <label for="exampleFormControlInput1">Id Kelas</label>
                                            <input type="text" class="form-control" id="id_kelas" name="id_kelas">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nama Kelas</label>
                                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukan nama lengkap" autocomplete="off" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Kompetensi Keahlian</label>
                                            <input type="text" class="form-control" id="kompetensi_keahlian" name="kompetensi_keahlian" placeholder="Masukan username" autocomplete="off">
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