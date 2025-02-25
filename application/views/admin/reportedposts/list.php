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
                            <table id="table" class="table table-hover table-center mb-0 example_datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Post Title</th>
                                        <th>Report By User</th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($reportPostList)) {
                                        $i = 1;
                                        foreach ($reportPostList as $value) {
                                            $postDetails = $this->db->query("SELECT * FROM postjob WHERE id = '" . $value['post_id'] . "'")->row();
                                            if (!empty($postDetails)) {
                                                $postTitle = $postDetails->post_title;
                                            } else {
                                                $postTitle = 'No title found';
                                            }
                                            $fromUserDetails = $this->db->query("SELECT * FROM users WHERE userId = '" . $value['from_user_id'] . "'")->row();
                                            if (!empty($fromUserDetails->companyname)) {
                                                $fromUsername = $fromUserDetails->companyname;
                                            } else {
                                                $fromUsername = $fromUserDetails->firstname . " " . $fromUserDetails->lastname;
                                            }
                                    ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $postTitle; ?></td>
                                        <td><?= $fromUsername; ?></td>
                                        <td><?= $value['reason']; ?></td>
                                    </tr>
                                    <?php }
                                    } else { ?>
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
<script type="text/javascript" src="<?= base_url('dist/assets/custom_js/user.js')?>"></script>