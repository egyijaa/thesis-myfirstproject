<table id="dataLowongan" style="table-layout: fixed;  margin-top:15px"
                                                class="table table-bordered table-striped table-responsive-md">
                                                <thead>
                                                    <tr>
                                                        <th>Publisher</th>
                                                        <th>Judul</th>
                                                        <th>Minimal<br>Pendidikan</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                                    <tr>
                                                        <td><?php echo $row['NAMA']; ?><?php if (empty($row['username'])){
                                                            echo ' (Admin)';
                                                        } ?></td>
                                                        <td><?php echo $row['judul']; ?></td>
                                                        <td><?php echo $row['ang']; ?></td>
                                                        <?php $date = strtotime($row['expired']) - time();?>
                                                        <td><?php 
                                                        if ($row['active'] == 1){
                                                            echo '<span class =" badge badge-success ">Tervalidasi</span>';
                                                        }
                                                        else {
                                                            echo '<span class =" badge badge-warning ">Belum Divalidasi</span> ';
                                                        } ?> + 
                                                        <?php
                                                        if ( $date > 259200 ){
                                                            echo '<span class =" badge badge-success ">On Going</span> ';
                                                        }
                                                        else if ($date > 0 && $date < 259200){
                                                            echo '<span class =" badge badge-warning ">Almost Expired</span> ';
                                                        } 
                                                        else {
                                                            echo '<span class =" badge badge-danger ">Expired</span> ';
                                                        }?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" title="Detail"
                                                                    class="btn btn-info zoomPilih" data-toggle="modal"
                                                                    data-target="#detailModal" name="detil"
                                                                    data-id_lowongan_pekerjaan="<?php echo $row['id_lowongan_pekerjaan']; ?>"
                                                                    data-username="<?php echo $row['PUBLISHER']; ?>"
                                                                    data-alumni="<?php echo $row['username']; ?>"
                                                                    data-namalengkap="<?php echo $row['NAMA']; ?>"
                                                                    data-gambar="<?php if (isset($row['gambar'])) {
                                                                                                                                                                                                                                                    echo $row['gambar'];
                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                    echo "blank.png";
                                                                                                                                                                                                                                                } ?>"
                                                                    data-deskripsi="<?php echo $row['deskripsi']; ?>"
                                                                    data-judul="<?php echo $row['judul']; ?>"
                                                                    data-twitter="<?php echo $row['twitter']; ?>"
                                                                    data-ig="<?php echo $row['ig']; ?>"
                                                                    data-telepon="<?php echo $row['telepon']; ?>"
                                                                    data-wa="<?php echo $row['wa']; ?>"
                                                                    data-detik="<?php $date = strtotime($row['expired']) - time() ; echo  $date; ?>"
                                                                    href="#detailModal"
                                                                    value="<?php echo $row['PUBLISHER']; ?>"><i
                                                                        class="fas fa-info-circle"></i></button>
                                                                <?php if ($this->session->userdata('akses')!='2' || $this->session->userdata('ses_id') == $row['username']):?>
                                                                <button type="button" data-target="#konfirmasiDel" data-toggle="modal"
                                                                    data-id="<?php echo $row['id_lowongan_pekerjaan']; ?>"
                                                                    class="btn btn-danger zoomPilih"
                                                                    value=><i
                                                                        class="fas fa-trash"></i></button>
                                                                        <?php endif; ?>
                                                                <?php if ($this->session->userdata('akses')!='2' || $this->session->userdata('ses_id') == $row['username']){
                                                                                echo '<form
                                                                                            action="'.base_url(); ?><?php echo 'Lowongan/toEditLowongan"
                                                                                            method="POST" enctype="multipart/form-data">
                                                                                            <button name="deleteAlumninis2" value="'.$row['id_lowongan_pekerjaan'].'"
                                                                                                class="btn btn-secondary zoomPilih" ><i
                                                                                                    class="fas fa-edit" ></i></button>
                                                                                        </form>';
                                                                        }?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;
                                            else : ?>
                                                    <tr>
                                                        <td colspan="6">
                                                            <?php echo $this->session->flashdata('#error-Lowongan');?>
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
<?php                            
                                    echo $this->ajax_pagination->create_links(!empty($filterAngkatan) ? $filterAngkatan : 0, !empty($filterKota) ? $filterKota : 1, !empty($filterStatus) ? $filterStatus : 2);
                                    ?>