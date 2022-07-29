<table id="dataBroadcast" style="table-layout: fixed; margin-top:15px"
    class="table table-bordered table-striped table-responsive-md">
    <thead>
                                                    <tr>
                                                        <th>Publisher</th>
                                                        <th>Judul</th>
                                                        <th>Waktu Publikasi</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                                    <tr>
                                                        <td><?php echo $row['nama'].' (Admin)'; ?></td>
                                                        <td><?php echo $row['judul']; ?></td>
                                                        <td><?php $date = date("d-m-Y H:i:s", strtotime($row['published'])); echo $date;?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" title="Detail" data-toggle="modal" data-target="#detailModal"
                                                                name="detil"
                                                                data-id_broadcast="<?php echo $row['id_broadcast']; ?>"
                                                                data-nip="<?php echo $row['nip']; ?>"
                                                                data-namalengkap="<?php echo $row['nama']; ?>"
                                                                data-gambar="<?php if (isset($row['gambar'])) {
                                                                                                                                                                                                                                                    echo $row['gambar'];
                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                    echo "blank.png";
                                                                                                                                                                                                                                                } ?>"
                                                                data-konten="<?php echo $row['konten']; ?>"
                                                                data-judul="<?php echo $row['judul']; ?>"
                                                                class="btn btn-info zoomPilih" href="#detailModal"
                                                                value="<?php echo $row['nip']; ?>"><i class="fas fa-info-circle"></i></button>
                                                                <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                                                                <button data-target="#konfirmasiDel" name="detil"
                                                                data-id="<?php echo $row['id_broadcast']; ?>"
                                                                data-toggle="modal" class="btn btn-danger zoomPilih"
                                                                href="#detailModal"
                                                                value="<?php echo $row['id_broadcast']; ?>"><i class="fas fa-trash"></i></button>
                                                                <?php endif;?>
                                                            </div>
                                                            <!-- <button data-target="#konfirmasiDel" name="detil"
                                                        data-id="<?php echo $row['id_lowongan_pekerjaan']; ?>"
                                                        data-toggle="modal" class="btn btn-danger col-md-12"
                                                        href="#detailModal"
                                                        value="<?php echo $row['id_lowongan_pekerjaan']; ?>">Delete</button> -->
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;
                                            else : ?>
                                                    <tr>
                                                        <td colspan="6">
                                                            <?php echo $this->session->flashdata('#error-broadcast');?>
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                                <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                                                <tfoot>
                                                    <?php if (!empty($posts)) :?>
                                                    <tr>
                                                        <th colspan="3">Hapus Semua Data Broadcast</th>
                                                        <td>
                                                            <button data-target="#konfirmasiDel3" name="detil3"
                                                                data-toggle="modal" class="btn btn-danger col-md-12 zoomPilih effect01 hitam"
                                                                href="#detailModal"><i class="fa fa-database" aria-hidden="true"></i> <i class="fas fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                    <?php endif;?>
                                                </tfoot>
                                                <?php endif; ?>
                                            </table>
<?php echo $this->ajax_pagination->create_links(!empty($filterAngkatan) ? $filterAngkatan : 0, !empty($filterKota) ? $filterKota : 1, !empty($filterStatus) ? $filterStatus : 2); ?>