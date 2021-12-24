                   	<!-- Modal -->
                    <div class="modal fade" id="modalDataSiswa" tabindex="-1" role="dialog" aria-labelledby="modalDataSiswa" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalDataSiswaTitle">Tambah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/siswa/tambah">
                                        <div class="row">
                                            <div class="col lg-6">
                                                <div style="display: none;" id="hide-id-siswa" class="form-group">
                                                    <label for="exampleFormControlInput1">Id Siswa</label>
                                                    <input type="number" class="form-control" id="id_siswa" name="id_siswa" placeholder="Masukan NISN" autocomplete="off">
                                                </div>
                                                <div id="hide-nisn" class="form-group">
                                                    <label for="exampleFormControlInput1">NISN</label>
                                                    <input required type="number" class="form-control min-length" id="nisn" name="nisn" placeholder="Masukan NISN" autocomplete="off"  autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">NIS</label>
                                                    <input required type="number" class="form-control min-length" id="nis" name="nis" placeholder="Masukan NIS" autocomplete="off" autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Nama Siswa</label>
                                                    <input required type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukan nama siswa" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label class="exampleFormControlInput1">Jenis Kelamin</label>
                                                    <select name="jk" id="jk" class="form-control">
                                                        <option value="L">Laki-laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="exampleFormControlInput1">Alamat</label>
                                                    <textarea type="textarea" name="alamat" id="alamat" class="form-control" placeholder="Masukan alamat" autocomplete="off"></textarea>
                                                </div>
                                            </div>
                                            <div class="col lg-6">
                                                <div class="form-group">
                                                    <label class="exampleFormControlInput1">No Telepon</label>
                                                    <input required type="number" name="no_telp" id="no_telp" class="form-control" placeholder="Masukan no telepon" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label class="exampleFormControlInput1">Kelas</label>
                                                    <select name="id_kelas" id="id_kelas" class="form-control">
                                                        <?php foreach ($data_kelas as $d) : ?>
                                                            <option value="<?=$d['id_kelas']?>"><?=$d['nama_kelas']?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="exampleFormControlInput1">Tarif SPP</label>
                                                    <select name="id_spp" id="id_spp" class="form-control">
                                                        <?php foreach ($tarif_spp as $d) : ?>
                                                            <option value="<?=$d['id_spp']?>"><?=$d['nominal']?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="mb-0">
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