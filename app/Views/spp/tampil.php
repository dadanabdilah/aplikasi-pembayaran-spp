                    <?= $this->extend('layout/konten') ?>

                    <?= $this->section('content') ?>

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data SPP</h1>
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
                            <button type="button" class="btn btn-sm btn-primary" id="tambah_spp" data-toggle="modal" data-target="#modalDataSpp"><i class="fas fa-fw fa-plus-circle"></i>
                              Tambah Data
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun</th>
                                            <th>Nominal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach ($data_spp as $d) : ?>
                                           <tr>
                                                <td><?=$i?></td>
                                                <td><?=$d['tahun']?></td>
                                                <td><?=$d['nominal']?></td>
                                                <td align="center">
                                                  <a href="#" id="ubah_spp" class="btn btn-warning btn-circle btn-sm" id_spp="<?=$d['id_spp'];?>" data-toggle="modal" data-target="#modalDataSpp">
                                                    <i class="fas fa-edit"></i>
                                                  </a>

                                                  <a OnClick="return confirm('Hapus data ini?')" href="spp/hapus/<?= $d['id_spp'];?>" class="btn btn-danger btn-circle btn-sm">
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
                    <div class="modal fade" id="modalDataSpp" tabindex="-1" role="dialog" aria-labelledby="modalDataSpp" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDataSppTitle">Tambah Data Spp</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/spp/ubah">

                                        <div id="hide-id-spp" class="form-group">
                                            <label for="exampleFormControlInput1">Id Spp</label>
                                            <input type="text" class="form-control" id="id_spp" name="id_spp">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Tahun</label>
                                            <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukan tahun" autocomplete="off" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nominal</label>
                                            <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Masukan nominal" autocomplete="off">
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
