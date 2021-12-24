                    <?= $this->extend('layout/konten') ?>

                    <?= $this->section('content') ?>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex align-items-center justify-content-between bg-white">
                            <h6 class="m-0 font-weight-bold text-">Data Siswa</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered" id="data-table-satu" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; font-size: 14px">No</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Tarif SPP</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach ($data_siswa as $d) : ?>
                                           <tr style="font-size: 16px">
                                                <td style="text-align: center;"><?=$i?></td>
                                                <td><?=$d['nis']?></td>
                                                <td><?=$d['nama_siswa']?></td>
                                                <td><?=$d['nama_kelas']?></td>
                                                <td><?=$d['nominal']?></td>
                                                <td align="center">
                                                  <a href="#" id="bayar_spp" class="badge badge-success" id_siswa="<?=$d['id_siswa'];?>" data-toggle="modal" data-target="#modalBayarSpp">
                                                    Bayar Spp
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center bg-white justify-content-between">
                            <h6 class="m-0 font-weight-bold text-">Histori Pembayaran Hari Ini</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered" id="data-table-dua" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; font-size: 14px">No</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Tanggal Bayar</th>
                                            <?php if (session()->get('level')=='admin') { ?>
                                                <th class="text-center">Aksi</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach ($pembayaran_hari_ini as $d) : ?>
                                           <tr style="font-size: 16px">
                                                <td style="text-align: center;"><?=$i?></td>
                                                <td><?=$d['nis']?></td>
                                                <td><?=$d['nama_siswa']?></td>
                                                <td><?=$d['nama_kelas']?></td>
                                                <td><?=$d['tahun_bayar']?></td>
                                                <td><?=nama_bulan($d['bulan_bayar'])?></td>
                                                <td><?=$d['jumlah_bayar']?></td>
                                                <td><?=$d['tgl_bayar']?></td>
                                                <?php if (session()->get('level')=='admin') { ?>
                                                    <td align="center">
                                                      <a href="#" id="bayar_spp" class="badge badge-success" id_siswa="<?=$d['id_siswa'];?>" data-toggle="modal" data-target="#modalBayarSpp">
                                                        Hapus
                                                      </a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                            <?php $i++;?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modalBayarSpp" tabindex="-1" role="dialog" aria-labelledby="modalBayarSpp" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title font-weight-bold" id="modalBayarSppTitle">Bayar SPP</h5>
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button> -->
                                    <h5 class="modal-title font-weight-bold" id="modalBayarSppTitle"><?=date('Y/m/d - H:i');?></h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/spp/bayar">
                                        <div class="row">
                                            <div class="col lg-6">
                                                <div style="display: none;" class="form-group">
                                                    <label for="exampleFormControlInput1">Id Petugas</label>
                                                    <input type="number" class="form-control" value="<?=session()->get('id_user')?>" id="id_petugas" name="id_petugas">
                                                </div>
                                                <div style="display: none;" class="form-group">
                                                    <label for="exampleFormControlInput1">NIS</label>
                                                    <input type="number" class="form-control" id="nis" name="nis" placeholder="Masukan NIS" autocomplete="off">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">NISN</label>
                                                    <input type="text" class="form-control" id="nis_dsply" name="nis_dsply" placeholder="Masukan NIS" autocomplete="off" readonly>
                                                </div>
                                                <!-- <div style="display: none;" class="form-group"> -->
                                                    <!-- <label class="font-weight-bold">Tarif SPP</label> -->
                                                    <!-- <label class="">Tarif SPP</label>
                                                    <select name="id_spp" id="id_spp" class="form-control">
                                                        <option value="">Trif SPP</option>
                                                        <?php foreach ($data_spp as $d) : ?>
                                                            <option value="<?=$d['id_spp']?>"><?=$d['nominal']?></option>
                                                        <?php endforeach; ?>
                                                    </select> -->
                                                <!-- </div> -->
                                                <div class="form-group">
                                                    <label class="">Jumlah Bayar</label>
                                                    <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" placeholder="Masukan jumlah pembayaran" autocomplete="off" readonly>
                                                </div>
                                            </div>
                                            <div class="col lg-6">
                                                <div class="form-group">
                                                    <label class="">Tahun</label>
                                                    <select name="tahun_bayar" id="tahun_bayar" class="form-control">
                                                        <option value="">Tahun</option>
                                                        <?php for ($i=date('Y'); $i >= 2015; $i--) { ?>
                                                            <option value="<?=$i?>"><?=$i?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">Bulan</label>
                                                    <select name="bulan_bayar" id="bulan_bayar" class="form-control">
                                                        <option value="">Bulan</option>
                                                        <?php for ($i=1; $i <= 12; $i++) { ?>
                                                            <?php if ($i <=9 ) { ?>
                                                                <option value="<?php echo "0$i"?>"><?=nama_bulan('0'.$i.'');?></option>
                                                            <?php } else{ ?>
                                                                <option value="<?php echo "$i"?>"><?=nama_bulan($i);?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="modal-footer mb-0">
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
