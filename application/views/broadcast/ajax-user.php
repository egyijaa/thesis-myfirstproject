<div class="row" id="dataBroadcast" >
                                                <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                                <div class="col-md-4 mb-3 dikit">
                                                    <div class="card testDulu">
                                                        <div class="position-absolute px-3 py-2 text-white"
                                                            style="background-color: rgba(0, 0, 0, 0.5)">
                                                            <?php if(!empty($row['expired'])) :?>
                                                            <?php $date = strtotime($row['expired']) - time();?>
                                                            <?php if ( $date > 0 ){
                                                                    echo '<span class =" badge badge-success waktu">UPCOMING!<span> ';
                                                                }
                                                                else if ($date < 0 && $date > -54000){
                                                                    echo '<span class =" badge badge-warning waktu2">SEDANG BERLANGSUNG!<span> ';
                                                                } 
                                                                else {
                                                                    echo '<span class =" badge badge-danger ">EXPIRED<span> ';
                                                                }?>
                                                            <?php else :?>
                                                                <span class =" badge badge-success">INFORMASI<span>
                                                            <?php endif;;?>    
                                                            </div>
                                                        <img src="<?php echo base_url('assets/image/broadcast/'.$row['gambar']) ?>?t=<?php echo time();?>"
                                                            class="card-img-top gambarNi" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?php echo $row['judul']; ?></h5>
                                                            <p class="card-text">
                                                                <small class="text-muted">
                                                                    By. <?php echo $row['nama'].' (Admin)'; ?>
                                                                </small>
                                                                <br>
                                                                <?php if($row['expired'] != null) : ?>
                                                                    <small class="text-muted">
                                                                    Berlangsung Pada : <?php echo $row['expired']; ?>
                                                                    </small>
                                                                <?php endif; ?>
                                                                <br>
                                                                <!-- <small class="text-muted"> Minimal Pendidikan :
                                                                    <?php $date = date("d-m-Y H:i:s", strtotime($row['published'])); echo $date;?>
                                                                </small> -->
                                                            </p>
                                                        </div>
                                                        <div class="card-footer">
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
                                                                class="btn btn-info zoomPilih launch-modal checkL" href="#detailModal"
                                                                value="<?php echo $row['nip']; ?>"><i class="fas fa-info-circle"></i> Read more...</button>
                                                                <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                                                                <button data-target="#konfirmasiDel" name="detil"
                                                                data-id="<?php echo $row['id_broadcast']; ?>"
                                                                data-toggle="modal" class="btn btn-danger zoomPilih checkL"
                                                                href="#detailModal"
                                                                value="<?php echo $row['id_broadcast']; ?>"><i class="fas fa-trash"></i></button>
                                                                <?php endif;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach;
                                                else : ?>
                                                <div class=" col-md-12 mb-3">
                                                    <?php echo $this->session->flashdata('#error-broadcast');?>
                                                </div>
                                                <?php endif; ?>
                                                <div class=" col-md-12 mb-3">
                                                    <?php if($this->session->userdata('akses')=='0' || $this->session->userdata('akses')=='1'):?>
                                                    <?php if (!empty($posts)) :?>
                                                    <button data-target="#konfirmasiDel2" name="detil2"
                                                        data-toggle="modal"
                                                        class="btn btn-danger col-md-12 zoomPilih effect01 hitam"
                                                        href="#detailModal"><i class="fa fa-database"
                                                            aria-hidden="true"></i> <i
                                                            class="fas fa-trash"></i></button>
                                                    <?php endif;?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
<?php echo $this->ajax_pagination->create_links(!empty($filterAngkatan) ? $filterAngkatan : 0, !empty($filterKota) ? $filterKota : 1, !empty($filterStatus) ? $filterStatus : 2); ?>