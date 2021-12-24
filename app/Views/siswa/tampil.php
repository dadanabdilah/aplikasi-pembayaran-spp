                    <?= $this->extend('layout/konten') ?>

                    <?= $this->section('content') ?>

                    <!-- Page Heading -->
                   <!--  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
                    </div> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <?php
                            echo session()->get('pesan');
                            session()->remove('pesan');
                        ?>
                        <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> -->
                        <div class="card-header bg-white">
                            <!-- <h6 class="m-0 font-weight-bold text-primary"></h6> -->
                             <!-- Button trigger modal -->
                            <div class="row">
                                <div class="col-lg-4">
                                    <form method="POST" action="">
                                        <div class="input-group input-group-sm">
                                            <?php if (session()->get('key')) { ?>
                                                <input type="text" class="form-control" value="<?=session()->get('key')?>" name="keyword" placeholder="Cari..." aria-label="Recipient's username" aria-describedby="button-addon2" readonly>
                                                <div class="input-group-append">
                                                    <a href="/siswa/destroy" class="btn btn-outline-secondary" type="submit" id="button-addon2">Reset</a>
                                                </div>
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="keyword" placeholder="Cari..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                                                </div>
                                            <?php }?>
                                        </div>
                                    </form>
                                </div>
                                <div class="col d-flex flex-row align-items-center justify-content-end">
                                    <button type="button" class="btn btn-sm btn-primary" id="tambah_siswa" data-toggle="modal" data-target="#modalDataSiswa"><i class="fas fa-fw fa-plus-circle"></i>Tambah Data</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-hover" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: 14px">
                                            <th style="text-align: center;">No</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>L/P</th>
                                            <th>Alamat</th>
                                            <th>Kelas</th>
                                            <th>Tarif SPP</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1 + ($jml_per_page * ($current_page - 1));?>
                                        <?php foreach ($data_siswa as $d) : ?>
                                           <tr style="font-size: 16px">
                                                <td style="text-align: center;"><?=$i?></td>
                                                <td><?=$d['nis']?></td>
                                                <td><?=$d['nama_siswa']?></td>
                                                <td><?=$d['jk']?></td>
                                                <td><?=$d['alamat']?></td>  
                                                <td><?=$d['nama_kelas']?></td>
                                                <td><?=$d['nominal']?></td>
                                                <td align="center">
                                                  <a href="#" id="ubah_siswa" class="" id_siswa="<?=$d['id_siswa'];?>" data-toggle="modal" data-target="#modalDataSiswa">
                                                    <i class="fas fa-edit"></i>
                                                  </a>

                                                  <a OnClick="return confirm('Hapus data ini?')" href="siswa/hapus/<?= $d['nis'];?>" class="">
                                                    <i class="fas fa-trash"></i>
                                                  </a>
                                                </td>
                                            </tr>
                                            <?php $i++;?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?= $pager->links('siswa','siswa_pagination') ?>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->
                    <?= $this->include('siswa/modal-box') ?>
                    
                <?= $this->endSection() ?>
