$(document).ready(function(){
    // instance data table
    $('#data-table-satu').DataTable();
    $('#data-table-dua').DataTable();


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
            url : 'kelas/detail/'+id,
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

    //ajax reset form bayar
    $(document).on('click', '#bayar_spp', function(){
        $('#modalBayarSppTitle').html('Bayar SPP');
        $('.modal-footer button[type=submit]').html('Simpan');
        $('.modal-body form').attr('action', '<?= base_url('pembayaran/bayar'); ?>');
        
        var nisn = $(this).attr("nisn");
        var nama_siswa = $(this).attr("nama_siswa");
        var id_spp = $(this).attr("id_spp");
        console.log('['+nisn+', '+nama_siswa+']');

        $('#nisn').val(nisn);
        $('#id_spp').val(id_spp);
        document.getElementById("nisn_dsply").readOnly = true;
        $('#nisn_dsply').val(nisn+' - '+nama_siswa);
    });

    //ajax set data bayar
    $(document).on('click', '#exam', function(){
        $('#modalBayarSppTitle').html('Bayar Spp');
        $('.modal-footer button[type=submit]').html('Update');
        $('.modal-body form').attr('action', '<?= base_url('pembayaran/bayar'); ?>');

        var id = $(this).attr("id_petugas");

        $.ajax({
            //data:{id_petugas:id},
            type : 'POST',
            url : 'petugas/detail/'+id,
            dataType : 'json',
            success : function(data){
                console.log(data);
                $('#id_petugas').val(data.id_petugas);
                $('#hide-id-petugas').hide();
                $('#nama_lengkap').val(data.nama_petugas);  
                $('#username').val(data.username);
                $('#password').val(data.password); 
                $('#hide-password').hide();
                $('#level').val(data.level); 
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
        $('#username').val('');
        $('#password').val('');
        $('#hide-password').show();
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
            url : 'petugas/detail/'+id,
            dataType : 'json',
            success : function(data){
                console.log(data);
                $('#id_petugas').val(data.id_petugas);
                $('#hide-id-petugas').hide();
                $('#nama_lengkap').val(data.nama_petugas);  
                $('#username').val(data.username);
                $('#password').val(data.password); 
                $('#hide-password').hide();
                $('#level').val(data.level); 
            }
        });
    });
    //end petugas

    //ajax reset form tambah siswa
    $(document).on('click', '#tambah_siswa', function(){
        $('#modalDataSiswaTitle').html('Tambah Data Siswa');
        $('.modal-footer button[type=submit]').html('Simpan');
        $('.modal-body form').attr('action', '<?= base_url('siswa/tambah'); ?>');

        $('#nisn').val('');
        document.getElementById("nisn").readOnly = false;
        
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

        var nisn = $(this).attr("nisn");

        $.ajax({
            //data:{id_petugas:id},
            type : 'POST',
            url : 'siswa/detail/'+nisn,
            dataType : 'json',
            success : function(data){
                console.log(data);
                $('#nisn').val(data.nisn);
                document.getElementById("nisn").readOnly = true;

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
            url : 'spp/detail/'+id_spp,
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
            url : 'user/detail/'+id,
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

});
// end
