                <?=$this->include('layout/header');?>
                <?=$this->include('layout/sidebar');?>
                <?=$this->include('layout/navbar');?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan Penerimaan SPP</h1>
                    </div> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex flex-row align-items-center justify-content-between bg-white">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                            <div>
                                <a target="_blank" href="/laporan/download/excel" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Export Excel</a>
                                <a target="_blank" href="/laporan/download/pdf" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Export PDF</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; font-size: 14px">No</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Tahun & Bulan Yang Dibayar</th>
                                            <th>Tarif SPP</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Nama Petugas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        <?php foreach ($data_pembayaran as $d) : ?>
                                           <tr style="font-size: 16px">
                                                <td style="text-align: center;"><?=$i?></td>
                                                <td><?=$d['nama_siswa']?></td>
                                                <td><?=$d['nama_kelas']?></td>
                                                <td>Tahun <?=$d['tahun_bayar']?> - Bulan <?=$d['bulan_bayar']?></td>
                                                <td><?=$d['nominal']?></td>
                                                <td><?=$d['jumlah_bayar']?></td>
                                                <td><?=$d['tgl_bayar']?></td>
                                                <td><?=$d['nama_petugas']?></td>
                                            </tr>
                                            <?php $i++;?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?=$this->include('layout/footer');?>
