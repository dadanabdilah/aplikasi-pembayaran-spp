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
