                    <?= $this->extend('layout/konten') ?>

                    <?= $this->section('content') ?>
                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div> -->


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl col-lg-7">
                            <div class="card shadow-sm mb-4">
                                <div style="min-height: 350px" class="card-body">
                                    <h4 class="text-gray-800">Selamat datang, <?= session()->get('nama_user')?></h4>
                                    <div style="display: none;" class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?= $this->endSection() ?>
