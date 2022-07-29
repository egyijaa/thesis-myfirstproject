<table id="dataAlumni" class="table table-bordered table-striped table-responsive-md">
                                        <thead>
                                            <tr style="color:#28a745">
                                                <th>NIP</th>
                                                <th>Nama Admin</th>
                                                <th>Password</th>
                                                <?php if ($this->session->userdata('akses') == '0') : ?>
                                                    <th>Active</th>
                                                    <th>Musnahkan</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($posts)) : foreach ($posts as $row) : ?>
                                                    <tr>
                                                        <td><?php echo $row['NIP']; ?></td>
                                                        <td><?php echo $row['NAMA']; ?></td>
                                                        <td><?php echo $row['PASS']; ?></td>
                                                        <?php if ($this->session->userdata('akses') == '0') : ?>
                                                            <td>
                                                                <?php
                                                                    if ($row['active'] == '0') {
                                                                        echo '<label class="switch">
                                                                            <input type="checkbox" id="checkActive' . $row['NIP'] . '" onclick="updActive(' . $row['NIP'] . ')">
                                                                            <span class="slider round"></span>
                                                                            </label>';
                                                                    } else {
                                                                        echo '<label class="switch">
                                                                            <input type="checkbox" id="checkActive' . $row['NIP'] . '" onclick="updActive(' . $row['NIP'] . ')" checked>
                                                                            <span class="slider round"></span>
                                                                        </label>';
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <button data-target="#konfirmasiDel" name="detil"
                                                                        data-id="<?php echo $row['NIP']; ?>"
                                                                        data-toggle="modal" class="btn btn-danger col-md-12"
                                                                        href="#detailModal"
                                                                        value="<?php echo $row['NIP']; ?>">Hapus</button>
                                                                </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endforeach;
                                            else : ?>
                                            <?php endif; ?>
                                            
                                        </tbody>
                                    </table>
                                    <?php                            
                                    echo $this->ajax_pagination->create_links(!empty($filterAngkatan) ? $filterAngkatan : 0, !empty($filterKota) ? $filterKota : 1, !empty($filterStatus) ? $filterStatus : 2);
                                    ?>  
    