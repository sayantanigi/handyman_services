<?php
if (!empty($get_banner->image) && file_exists('uploads/banner/' . $get_banner->image)) {
    $banner_img = base_url("uploads/banner/" . $get_banner->image);
} else {
    $banner_img = base_url("assets/images/resource/mslider1.jpg");
} ?>
<?php
function get_time_ago($time) {
    $time_ago = time() - $time;
    if ($time_ago < 60) {
        return $time_ago . ' second ago';
    }
    $minutes = floor($time_ago / 60);
    if ($minutes < 60) {
        return $minutes . ' minutes ago';
    }
    $hours = floor($time_ago / 3600);
    if ($hours < 24) {
        return $hours . ' hours ago';
    }
    $days = floor($time_ago / 86400);
    if ($days < 7) {
        return $days . ' days ago';
    }
    $weeks = floor($time_ago / 604800);
    if ($weeks < 4) {
        return $weeks . ' weeks ago';
    }
    $months = floor($time_ago / 2628000); // Approximate value
    if ($months < 12) {
        return $months . ' months ago';
    }
    $years = floor($time_ago / 31536000); // Approximate value
    return $years . ' years ago';
}
?>
<style>
    .postdetail {
        padding: 7px 33px;
        border-radius: 10px;
        background: red;
        color: #fff;
        margin: 10px;
        font-size: 20px;
    }

    .cstm_viewbid_btn {
        background: linear-gradient(180deg, rgba(249, 80, 30, 1) 0%, rgba(252, 119, 33, 1) 100%) !important;
        border: 0;
        border-radius: 35px;
        letter-spacing: 0;
        font-weight: 600;
        width: 100%;
        display: block;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    .Comment_Block {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: flex-start;
        margin: 20px 0;
    }

    .Comment_Block .Comment_Img {
        width: 10%;
    }

    .Comment_Block .Comment_Img img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 100%;
    }

    .Comment_Block .Comment_Data {
        width: 90%;
        display: flex;
        flex-direction: column;
    }

    .Comment_Block .Comment_Data p:nth-child(1) {
        margin: 0;
        font-weight: 600;
        color: #000 !important;
        font-size: 16px;
    }

    .Comment_Block .Comment_Data p:nth-child(2) {
        margin: 0;
        color: #000 !important;
        font-size: 14px;
        line-height: normal;
    }

    .Comment_Block .Comment_Data ul {
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 150px;
        margin-top: 10px;
    }

    .hidereplyBox {
        display: none !important;
    }

    .showreplyBox {
        display: flex !important;
    }

    @media screen and (max-width: 425px) {
        .Mobile_Padding {
            padding: 0 !important;
        }

        .Mobile_Ul {
            width: 100% !important;
            justify-content: flex-start !important;
        }

        .Mobile_Like {
            margin-top: 10px !important;
            margin-bottom: 10px !important;
            justify-content: center !important;
        }
        .Comment_Block {
            flex-direction: column !important;
        }
        .Comment_Block .Comment_Data {
            width: 100% !important;
            margin-left: 0 !important;
            padding: 10px !important;
        }
        .hidereplyBox {
            flex-direction: column !important;
        }
        .hidereplyBox textarea {
            width: 100% !important;
        }
        .hidereplyBox a {
            width: 100% !important;
        }
    }
</style>
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url('<?= $banner_img ?>') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3 style="text-transform: uppercase;">
                            <?php if (!empty($post_data->post_title)) {
                                echo $post_data->post_title;
                            } ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="dashboard-gig Bid-page">
    <div class="text-success-msg f-20" style="text-align: center; margin-bottom: 20px;">
        <?php if ($this->session->flashdata('message')) {
            echo $this->session->flashdata('message');
            unset($_SESSION['message']);
        } ?>
    </div>
    <div class="container display-table">
        <div class="row display-table-row">
            <div class="col-md-12 col-sm-12 display-table-cell v-align">
                <div class="user-dashboard">
                    <div class="row row-sm">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="bid-dis">
                                        <ul style="margin-bottom: 0;">
                                            <li>
                                                <span>Job Title </span>
                                                <a href="<?= base_url('workdetail/' . base64_encode($post_data->id)) ?>" style="text-transform: uppercase;"><?php echo $post_data->post_title; ?></a>
                                            </li>
                                            <?php if (!empty($post_data->description)) { ?>
                                                <li class="cstm_desc"><span>Description</span><?php echo $post_data->description; ?></li>
                                            <?php } ?>
                                            <div class="Bid-Data">
                                                <?php if (!empty($post_data->required_key_skills)) { ?>
                                                    <li><span>Required key skills: </span><?php echo ucfirst($post_data->required_key_skills); ?></li>
                                                <?php } ?>
                                                <?php if (empty($post_data->appli_deadeline) || $post_data->$appli_deadeline == '0000-00-00') { ?>
                                                    <li><span>Application Deadline Date: </span><?php echo $post_data->appli_deadeline; ?></li>
                                                <?php } ?>
                                            </div>
                                            <div class="Bid-Data">
                                                <?php if (!empty($post_data->created_date)) { ?>
                                                    <li><span>Created Date </span><?php echo date('d-m-Y h:i a', strtotime($post_data->created_date)); ?></li>
                                                <?php } ?>
                                            </div>
                                            <div class="Bid-Data">
                                                <?php if (!empty($post_data->category_id)) { ?>
                                                    <li><span>Categories </span>
                                                        <?php
                                                        $cname = $this->db->query("SELECT * FROM category WHERE id = '" . $post_data->category_id . "'")->result_array();
                                                        echo $cname[0]['category_name'];
                                                        ?>
                                                    </li>
                                                <?php } ?>
                                                <?php if (!empty($post_data->subcategory_id)) { ?>
                                                    <li><span>Sub Categories </span>
                                                        <?php
                                                        $scname = $this->db->query("SELECT * FROM sub_category WHERE id = '" . $post_data->subcategory_id . "'")->result_array();
                                                        echo $scname[0]['sub_category_name'];
                                                        ?>
                                                    </li>
                                                <?php } ?>
                                            </div>
                                            <div class="Bid-Data">
                                                <?php if (!empty($post_data->charges)) { ?>
                                                    <!-- <li><span>Charges </span><?php echo $post_data->charges . " " . $post_data->currency ?></li> -->
                                                    <li><span>Charges </span><?php echo $post_data->charges; ?></li>
                                                <?php } ?>
                                                <?php if (!empty($post_data->duration)) { ?>
                                                    <li><span>Duration </span><?php echo $post_data->duration; ?></li>
                                                <?php } ?>
                                            </div>
                                            <?php if (!empty($post_data->country)) { ?>
                                                <li style="box-shadow: 0 0 10px #dddddd; border-radius: 10px; padding: 10px 15px; background: linear-gradient(180deg, rgba(252, 119, 33, 1) 0%, rgba(249, 80, 30, 1) 100%); color: #fff !important; margin-bottom: 0 !important; display: flex; flex-direction: row; align-items: center; justify-content: flex-start;">
                                                    <i style="font-size: 25px;" class="fa fa-map-marker" aria-hidden="true"></i>
                                                    <div style="padding-left: 15px;">
                                                        <span style="color: #fff !important; font-size: 15px;">Complete Address </span>
                                                        <span style="color: #fff !important; font-weight: 400;"><?php echo $post_data->city . ', ' . $post_data->state . ', ' . $post_data->country; ?></span>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div style="margin-top: 30px;">
                                        <div class="bid-dis">
                                            <input type="hidden" name="postjobID" id="postjobID" value="<?= $post_data->id ?>">
                                            <input type="hidden" name="userID" id="userID" value="<?= @$_SESSION['afrebay']['userId'] ?>">
                                            <div class="row">
                                                <div class="col-lg-10 col-md-10 col-sm-12">
                                                    <div class="error text-left" id="err_comment"></div>
                                                    <div class="success_msg" style="color: #db3636;"></div>
                                                    <textarea style="background: transparent !important; font-size: 14px; margin-bottom: 20px !important; padding: 10px 10px !important; border-bottom: 2px solid #b1b1b1; border-radius: 10px !important; box-shadow: 0 0 10px #e1e1e1; min-height: 100px !important; margin-top: 10px;" type="text" class="form-control f1" placeholder="Enter your comments" required="" name="comment" id="comment"></textarea>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-12">
                                                    <?php if (!empty(@$_SESSION['afrebay']['userType'])) { ?>
                                                        <a href="javascript:void(0)" style="margin-top: 10px; background: linear-gradient(180deg, rgba(249, 80, 30, 1) 0%, rgba(252, 119, 33, 1) 100%); border: 0; border-radius: 100px; width: 100%; height: 45px; cursor: pointer; display:flex; align-items: center; justify-content: center;" onclick="postComment()">
                                                            <span style="font-size: 15px; font-weight: 600; letter-spacing: 0; color: #fff;">Comment</span>
                                                        </a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url() ?>login" style="margin-top: 10px; background: linear-gradient(180deg, rgba(249, 80, 30, 1) 0%, rgba(252, 119, 33, 1) 100%); border: 0; border-radius: 100px; width: 100%; height: 45px; cursor: pointer; display:flex; align-items: center; justify-content: center; ">
                                                            <span style="font-size: 15px; font-weight: 600; letter-spacing: 0; color: #fff;">Comment</span>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 Mobile_Like" style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start;">
                                                    <div style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start;">
                                                        <span><i style="color: #fb6920; font-size: 18px;" class="fa fa-heart" aria-hidden="true"></i></span>
                                                        <?php $getLikeCount = $this->db->query("SELECT COUNT(id) as count FROM postjob_like WHERE postjob_id = '" . $post_data->id . "' AND is_liked = 1")->row(); ?>
                                                        <p style="margin: 0; margin-left: 10px; font-size: 16px; font-weight: 500; color: #fb6920;"><?= $getLikeCount->count ?> Like</p>
                                                    </div>
                                                    <div style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start; margin-left: 20px;">
                                                        <span><i style="color: #fb6920; font-size: 20px;" class="fa fa-comment" aria-hidden="true"></i></span>
                                                        <?php $getCommentCount = $this->db->query("SELECT COUNT(id) as count FROM postjob_comment WHERE postjob_id = '" . $post_data->id . "'")->row(); ?>
                                                        <p style="margin: 0; margin-left: 10px; font-size: 16px; font-weight: 500; color: #fb6920;"><?= $getCommentCount->count; ?> Comments</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <ul class="Mobile_Ul" style="margin: 0; display: flex; align-items: center; justify-content: flex-end; flex-direction: row; width: 250px; float: right;">
                                                        <li style="margin: 0 20px 0 0 !important; font-weight: 600; font-size: 15px; color: #000 !important;">
                                                            <?php if (!empty(@$_SESSION['afrebay']['userType'])) {
                                                                $chechis_like = $this->db->query("SELECT * FROM postjob_like WHERE postjob_id = '" . $post_data->id . "' AND user_id = '" . @$_SESSION['afrebay']['userId'] . "' AND is_liked = 1")->num_rows();
                                                                if ($chechis_like > 0) { ?>
                                                                    <a style="color: #000 !important;" href="javascript:void(0)" onclick="dislikepostjob()"><i style="color: #000;" class="fa fa-heart" aria-hidden="true"></i> Like</a>
                                                                <?php } else { ?>
                                                                    <a style="color: #000 !important;" href="javascript:void(0)" onclick="likepostjob()"><i style="color: #000;" class="fa fa-heart-o" aria-hidden="true"></i> Like</a>
                                                                <?php } ?>
                                                            <?php } else { ?>
                                                                <a style="color: #000 !important;" href="<?= base_url() ?>login">
                                                                    <i style="color: #000;" class="fa fa-heart-o" aria-hidden="true"></i> Like
                                                                </a>
                                                            <?php } ?>
                                                        </li>
                                                        <li style="margin: 0 !important; font-weight: 600; font-size: 15px; color: #000 !important;">
                                                            <a style="color: #000 !important;" href=""> <i style="color: #000;" class="fa fa-share" aria-hidden="true"></i> Share</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-12">
                                                    <?php
                                                    $getpostComment = $this->db->query("SELECT * FROM postjob_comment WHERE postjob_id = '" . @$post_data->id . "'")->result_array();
                                                    if (!empty($getpostComment)) {
                                                        $i = 1;
                                                        foreach ($getpostComment as $each) {
                                                            $rplycount = $this->db->query("SELECT COUNT(id) as count FROM postjob_comment_like  WHERE postjob_id = '" . @$post_data->id . "' AND comment_id = '" . $each['id'] . "' AND is_liked = 1")->row();
                                                    ?>
                                                            <div class="Comment_Block" style="background: #ffede3; padding: 15px;border-radius: 15px;">
                                                                <div class="Comment_Img">
                                                                    <?php
                                                                    $userData = $this->db->query("SELECT * FROM users WHERE userId = '" . $each['user_id'] . "'")->row();
                                                                    if (!empty($userData->profilePic) && file_exists('uploads/users/' . $userData->profilePic)) { ?>
                                                                        <img src="<?= base_url() ?>uploads/users/<?= $userData->profilePic ?>" alt="User Profile">
                                                                    <?php } else { ?>
                                                                        <img src="<?= base_url() ?>uploads/no_pimage.png" alt="User Profile">
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="Comment_Data">
                                                                    <p>
                                                                        <?php
                                                                        if (!empty($userData->companyname)) {
                                                                            echo $userData->companyname;
                                                                        } else {
                                                                            echo $userData->firstname . " " . $userData->lastname;
                                                                        }
                                                                        ?> .
                                                                        <span style="font-size: 13px; color: #6a6a6a; font-weight: 400;"><?php echo get_time_ago(strtotime($each['created_at'])) ?></span> .
                                                                        <span style="color: #fb6920; font-size: 13px;"><i class="fa fa-heart" aria-hidden="true"></i> <?= $rplycount->count; ?> Like</span>
                                                                    </p>
                                                                    <p><?= $each['comment']; ?></p>
                                                                    <ul>
                                                                        <li style="margin: 0 25px 0 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                            <?php if (!empty(@$_SESSION['afrebay']['userType'])) {
                                                                                $checkrplycount = $this->db->query("SELECT * FROM postjob_comment_like WHERE user_id = '" . @$_SESSION['afrebay']['userId'] . "' AND postjob_id = '" . @$post_data->id . "' AND comment_id = '" . $each['id'] . "' AND is_liked = 1")->row();
                                                                                if ($checkrplycount > 0) { ?>
                                                                                    <a style="color: #000 !important;" href="javascript:void(0)" onclick="dislikeuserrply(<?= $each['id'] ?>)">Liked</a>
                                                                                <?php } else { ?>
                                                                                    <a style="color: #000 !important;" href="javascript:void(0)" onclick="likeuserrply(<?= $each['id'] ?>)">Like</a>
                                                                                <?php }
                                                                            } else { ?>
                                                                                <a style="color: #000 !important;" href="<?= base_url() ?>login">Like</a>
                                                                            <?php } ?>
                                                                        </li>
                                                                        <?php if (!empty(@$_SESSION['afrebay']['userType'])) { ?>
                                                                            <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                                <a style="color: #000 !important;" href="javascript:void(0)" onclick="replylink(<?= $i; ?>)">Reply</a>
                                                                            </li>
                                                                        <?php } else { ?>
                                                                            <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                                <a style="color: #000 !important;" href="<?= base_url() ?>login">Reply</a>
                                                                            </li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                    <?php
                                                                    $commentRply = $this->db->query("SELECT * FROM postjob_comment_rply WHERE comment_id = '" . $each['id'] . "'")->result_array();
                                                                    if (!empty($commentRply)) {
                                                                        foreach ($commentRply as $rply) {
                                                                            $userDataRply = $this->db->query("SELECT * FROM users WHERE userId = '" . $rply['user_id'] . "'")->row(); ?>
                                                                            <div class="Comment_Data" style="margin-left: 30px;background: #ededed;padding: 0px 0px 15px 15px;margin-top: 10px;border-radius: 15px;">
                                                                                <p>
                                                                                    <?php
                                                                                    if (!empty($userDataRply->companyname)) {
                                                                                        echo $userDataRply->companyname;
                                                                                    } else {
                                                                                        echo $userDataRply->firstname . " " . $userDataRply->lastname;
                                                                                    }
                                                                                    ?> .
                                                                                    <span style="font-size: 13px; color: #6a6a6a; font-weight: 400;"><?php echo get_time_ago(strtotime($rply['created_at'])) ?></span>
                                                                                </p>
                                                                                <p><?= $rply['comment']; ?></p>
                                                                            </div>
                                                                    <?php }
                                                                    } ?>
                                                                    <div style="display: flex; flex-direction: row; align-items: flex-start; justify-content: space-between; margin-top: 10px;" class="hidereplyBox" id="replyBox_<?= $i; ?>">
                                                                        <textarea style="background: white !important; font-size: 14px; margin-bottom: 0 !important; float: unset !important; padding: 10px 10px !important; border-bottom: 2px solid #b1b1b1; border-radius: 10px !important; min-height: 50px !important; width: 80%;" required="" name="users_rply_<?= $i; ?>" id="users_rply_<?= $i; ?>" placeholder="Reply"></textarea>
                                                                        <a href="javascript:void(0)" onclick="postUserComment(<?= $each['id']; ?>, <?= $i; ?>)" style="margin-top: 10px; background: linear-gradient(180deg, rgba(249, 80, 30, 1) 0%, rgba(252, 119, 33, 1) 100%); border: 0; border-radius: 100px; width: 15%; height: 40px; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                                                                            <span style="font-size: 12px; font-weight: 600; letter-spacing: 0; color: #fff;">Reply</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php $i++;
                                                        }
                                                    } else { ?>
                                                        <div class="Comment_Block" style="display: block; text-align: center;">
                                                            <img src="<?= base_url('uploads/nocomment.png') ?>" alt="No Comment">
                                                            <p style="width: 100%;margin: 0px;color: #dddddd;">No Comments Yet</p>
                                                            <p style="width: 100%;margin: 0px;color: #dddddd;">Be the first to comment</p>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="employe-about d-none">
                                    <ul>
                                        <li>
                                            <span class="rat-b">0.0</span>
                                            <span class="fa fa-star checked1"></span>
                                            <span class="fa fa-star checked1"></span>
                                            <span class="fa fa-star checked1"></span>
                                            <span class="fa fa-star checked1"></span>
                                            <span class="fa fa-star checked1"></span>
                                            <span>( 0 reviews )</span>
                                        </li>
                                        <li>
                                            <div class="hope-aus">
                                                <span><?php if (!empty($post_data->user_address)) {
                                                            echo $post_data->user_address;
                                                        } ?></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="hope-aus1">
                                                <ul>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-envelope"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i class="fa fa-phone"></i></a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="col-12 JobImage Mobile_Padding">
                                <div class="owl-carousel overflow-hidden">
                                    <?php
                                    $getImage = $this->db->query("SELECT * FROM postjob_image WHERE job_id = '" . $post_data->id . "'")->result_array();
                                    if (!empty($getImage)) {
                                        foreach ($getImage as $img) { ?>
                                            <div class="owl-block position-relative overflow-hidden vh-100">
                                                <img class="owl-img w-100 h-100 position-absolute object-fit-cover" src="<?php echo base_url() ?>uploads/postjob/<?php echo $img['job_image'] ?>" loading="lazy" alt="banner_img" />
                                            </div>
                                        <?php }
                                    } else { ?>
                                        <div class="owl-block position-relative overflow-hidden vh-100">
                                            <img class="owl-img w-100 h-100 position-absolute object-fit-cover" src="https://techg.igiapp.com/handymanservices/uploads/postjob/8204_how-to-start-a-handyman-business-in-the-uk.jpg" loading="lazy" alt="banner_img" />
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-12 Mobile_Padding" style="margin-top: 30px;">
                                <div class="bid-dis" style="background: linear-gradient(180deg, rgba(252, 119, 33, 1) 0%, rgba(249, 80, 30, 1) 100%);">
                                    <a style="display: flex; flex-direction: row; align-items: center; justify-content: space-evenly;" href="<?= base_url('customer_detail/' . base64_encode($post_data->user_id)) ?>">
                                        <?php
                                        $userData = $this->db->query("SELECT * FROM users WHERE userId = '" . $post_data->user_id . "'")->row();
                                        if (!empty($userData->profilePic) && file_exists('uploads/users/' . $userData->profilePic)) { ?>
                                            <img style="width: 70px; height: 70px; object-fit: cover; border-radius: 100%;" src="<?= base_url('uploads/users/' . $userData->profilePic) ?>" alt="profile_picture">
                                        <?php } else { ?>
                                            <img style="width: 70px; height: 70px; object-fit: cover; border-radius: 100%;" src="<?= base_url('uploads/no_pimage.png') ?>" alt="profile_picture">
                                        <?php } ?>
                                        <div style="display: flex; flex-direction: column; align-items: flex-start; justify-content: flex-start;">
                                            <h3 style="margin-bottom: 5px; font-size: 18px; color: #fff !important; letter-spacing: 0 !important; font-weight: 600;">
                                                <?php if (!empty($userData->companyname)) {
                                                    echo $userData->companyname;
                                                } else {
                                                    echo $userData->firstname . ' ' . $userData->lastname;
                                                } ?>
                                            </h3>
                                            <span style="font-weight: 500; color: #fff !important; font-size: 13px;"><i class="la la-map-marker"></i> <?= $userData->address ?></span>
                                            <span style="font-weight: 500; color: #fff !important; font-size: 13px;"><i class="la la-eye"></i> Views <?= $userData->view_count ?> </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php if (@$_SESSION['afrebay']['userType'] == 1 || empty(@$_SESSION['afrebay']['userType'])) { ?>
                                <div class="col-12 Mobile_Padding" style="margin-top: 30px; position: sticky; top: 160px; height: fit-content;">
                                    <?php $userBidData = $this->db->query("SELECT * FROM `job_bid` WHERE postjob_id = '" . $post_data->id . "' and user_id = '" . @$_SESSION['afrebay']['userId'] . "'")->result_array();
                                    if (!empty($userBidData)) { ?>
                                        <div class="bd-form"><a href="<?= base_url() ?>jobbid" class="cstm_viewbid_btn"> View Bid</a></div>
                                    <?php } else { ?>
                                        <form class="bd-form" action="<?= base_url('user/dashboard/save_postbid') ?>" method="post">
                                            <h3 class="job-bid">Job Bidding</h3>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="" class="form-label">Bid Amount</label>
                                                    <div style="width: 50px;">
                                                        <?php if ($countryName == 'Nigeria') { ?>
                                                            <input type="text" class="form-control f1" name="currency" id="currency" value="NGN (₦)" readonly>
                                                        <?php } else { ?>
                                                            <input type="text" class="form-control f1" name="currency" id="currency" value="USD ($)" readonly>
                                                        <?php } ?>
                                                    </div>
                                                    <div style="display: inline-block;width: 80%; margin-left: 10px;">
                                                        <input type="text" class="form-control f1" placeholder="Your bid Amount" name="bid_amount" id="bid_amount" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="" class="form-label">Duration</label>
                                                    <input type="text" class="form-control f1" placeholder="Duration" name="duration" required>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="" class="form-label">Details</label>
                                                    <textarea class="form-control" name="description" placeholder="Description"></textarea>
                                                </div>
                                                <input type="hidden" name="postjob_id" value="<?php if (!empty($post_data->id)) {
                                                                                                    echo $post_data->id;
                                                                                                } ?>">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="bid-btn">
                                                        <?php if (!empty(@$_SESSION['afrebay']['userType'])) {
                                                            if (@$_SESSION['afrebay']['userType'] == '1') { ?>
                                                                <input type="submit" name="">
                                                            <?php } else { ?>
                                                                <h2 class="job-bid" style="font-size:16px;">Customer are not eligible to Bid for jobs</h2>
                                                            <?php }
                                                        } else { ?>
                                                            <a href="<?= base_url('login') ?>" class="btn btn-info postdetail">Submit Query</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                        <?php }
                                } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<script>
    $(document).ready(function() {
        $("#bid_amount").on("keypress keyup blur", function(event) {
            var patt = new RegExp(/(?<=\.\d\d).+/i);
            $(this).val($(this).val().replace(patt, ''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 2000,
            autoplayHoverPause: false
        });
        $(".owl-carousel").mousedown(() => {
            gsap.fromTo(
                cursorVerticalGrab, {
                    css: {
                        transform: "scale(0, 0)"
                    }
                }, {
                    duration: 0.6,
                    ease: "back.out(1.7)",
                    css: {
                        transform: "scale(1, 1)"
                    }
                }
            );
        });
    })
</script>
<script>
    // for posting Comment
    function postComment() {
        if ($('#comment').val() == "") {
            $('#err_comment').fadeIn().html('Please enter your comment first').css('color', 'red');
            setTimeout(function() {
                $("#err_comment").html("");
            }, 3000);
            $("#comment").css('border-color', 'red');
            setTimeout(function() {
                $("#comment").css('border-color', '#80bdff');
            }, 3000);
            return false;
        } else {
            var user_id = $('#userID').val();
            var postjob_id = $('#postjobID').val();
            var comment_id = $('#comment_id').val();
            var comment = $('#comment').val();
            $.ajax({
                url: "<?= base_url() ?>user/dashboard/postComment",
                type: "POST",
                data: {
                    user_id: user_id,
                    postjob_id: postjob_id,
                    comment_id: comment_id,
                    comment: comment
                },
                success: function(data) {
                    //console.log(data);
                    $('.success_msg').text(data);
                    $('#comment').val('');
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                }
            })
        }
    }
    //show/hide reply box
    function replylink(commentid) {
        $('#replyBox_' + commentid).toggleClass('showreplyBox');
        //$('#replyBox_' + commentid).removeClass('hidereplyBox');
    }
    //for user comment's reply
    function postUserComment(commentid, id) {
        if ($('#users_rply_' + id).val() == "") {
            $("#users_rply_" + id).css('border-color', 'red');
            $('#users_rply_' + id).attr("placeholder", "Please type your reply here");
            setTimeout(function() {
                $("#users_rply_" + id).css('border-color', '#80bdff');
            }, 3000);
            return false;
        } else {
            var user_id = $('#userID').val();
            var postjob_id = $('#postjobID').val();
            var comment_id = commentid;
            var comment = $('#users_rply_' + id).val();
            $.ajax({
                url: "<?= base_url() ?>user/dashboard/postUserReply",
                type: "POST",
                data: {
                    user_id: user_id,
                    postjob_id: postjob_id,
                    comment_id: comment_id,
                    comment: comment
                },
                success: function(data) {
                    //console.log(data);
                    $('.success_msg').text(data);
                    $('#comment').val('');
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                }
            })
        }
    }
    // for liking Comment
    function likepostjob() {
        var user_id = $('#userID').val();
        var postjob_id = $('#postjobID').val();
        $('.fa-heart-o').css('color', '#000 !important');
        $.ajax({
            url: "<?= base_url() ?>user/dashboard/likepostjob",
            type: "POST",
            data: {
                user_id: user_id,
                postjob_id: postjob_id
            },
            success: function(data) {
                location.reload();
            }
        })
    }
    // for liking user each Comment
    function likeuserrply(id) {
        var user_id = $('#userID').val();
        var postjob_id = $('#postjobID').val();
        var comment_id = id;
        //$('.fa-heart-o').css('color','#000 !important');
        $.ajax({
            url: "<?= base_url() ?>user/dashboard/likeuserrply",
            type: "POST",
            data: {
                user_id: user_id,
                postjob_id: postjob_id,
                comment_id: comment_id
            },
            success: function(data) {
                location.reload();
            }
        })
    }
    // for disliking Comment
    function dislikepostjob() {
        var user_id = $('#userID').val();
        var postjob_id = $('#postjobID').val();
        $('.fa-heart').addClass('fa-heart-o');
        $.ajax({
            url: "<?= base_url() ?>user/dashboard/dislikepostjob",
            type: "POST",
            data: {
                user_id: user_id,
                postjob_id: postjob_id
            },
            success: function(data) {
                console.log(data);
                location.reload();
            }
        })
    }
    // for disliking Comment
    function dislikeuserrply(id) {
        var user_id = $('#userID').val();
        var postjob_id = $('#postjobID').val();
        var comment_id = id;
        //$('.fa-heart').addClass('fa-heart-o');
        $.ajax({
            url: "<?= base_url() ?>user/dashboard/dislikeuserrply",
            type: "POST",
            data: {
                user_id: user_id,
                postjob_id: postjob_id,
                comment_id: comment_id
            },
            success: function(data) {
                console.log(data);
                location.reload();
            }
        })
    }
</script>