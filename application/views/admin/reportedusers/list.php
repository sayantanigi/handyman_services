<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title"><?= $heading;?></h3>
                </div>
                <div class="col-auto text-right"></div>
            </div>
        </div>
        <div class="card filter-card">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <table id="table" class="table table-hover table-center mb-0 example_datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Blocked User</th>
                                            <th>Blocked By User</th>
                                            <th>Reason</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(!empty($reportuserList)) {
                                            $i = 1;
                                            foreach ($reportuserList as $value) {
                                                $touserDetails = $this->db->query("SELECT * FROM users WHERE userId = '".$value['to_user_id']."'")->row();
                                                if(!empty($touserDetails->companyname)) {
                                                    $tousername = $touserDetails->companyname;
                                                } else {
                                                    $tousername = $touserDetails->firstname." ".$touserDetails->lastname;
                                                }
                                                $fromUserDetails = $this->db->query("SELECT * FROM users WHERE userId = '".$value['from_user_id']."'")->row();
                                                if(!empty($fromUserDetails->companyname)) {
                                                    $fromUsername = $fromUserDetails->companyname;
                                                } else {
                                                    $fromUsername = $fromUserDetails->firstname." ".$fromUserDetails->lastname;
                                                }
                                        ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $tousername; ?></td>
                                            <td><?= $fromUsername; ?></td>
                                            <td><?= $value['reason']; ?></td>
                                        </tr>
                                        <?php } } else { ?>
                                        <tr>
                                            <td colspan="4">No data found</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url('dist/assets/custom_js/user.js')?>"></script>