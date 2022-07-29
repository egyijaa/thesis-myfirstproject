<div class="row mb-2">
                                                <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                                <?php if ($row['active'] == 1) : ?>
                                                <div class="col-md-4 dikit">
                                                    <div class="card testDulu flex-md-row mb-4 box-shadow h-md-250 belakang">
                                                        <div class="card-body d-flex flex-column align-items-start">
                                                            <strong
                                                                class="d-inline-block mb-2 text-success"><?php $date = strtotime($row['expired']) - time();?>
                                                                <?php if ( $date > 259200 ){
                                                                echo '<span class =" badge badge-success waktu">On Going<span> ';
                                                            }
                                                            else if ($date > 0 && $date < 259200){
                                                                echo '<span class =" badge badge-warning waktu2">Almost Expired<span> ';
                                                            } 
                                                            else {
                                                                echo '<span class =" badge badge-danger ">Expired<span> ';
                                                            }?></strong>
                                                            <h3 class="mb-0 judulnya">
                                                                <?php echo $row['judul']; ?>
                                                            </h3>
                                                            <div class="mb-1 text-muted judulnya"><div class="mb-1 text-muted judulnya text-sm">Posted on: <?php echo  date("d-M-Y",strtotime($row['published']));?></div></div>
                                                            <p class="card-text mb-auto mb-1"><small class="text-muted">
                                                                    By. <?php echo $row['NAMA']; ?><?php if (empty($row['username'])){
                                                                echo ' (Admin)';
                                                            } ?>
                                                                </small>
                                                                <br>
                                                                <small class="text-muted"> Minimal Pendidikan :
                                                                    <?php echo $row['ang']; ?>
                                                                </small>
                                                            </p>
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
                                                                        class="fas fa-info-circle"></i> Read
                                                                    More</button>
                                                                <?php if (($this->session->userdata('akses')!='2' && $this->session->userdata('akses')!='3') || $this->session->userdata('ses_id') == $row['username']):?>
                                                                <button type="button" data-target="#konfirmasiDel"
                                                                    data-toggle="modal"
                                                                    data-id="<?php echo $row['id_lowongan_pekerjaan']; ?>"
                                                                    class="btn btn-danger zoomPilih" value=><i
                                                                        class="fas fa-trash"></i></button>
                                                                <?php endif; ?>
                                                                <?php if (($this->session->userdata('akses')!='2' && $this->session->userdata('akses')!='3') || $this->session->userdata('ses_id') == $row['username']){
                                                                                    echo '<form
                                                                                                action="'.base_url(); ?><?php echo 'Lowongan/toEditLowongan"
                                                                                                method="POST" enctype="multipart/form-data">
                                                                                                <button name="deleteAlumninis2" value="'.$row['id_lowongan_pekerjaan'].'"
                                                                                                    class="btn btn-secondary zoomPilih" ><i
                                                                                                        class="fas fa-edit" ></i></button>
                                                                                            </form>';
                                                                            }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                                <?php endforeach;
                                            else : ?>
                                                <div class=" col-md-12 mb-3">
                                                    <?php echo $this->session->flashdata('#error-Lowongan');?>
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
<?php                            
                                    echo $this->ajax_pagination->create_links(!empty($filterAngkatan) ? $filterAngkatan : 0, !empty($filterKota) ? $filterKota : 1, !empty($filterStatus) ? $filterStatus : 2);
                                    ?>