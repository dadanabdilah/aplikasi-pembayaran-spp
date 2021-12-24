                <?=$this->include('layout/header');?>
                <?=$this->include('layout/sidebar');?>
                <?=$this->include('layout/navbar');?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div id="konten-nya">
                        <?= $this->renderSection('content') ?>
                    </div>
                    <?=$this->include('layout/footer');?>