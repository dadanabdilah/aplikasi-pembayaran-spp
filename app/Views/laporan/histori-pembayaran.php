                <?=$this->include('layout/header');?>
                <?=$this->include('layout/sidebar');?>
                <?=$this->include('layout/navbar');?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Histori Pembayaran SPP</h1>
                    </div> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between bg-white">
                                <form method="POST" action="/laporan/set">
                                    <?php if (session()->get('level') != 'siswa') { ?>
                                        <div style="width: 300px;" class="input-group mb-0">
                                            <!-- <div class="input-group-prepend">
                                                <label class="input-group-text text-gray-700 bg-white" for="inputGroupSelect01">Filter</label>
                                            </div> -->
                                            <select name="nis_nya" id="nis_nya" class="form-control selectpicker" data-live-search="true">
                                                <option value="all">Semua Data</option>
                                                <?php foreach ($data_siswa as $d) : ?>
                                                    <option value="<?=$d['nis']?>" <?= $d['nis'] == session()->get('fil_pmbyr') ? 'selected' : '' ; ?> ><?=$d['nama_siswa']?> - <?=$d['nama_kelas']?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2">Filter</button>
                                              </div>
                                        </div>
                                    <?php } ?>
                                </form>
                                <!-- <h6 class="text-gray-800">Total Uang Masuk: Rp. <?php //$row['SUM(jumlah_bayar)']; ?></h6> -->
                                <!-- <h6 class="text-gray-800">Total Uang Masuk: Rp. </h6> -->
                            </div>
                        <div class="loading"></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align: center; font-size: 14px">
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Tahun</th>
                                            <th>Bulan</th>
                                            <th>Tarif SPP</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Petugas Penerima</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datana">
                                        <?php $i=1;?>
                                        <?php foreach ($data_pembayaran as $d) : ?>
                                           <tr style="font-size: 16px">
                                                <td style="text-align: center;"><?=$i?></td>
                                                <td><?=$d['nama_siswa']?></td>
                                                <td><?=$d['nama_kelas']?></td>
                                                <td><?=$d['tahun_bayar']?></td>
                                                <td><?=nama_bulan($d['bulan_bayar'])?></td>
                                                <td><?=$d['nominal']?></td>
                                                <td><?=$d['jumlah_bayar']?></td>
                                                <td><?=$d['tgl_bayar']?></td>
                                                <td><?=$d['nama_petugas']?></td>
                                            </tr>
                                            <?php $i++;?>
                                        <?php endforeach; ?>
                                            <!-- <tr>
                                              <th scope="row">3</th>
                                              <td colspan="7">Larry the Bird</td>
                                              <td>@twitter</td>
                                          </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?=$this->include('layout/footer');?>
