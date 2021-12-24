				</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; RPL SMKN 2 Kuningan <?=date('Y');?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar dari aplikasi?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika kamu yakin untuk mengakhiri sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

       

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="/assets/js/bootstrap-select.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <script src="/assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/assets/sbadmin/js/sb-admin-2.min.js"></script>

    <!-- Data tables plugins -->
    <script src="/assets/sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Data tables custom scripts -->
    <script src="/assets/sbadmin/js/demo/datatables-demo.js"></script>

    <script src="/assets/sweetalert/sweetalert2.all.min.js"></script>

    <?php if(\Config\Services::request()->uri->getSegment(1) == 'dashboard') : ?>
        <!-- Page level plugins -->
        <script src="/assets/sbadmin/vendor/chart.js/Chart.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="/assets/sbadmin/js/demo/chart-area-demo.js"></script>
        <script src="/assets/sbadmin/js/demo/chart-pie-demo.js"></script>
    <?php endif;?>

    <script>
        // untuk  menampilkan sweet alert
        <?php if (session()->get('status')) { ?>
            const pesan = ' <?= session()->get('status'); ?> ' ;
            $(document).ready(function(){
                Swal.fire({
                    title : pesan,
                    text : "<?= session()->get('status-text'); ?>",
                    icon : "<?= session()->get('status-icon'); ?>",
                    confirmButtonText : "Oke",
                });
            });
        <?php
            $session_name = ['status', 'status-text', 'status-icon'];
            session()->remove($session_name);
        ?>
        <?php }?>


        function cek_data()
        {
            nis = $('#nis_nya').val(); 
            console.log(nis);
            $.ajax({
                type : 'POST',
                url  : '/laporan/historydetail/'+nis,
                cache: false,
                beforeSend: function() {
                    // $('#nis_nya').attr('disabled', true);
                    $('.loading').html('Loading...');
                },
                success: function(data){
                    console.log(data);
                    // nisn.attr('disabled', false);
                    $('.loading').html('');
                    // $('#tampilkan_data').html(data);
                    $('#datana').html(data);
                }
                });
            return false;
        }

        function tampil()
        {
            nisn = 'all';
            $.ajax({
                type : 'POST',
                url  : '/laporan/historydetail/'+nisn.val(),
                cache: false,
                beforeSend: function() {
                    // nisn.attr('disabled', true);
                    $('.loading').html('Loading...');
                },
                success: function(data){
                    console.log(data);
                    // nisn.attr('disabled', false);
                    $('.loading').html('');
                    $('#tampilkan_data').html(data);
                }
                });
            return false;
        }


        $(document).ready(function(){

            // batasi jumlah input
            $(document).on('input', '.min-length', function(){
                if (this.value.length > 12) {
                    this.value = this.value.slice(0,12); 
                }
            });


            // instance data table
            $('#data-table-satu').DataTable();
            $('#data-table-dua').DataTable();

            //ajax set data bayar
            $(document).on('click', '#bayar_spp', function(){
                // var id_siswa = $(this).attr("id_siswa");
                // console.log(id_siswa);
                $('#modalBayarSppTitle').html('Bayar SPP');
                $('.modal-footer button[type=submit]').html('Simpan');
                $('.modal-body form').attr('action', '<?= base_url('pembayaran/bayar'); ?>');
                
                var id_siswa = $(this).attr("id_siswa");
                console.log(id_siswa);
                // var nama_siswa = $(this).attr("nama_siswa");
                // var id_spp = $(this).attr("id_spp");
                // console.log('['+id_siswa+', '+nama_siswa+']');
                $.ajax({
                    //data:{id_petugas:id},
                    type : 'POST',
                    url : '/pembayaran/detaildata/'+id_siswa,
                    dataType : 'json',
                    success : function(data){
                        console.log(data);
                        $('#nis').val(data.data_siswa[0]['nis']);
                        $('#nis_dsply').val(data.data_siswa[0]['nis']+' - '+data.data_siswa[0]['nama_siswa']);
                        $('#id_spp').val(data.data_siswa[0]['id_spp']);
                        
                        $('#jumlah_bayar').val(data.data_siswa[0]['nominal']);
                    }
                });
            });
             // end bayar

            //ajax reset form tambah petugas
            $(document).on('click', '#tambah_petugas', function(){
                $('#modalDataPetugasTitle').html('Tambah Data Petugas');
                $('.modal-footer button[type=submit]').html('Simpan');
                $('.modal-body form').attr('action', '<?= base_url('petugas/tambah'); ?>');
                $('#id_petugas').val('');
                $('#hide-id-petugas').hide();
                $('#nama_lengkap').val('');  
                $('#email').val('');
                // $('#password').val('');
                // $('#hide-password').show();
            });

            //ajax get update petugas
            $(document).on('click', '#ubah_petugas', function(){
                $('#modalDataPetugasTitle').html('Update Data Petugas');
                $('.modal-footer button[type=submit]').html('Update');
                $('.modal-body form').attr('action', '<?= base_url('petugas/ubah'); ?>');

                var id = $(this).attr("id_petugas");

                $.ajax({
                    //data:{id_petugas:id},
                    type : 'POST',
                    url : '/petugas/detail/'+id,
                    dataType : 'json',
                    success : function(data){
                        console.log(data);
                        $('#id_petugas').val(data.id_petugas);
                        $('#hide-id-petugas').hide();
                        $('#nama_lengkap').val(data.nama_petugas);  
                        $('#email').val(data.email);
                        // $('#password').val(data.password); 
                        // $('#hide-password').hide();
                        // $('#level').val(data.level); 
                    }
                });
            });
            //end petugas

            //ajax reset form tambah kelas
            $(document).on('click', '#tambah_kelas', function(){
                $('#modalDatKelasTitle').html('Tambah Data Kelas');
                $('.modal-footer button[type=submit]').html('Simpan');
                $('.modal-body form').attr('action', '<?= base_url('kelas/tambah'); ?>');
                $('#id_kelas').val('');
                $('#hide-id-kelas').hide();
                $('#nama_kelas').val('');  
                $('#kompetensi_keahlian').val('');
            });

            //ajax get update kelas
            $(document).on('click', '#ubah_kelas', function(){
                $('#modalDataKelasTitle').html('Update Data Kelas');
                $('.modal-footer button[type=submit]').html('Update');
                $('.modal-body form').attr('action', '<?= base_url('kelas/ubah'); ?>');

                var id = $(this).attr("id_kelas");

                $.ajax({
                    //data:{id_petugas:id},
                    type : 'POST',
                    url : '/kelas/detail/'+id,
                    dataType : 'json',
                    success : function(data){
                        console.log(data);
                        $('#id_kelas').val(data.id_kelas);
                        $('#hide-id-kelas').hide();
                        $('#nama_kelas').val(data.nama_kelas);  
                        $('#kompetensi_keahlian').val(data.kompetensi_keahlian);
                    }
                });
            });
            // end kelas

            //ajax reset form tambah spp
            $(document).on('click', '#tambah_spp', function(){
                $('#modalDatSppTitle').html('Tambah Data Spp');
                $('.modal-footer button[type=submit]').html('Simpan');
                $('.modal-body form').attr('action', '<?= base_url('spp/tambah'); ?>');
                $('#id_spp').val('');
                $('#hide-id-spp').hide();
                $('#tahun').val('');  
                $('#nominal').val('');
            });

            //ajax get update spp
            $(document).on('click', '#ubah_spp', function(){
                $('#modalDataSppTitle').html('Update Data Spp');
                $('.modal-footer button[type=submit]').html('Update');
                $('.modal-body form').attr('action', '<?= base_url('spp/ubah'); ?>');

                var id_spp = $(this).attr("id_spp");

                $.ajax({
                    //data:{id_petugas:id},
                    type : 'POST',
                    url : '/spp/detail/'+id_spp,
                    dataType : 'json',
                    success : function(data){
                        console.log(data);
                        $('#id_spp').val(data.id_spp);
                        $('#hide-id-spp').hide();
                        $('#tahun').val(data.tahun);  
                        $('#nominal').val(data.nominal);
                    }
                });
            });
            // end spp 

            //ajax reset form tambah siswa
            $(document).on('click', '#tambah_siswa', function(){
                $('#modalDataSiswaTitle').html('Tambah Data Siswa');
                $('.modal-footer button[type=submit]').html('Simpan');
                $('.modal-body form').attr('action', '<?= base_url('siswa/tambah'); ?>');

                $('#id_siswa').val('');
                $('#nisn').val('');
                // document.getElementById("nisn").readOnly = false;
                $('#nis').val('');  
                $('#nama_siswa').val('');
                $('#jk').val('');
                $('#alamat').val('');
                $('#no_telp').val('');
                $('#id_kelas').val('');
                $('#id_spp').val('');
            });

            //ajax get update siswa
            $(document).on('click', '#ubah_siswa', function(){
                $('#modalDataSiswaTitle').html('Update Data Siswa');
                $('.modal-footer button[type=submit]').html('Update');
                $('.modal-body form').attr('action', '<?= base_url('siswa/ubah'); ?>');

                var id_siswa = $(this).attr("id_siswa");

                $.ajax({
                    //data:{id_petugas:id},
                    type : 'POST',
                    url : '/siswa/detail/'+id_siswa,
                    dataType : 'json',
                    success : function(data){
                        console.log(data);
                        $('#id_siswa').val(data.id_siswa);
                        $('#nisn').val(data.nisn);
                        // document.getElementById("nisn").readOnly = true;
                        $('#nis').val(data.nis);  
                        $('#nama_siswa').val(data.nama_siswa);
                        $('#jk').val(data.jk);
                        $('#alamat').val(data.alamat);
                        $('#no_telp').val(data.no_telp);
                        $('#id_kelas').val(data.id_kelas);
                        $('#id_spp').val(data.id_spp);
                    }
                });
            });
            // end siswa



            //ajax reset form tambah user
            $(document).on('click', '#tambah_user', function(){
                $('#modalDataUserTitle').html('Tambah Data User');
                $('.modal-footer button[type=submit]').html('Simpan');
                $('.modal-body form').attr('action', 'user/tambah');

                $('#id_user').val('');
                $('#hide-id-user').hide();
                $('#nama_user').val('');  
                $('#username').val('');
                $('#password').val('');
                $('#hide-password').show();
            });

            //ajax get update user
            $(document).on('click', '#ubah_user', function(){
                $('#modalDataUserTitle').html('Update Data User');
                $('.modal-footer button[type=submit]').html('Update');
                $('.modal-body form').attr('action', 'user/ubah');

                var id = $(this).attr("id_user");

                $.ajax({
                    //data:{id_petugas:id},
                    type : 'POST',
                    url : '/user/detail/'+id,
                    dataType : 'json',
                    success : function(data){
                        console.log(data);
                        $('#id_user').val(data.id_user);
                        // $('#hide-id-user').hide();
                        $('#nama_user').val(data.nama_user);  
                        $('#username').val(data.username);
                        $('#password').val(data.password); 
                        $('#hide-password').hide();
                        $('#level').val(data.level); 
                    }
                });
            });
            // end user

        });
        // end
    </script>

</body>

</html>