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
<!-- <section style="position: fixed; width: 100%; z-index: 1000;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php $adlist = $this->db->query("SELECT * FROM adsense ORDER BY id DESC limit 1")->row();
                if (!empty($adlist->image) && file_exists('uploads/adsense/' . $adlist->image)) { ?>
                <a href="<?= $adlist->link?>" target="_blank" style="height: 170px; object-fit: cover; position: absolute; top: calc(100vh - 170px); right: 0; padding: 15px; display: flex; align-items: flex-start; justify-content: flex-end; width: 25%;">
                    <img style="height: 100%; width: 100%; object-fit: cover;" src="<?= base_url()?>uploads/adsense/<?= $adlist->image?>" alt="">
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</section> -->
<section class="topak">
    <div class="block no-padding">
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-featured-sec">
                        <ul class="main-slider-sec text-arrows">
                            <li class="slideHome">
                                <?php if (!empty($get_banner->image) && file_exists('uploads/banner/' . $get_banner->image)) { ?>
                                    <img src="<?= base_url('uploads/banner/' . $get_banner->image); ?>" alt="" />
                                <?php } else { ?>
                                    <img src="<?= base_url(); ?>assets/images/resource/mslider1.jpg" alt="" />
                                <?php } ?>
                            </li>
                        </ul>
                        <div class="job-search-sec">
                            <div class="job-search">
                                <h3>Easiest way to book the nearest handyman</h3>
                                <span>Search for all types of handymen</span>
                                <form method="post" action="<?= base_url('search-work') ?>">
                                    
                                    <div class="row" style="align-items: center !important; flex-direction: column;">
                                        
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="#" class="iconLocation" data-toggle="modal" data-target="#staticBackdrop"><i class="las la-map-marker"></i></a>
                                                        </div>
                                                        <div class="flex-fill w-100">
                                                            <div class="job-field frmSearch">
                                                                <input type="text" name="category_id" id="search-box" placeholder="Search By Category" value="" />
                                                                <i class="la la-search"></i>
                                                            </div>
                                                            <div id="suggesstion-box"></div>
                                                        </div>
                                                    </div>
                                                        
                                                </div>
                                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 search-btn">
                                                    <button type="submit"><i class="la la-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="scroll-to">
                            <a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 990px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Current Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="pf-map" id="map"></div>
            </div>
        </div>
    </div>
</div>
<section>
    <div class="block Opp_Block">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="TopBar" style="display: flex; flex-direction: row; height: 70px; width: 100%; align-items: center; justify-content: space-between; padding: 0;">
                        <ul style="margin: 0; display: flex; flex-direction: row; width: 90%; height: 60px; align-items: center;">
                            <li style="margin: 0; height: 40px; padding: 0 15px; display: flex; align-items: center; justify-content: center; background: #ffede3; border-radius: 100px; font-size: 15px; font-weight: 500; color: #fc7021;">For you</li>
                            <li style="height: 40px; padding: 0 15px; display: flex; align-items: center; justify-content: center; background: #ffede3; border-radius: 100px; font-size: 15px; font-weight: 500; color: #fc7021; margin: 0 15px;">Latest</li>
                            <li style="margin: 0; height: 40px; padding: 0 15px; display: flex; align-items: center; justify-content: center; background: #ffede3; border-radius: 100px; font-size: 15px; font-weight: 500; color: #fc7021;">Nearby</li>
                        </ul>
                        <?php if (!empty(@$_SESSION['afrebay']['userId'])) {
                        if (@$_SESSION['afrebay']['userType'] == '2') { ?>
                            <a href="<?= base_url() ?>postwork" class="PostBtn" style="width: 10%; display: flex; align-items: center; justify-content: center; height: 60px;">
                                <span style="width: 100%; height: 40px; background: linear-gradient(180deg, rgba(252, 119, 33, 1) 0%, rgba(249, 80, 30, 1) 100%) !important; border-radius: 100px; display: flex; flex-direction: row; align-items: center; justify-content: center; color: #fff;">
                                    <i class="fa fa-plus" aria-hidden="true" style="margin-right: 10px;"></i> Post
                                </span>
                            </a>
                        <?php }
                        } else { ?>
                        <a href="<?= base_url() ?>login" class="PostBtn" style="width: 10%; display: flex; align-items: center; justify-content: center; height: 60px;">
                            <span style="width: 100%; height: 40px; background: linear-gradient(180deg, rgba(252, 119, 33, 1) 0%, rgba(249, 80, 30, 1) 100%) !important; border-radius: 100px; display: flex; flex-direction: row; align-items: center; justify-content: center; color: #fff;">
                                <i class="fa fa-plus" aria-hidden="true" style="margin-right: 10px;"></i> Post
                            </span>
                        </a>
                        <?php } ?>
                    </div>

                    <div class="PostContainer boxPost">
                        <!-- Single Post -->
                        <?php
                        if (!empty($get_post)) {
                            foreach ($get_post as $row) {
                                /*if (strlen($row->description) > 200) {
                            $desc = substr($row->description, 0, 200) . '...';
                        } else {
                            $desc = $row->description;
                        }*/
                                $get_user = $this->db->query("SELECT * FROM users WHERE userId = '$row->user_id'")->row(); ?>
                                <div class="DataContainer" style="margin-bottom: 30px; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #dddddd;">
                                    <div class="InfoBlock" style="display: flex; flex-direction: row; height: 80px; align-items: center; justify-content: flex-start;">
                                        <?php if (!empty($get_user->profilePic) && file_exists('uploads/users/' . $get_user->profilePic)) { ?>
                                            <img style="width: 80px; height: 80px; border-radius: 100%; object-fit: cover;" src="<?= base_url() ?>uploads/users/<?= $get_user->profilePic ?>" alt="">
                                        <?php } else { ?>
                                            <img style="width: 80px; height: 80px; border-radius: 100%; object-fit: cover;" src="<?= base_url() ?>uploads/no_pimage.png" alt="">
                                        <?php } ?>
                                        <div class="TextData" style="display: flex; flex-direction: column; align-items: flex-start; justify-content: center; padding-left: 15px;">
                                            <h3 style="font-size: 20px; font-weight: 600; margin: 0; color: #000;">
                                                <?php
                                                if (!empty($get_user->companyname)) {
                                                    echo $get_user->companyname;
                                                } else {
                                                    echo $get_user->firstname . " " . $get_user->lastname;
                                                }
                                                ?>
                                            </h3>
                                            <p style="margin: 0; font-size: 13px; color: #6a6a6a;">Posted - <?php echo get_time_ago(strtotime($row->created_date)) ?></p>
                                        </div>
                                    </div>
                                    <p class="CommentData" style="margin-top: 15px;margin-bottom: 15px;font-size: 17px;color: #000;line-height: 25px;"><?= ucfirst(strip_tags($row->post_title)) ?></p>
                                    <p class="CommentData" style="margin-top: 15px;margin-bottom: 15px;font-size: 14px;color: #000;line-height: 18px;"><?= ucfirst(strip_tags($row->description)) ?></p>
                                    <input type="hidden" name="postjobID" id="postjobID" value="<?= $row->id ?>">
                                    <input type="hidden" name="userID" id="userID" value="<?= @$_SESSION['afrebay']['userId'] ?>">

                                    <div class="Rply_Comment_Block" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
                                        <div class="Active_Icon_Block" style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start; width: 50%; ">
                                            <div class="Icon_1" style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start;">
                                                <span><i style="color: #fb6920; font-size: 18px;" class="fa fa-heart" aria-hidden="true"></i></span>
                                                <?php $getLikeCount = $this->db->query("SELECT COUNT(id) as count FROM postjob_like WHERE postjob_id = '" . $row->id . "' AND is_liked = 1")->row(); ?>
                                                <p style="margin: 0; margin-left: 10px; font-size: 16px; font-weight: 500; color: #fb6920;"><?= $getLikeCount->count ?> Like</p>
                                            </div>
                                            <div class="Icon_2" style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start; margin-left: 20px;">
                                                <span><i style="color: #fb6920; font-size: 20px;" class="fa fa-comment" aria-hidden="true"></i></span>
                                                <?php $getCommentCount = $this->db->query("SELECT COUNT(id) as count FROM postjob_comment WHERE postjob_id = '" . $row->id . "'")->row(); ?>
                                                <p style="margin: 0; margin-left: 10px; font-size: 16px; font-weight: 500; color: #fb6920;"><?= $getCommentCount->count; ?> Comments</p>
                                            </div>
                                        </div>
                                        <ul style="margin: 0; display: flex; align-items: center; justify-content: flex-end; flex-direction: row; width: 250px; float: right;">
                                            <li style="margin: 0 20px 0 0 !important; font-weight: 600; font-size: 15px; color: #000 !important;">
                                                <?php if (!empty(@$_SESSION['afrebay']['userType'])) {
                                                    $chechis_like = $this->db->query("SELECT * FROM postjob_like WHERE postjob_id = '" . $row->id . "' AND user_id = '" . @$_SESSION['afrebay']['userId'] . "' AND is_liked = 1")->num_rows();
                                                    if ($chechis_like > 0) { ?>
                                                        <a style="color: #000 !important;" href="javascript:void(0)" onclick="dislikepostjob(<?= $row->id ?>)"><i style="color: #000;" class="fa fa-heart" aria-hidden="true"></i> Liked</a>
                                                    <?php } else { ?>
                                                        <a style="color: #000 !important;" href="javascript:void(0)" onclick="likepostjob(<?= $row->id ?>)"><i style="color: #000;" class="fa fa-heart-o" aria-hidden="true"></i> Like</a>
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

                                    <!-- Comment Btn -->
                                    <div class="Comment_Mobile">
                                        <textarea class="postComment" type="text" class="form-control f1" placeholder="Enter your comments" required="" name="comment_<?= $row->id ?>" id="comment_<?= $row->id ?>"></textarea>

                                        <div class="d-md-flex justify-content-between mt-2">
                                            <div>
                                                <label class="uploadBtn"><input type="file"><i class="fa fa-camera"></i> Add a Photo or Video</label>
                                            </div>
                                            <div>
                                                <?php if (!empty(@$_SESSION['afrebay']['userType'])) { ?>
                                                    <a href="javascript:void(0)" class="commentBtn" onclick="postComment(<?= $row->id ?>)">
                                                        <span style="font-size: 15px; font-weight: 600; letter-spacing: 0; color: #fff;">Comment</span>
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url() ?>login" class="commentBtn">
                                                        <span style="font-size: 15px; font-weight: 600; letter-spacing: 0; color: #fff;">Comment</span>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <!-- Comment Data -->
                                    <?php
                                    $getpostComment = $this->db->query("SELECT * FROM postjob_comment WHERE postjob_id = '" . @$row->id . "'")->result_array();
                                    if (!empty($getpostComment)) {
                                        $i = 1;
                                        foreach ($getpostComment as $each) {
                                            $rplycount = $this->db->query("SELECT COUNT(id) as count FROM postjob_comment_like  WHERE postjob_id = '" . @$row->id . "' AND comment_id = '" . $each['id'] . "' AND is_liked = 1")->row();
                                    ?>
                                            <div class="Comment_Block" style="background: #ffede3; padding: 15px; border-radius: 15px; display: flex; flex-direction: column; margin: 20px 0;">
                                                <div class="Comment_Block_Container" style="flex-direction: row; align-items: flex-start; justify-content: flex-start; display: flex; width: 100%;">
                                                    <div class="Comment_Img" style="width: 8%;">
                                                        <?php
                                                        $userData = $this->db->query("SELECT * FROM users WHERE userId = '" . $each['user_id'] . "'")->row();
                                                        if (!empty($userData->profilePic) && file_exists('uploads/users/' . $userData->profilePic)) { ?>
                                                            <img style="width: 60px; height: 60px; border-radius: 100%; object-fit: cover;" src="<?= base_url() ?>uploads/users/<?= $userData->profilePic ?>" alt="User Profile">
                                                        <?php } else { ?>
                                                            <img style="width: 60px; height: 60px; border-radius: 100%; object-fit: cover;" src="<?= base_url() ?>uploads/no_pimage.png" alt="User Profile">
                                                        <?php } ?>
                                                    </div>
                                                    <div class="User_Comment_Data" style="width: 92%; display: flex; flex-direction: column;">
                                                        <p style="margin: 0; font-weight: 600; color: #000 !important; font-size: 16px;">
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
                                                        <p style="margin-bottom: 0;"><?= $each['comment']; ?></p>
                                                        <ul style="margin: 0; display: flex; align-items: center; justify-content: flex-start; margin-top: 10px;">
                                                            <li style="margin: 0 25px 0 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                <?php if (!empty(@$_SESSION['afrebay']['userType'])) {
                                                                    $checkrplycount = $this->db->query("SELECT * FROM postjob_comment_like WHERE user_id = '" . @$_SESSION['afrebay']['userId'] . "' AND postjob_id = '" . @$row->id . "' AND comment_id = '" . $each['id'] . "' AND is_liked = 1")->row();
                                                                    if ($checkrplycount > 0) { ?>
                                                                        <a style="color: #000 !important;" href="javascript:void(0)" onclick="dislikeuserrply(<?= $row->id ?>, <?= $each['id'] ?>)">Liked</a>
                                                                    <?php } else { ?>
                                                                        <a style="color: #000 !important;" href="javascript:void(0)" onclick="likeuserrply(<?= $row->id ?>, <?= $each['id'] ?>)">Like</a>
                                                                    <?php }
                                                                } else { ?>
                                                                    <a style="color: #000 !important;" href="<?= base_url() ?>login">Like</a>
                                                                <?php } ?>
                                                            </li>
                                                            <?php if (!empty(@$_SESSION['afrebay']['userType'])) { ?>
                                                                <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                    <a style="color: #000 !important;" href="javascript:void(0)" onclick="replylink(<?= $row->id; ?>, <?= $each['id']; ?>)">Reply</a>
                                                                </li>
                                                            <?php } else { ?>
                                                                <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                    <a style="color: #000 !important;" href="<?= base_url() ?>login">Reply</a>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                        <!-- <div style="height: 148px; overflow-y: scroll;"> -->
                                                        <?php
                                                        $commentRply = $this->db->query("SELECT * FROM postjob_comment_rply WHERE comment_id = '" . $each['id'] . "'")->result_array();
                                                        if (!empty($commentRply)) {
                                                            foreach ($commentRply as $rply) {
                                                                $userDataRply = $this->db->query("SELECT * FROM users WHERE userId = '" . $rply['user_id'] . "'")->row(); ?>
                                                                <div class="Comment_Data" style="margin-left: 30px;background: #fff5ef;padding: 0px 0px 15px 15px;margin-top: 10px;border-radius: 15px;">
                                                                    <p style="margin: 10px 0 0px 15px;font-weight: 600;color: #000 !important;font-size: 16px;">
                                                                        <?php
                                                                        if (!empty($userDataRply->companyname)) {
                                                                            echo $userDataRply->companyname;
                                                                        } else {
                                                                            echo $userDataRply->firstname . " " . $userDataRply->lastname;
                                                                        }
                                                                        ?> .
                                                                        <span style="font-size: 13px; color: #6a6a6a; font-weight: 400;"><?php echo get_time_ago(strtotime($rply['created_at'])) ?></span>
                                                                    </p>
                                                                    <p style="margin: 0 0 0px 15px;color: #000 !important;font-size: 15px;"><?= $rply['comment']; ?></p>
                                                                </div>
                                                        <?php }
                                                        } ?>
                                                        <!-- </div> -->
                                                        <div style="display: flex; flex-direction: row; align-items: flex-start; justify-content: space-between; margin-top: 10px;" class="hidereplyBox" id="replyBox_<?= $each['id']; ?>">
                                                            <textarea style="background: white !important; font-size: 14px; margin-bottom: 0 !important; float: unset !important; padding: 10px 10px !important; border-bottom: 2px solid #b1b1b1; border-radius: 10px !important; min-height: 50px !important; width: 80%;" required="" name="users_rply_<?= $each['id']; ?>" id="users_rply_<?= $each['id']; ?>" placeholder="Reply"></textarea>
                                                            <a href="javascript:void(0)" onclick="postUserComment(<?= $row->id; ?>, <?= $each['id']; ?>)" style="margin-top: 10px; background: linear-gradient(180deg, rgba(249, 80, 30, 1) 0%, rgba(252, 119, 33, 1) 100%); border: 0; border-radius: 100px; width: 15%; height: 40px; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                                                                <span style="font-size: 12px; font-weight: 600; letter-spacing: 0; color: #fff;">Reply</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $i++;
                                        }
                                    } ?>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
                <div class="col-lg-2 pt-4">
                    <div class="add-sidebar sticky-top"> 
                        <a href="#"><img src="<?= base_url('assets/images/add-side.png') ?>"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="block Worker-Block">
        <div data-velocity="-.1" style="background: #F9FAFC" class="parallax scrolly-invisible no-parallax"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Available Handyman Services Professionals</h2>
                        <span>Find the most eligible talent within the portal.</span>
                    </div>
                    <div class="blog-sec">
                        <div class="row">
                            <?php
                            if (!empty($get_users)) {
                                foreach ($get_users as $user) {
                                    if (strlen($user->short_bio) > 200) {
                                        $shortbio = substr($user->short_bio, 0, 200) . '...';
                                    } else {
                                        $shortbio = $user->short_bio;
                                    }
                                    if (!empty($user->firstname) && !empty($user->lastname) && !empty($user->email) && !empty($user->gender) && !empty($user->address) && !empty($user->short_bio)) {
                            ?>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="my-blog">
                                                <div class="blog-thumbak">
                                                    <a href="<?= base_url('professionals_detail/' . base64_encode(@$user->userId)) ?>" title="">
                                                        <?php if (!empty($user->profilePic) && file_exists('uploads/users/' . $user->profilePic)) { ?>
                                                            <img src="<?= base_url('uploads/users/' . $user->profilePic); ?>" alt="" style="height: 300px;" />
                                                        <?php } else { ?>
                                                            <img src="<?= base_url('uploads/no_image.png'); ?>" alt="" style="height: 300px;" />
                                                        <?php } ?>
                                                    </a>
                                                </div>
                                                <div class="blog-details">
                                                    <div class="blog-head">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <ul class="gigasjh">
                                                                    <li>Member Since</li>
                                                                    <li><?php echo date('m/d/Y', strtotime(@$user->created)); ?></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $user_rating = $this->db->query("SELECT AVG(rt.rating) as rate FROM employer_rating rt WHERE rt.worker_id = '" . @$user->userId . "'")->result();
                                                    ?>
                                                    <div class="staak">
                                                        <?php
                                                        if ($user_rating[0]->rate > 0) {
                                                            for ($i = 0; $i < $user_rating[0]->rate; $i++) {
                                                        ?>
                                                                <span class="fa fa-star checked"></span>
                                                            <?php }
                                                        } else { ?>
                                                            <span class="">Not Rated Yet</span>
                                                        <?php } ?>
                                                    </div>
                                                    <?php if (!empty($_SESSION['afrebay']['userId'])) { ?>
                                                        <h3 class="nkash">
                                                            <a type="button" class="btn" href="<?= base_url('professionals_detail/' . base64_encode(@$user->userId)) ?>" title="">
                                                                <?php if (!empty($user->firstname)) {
                                                                    echo $user->firstname . ' ' . $user->lastname;
                                                                } else {
                                                                    echo ucfirst($user->username);
                                                                } ?>
                                                            </a>
                                                        </h3>
                                                    <?php } else { ?>
                                                        <h3 class="nkash">
                                                            <a type="button" class="btn" href="javascript:void(0)" title="" onclick="viewProfile()">
                                                                <?php if (!empty($user->firstname)) {
                                                                    echo $user->firstname . ' ' . $user->lastname;
                                                                } else {
                                                                    echo ucfirst($user->username);
                                                                } ?>
                                                            </a>
                                                        </h3>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                            <?php }
                                }
                            } ?>
                        </div>
                    </div>
                </div>
                <?php if (count($getTotalworkers) > 8) { ?>
                    <div class="col-lg-12">
                        <div class="browse-all-cat">
                            <a href="<?= base_url('professionals') ?>" title="">View More</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<section id="scroll-here">
    <div class="block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <div class="heading text-left">
                        <h2 class="mb-3 text-left">Our Services</h2>
                        <span>Looking for a reliable and outstanding business process outsourcing partner? Look no
                            further. With Handyman Services, you no longer have to worry about employing the best
                            service provider for your customer. Our focus is to ensure you get professional expertise
                            needed to make your business grow.</span>
                    </div>
                    <div class="cat-sec">
                        <div class="row no-gape">
                            <?php if (!empty($get_ourservice)) {
                                foreach ($get_ourservice as $item) {
                                    //$get_category=$this->Crud_model->get_single('category',"id='".$item->category_id."'");
                                    if (strlen($item['description']) > 100) {
                                        $description = substr($item['description'], 0, 100) . '...';
                                    } else {
                                        $description = $item['description'];
                                    }
                            ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="p-category">
                                            <a href="<?php echo base_url('contact-us') ?>" title="">
                                                <img src="<?php echo base_url() ?>uploads/services/<?php echo $item['icon'] ?>" style="width: 100%; height: 150px; object-fit: cover; border-radius: 10px;">
                                                <?php if (!empty($item['category_name'])) { ?>
                                                    <span><?= ucfirst($item['category_name']) ?></span>
                                                <?php } else { ?>
                                                    <span></span>
                                                <?php } ?>
                                                <?php if (!empty($description)) { ?>
                                                    <p><?= ucfirst(strip_tags($description)); ?></p>
                                                <?php } else { ?>
                                                    <p></p>
                                                <?php } ?>
                                            </a>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <a href="#"><img src="<?= base_url('assets/images/add-square.png') ?>"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="block double-gap-top double-gap-bottom">
        <?php if (!empty($get_banner_middle->image) && file_exists('uploads/banner/' . $get_banner_middle->image)) {
            $image = base_url('uploads/banner/' . $get_banner_middle->image);
        ?>
            <div data-velocity="-.1" style="background: url('<?php echo $image ?>') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div>
        <?php } else { ?>
            <div data-velocity="-.1" style="background: url('<?= base_url(); ?>assets/images/resource/parallax1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="simple-text-block">
                        <h3>Get access to the best handyman jobs near you.</h3>
                        <span>Create your account here</span>
                        <?php if (empty($_SESSION['afrebay']['userId'])) { ?>
                            <a href="<?= base_url('signup') ?>" title="">Create an Account</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Customers we have helped</h2>
                        <span>Some of the customers we've helped recruit excellent handymen over the years.</span>
                    </div>
                    <div class="comp-sec">
                        <?php if (!empty($get_company)) {
                            foreach ($get_company as $item) { ?>
                                <div class="company-img">
                                    <a href="javascript:void(0)" title="">
                                        <?php if (!empty($item->logo) && file_exists('uploads/company_logo/' . $item->logo)) { ?>
                                            <img src="<?= base_url('uploads/company_logo/' . $item->logo); ?>" alt="" />
                                        <?php } else { ?>
                                            <img src="<?= base_url(); ?>assets/images/resource/b1.jpg" alt="" />
                                        <?php } ?>
                                    </a>
                                </div>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <div class="mt-3 text-center">
                <a href="#"><img src="<?= base_url('assets/images/add-slick.png') ?>"></a>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="block Career">
        <div data-velocity="-.1" style="background: #F9FAFC" class="parallax scrolly-invisible no-parallax"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Quick Career Tips</h2>
                        <span>Review the latest updates in the industry.</span>
                    </div>
                    <div class="blog-sec">
                        <div class="row">
                            <?php if (!empty($get_career)) {
                                foreach ($get_career as $career) {
                                    if (strlen($career->description) > 100) {
                                        $desc = substr($career->description, 0, 100) . '...';
                                    } else {
                                        $desc = $career->description;
                                    }
                            ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="my-blog">
                                            <div class="blog-thumb">
                                                <a href="<?= base_url('career-tips/' . $career->slug) ?>" title="">
                                                    <?php if (!empty($career->image) && file_exists('uploads/career/' . $career->image)) { ?>
                                                        <img src="<?= base_url('uploads/career/' . $career->image); ?>" alt="" />
                                                    <?php } else { ?>
                                                        <img src="<?= base_url(); ?>assets/images/resource/b1.jpg" alt="" />
                                                    <?php } ?>
                                                </a>
                                                <div class="blog-metas">
                                                    <a href="javascript:void(0)" title=""><?= date('M d,Y', strtotime($career->tipsdate)) ?></a>
                                                    <a href="javascript:void(0)" title="">0 Comments</a>
                                                </div>
                                            </div>
                                            <div class="blog-details">
                                                <h3><a href="<?= base_url('career-tips/' . $career->slug) ?>" title=""><?= ucfirst($career->title) ?></a></h3>
                                                <div><?= ucfirst($desc) ?></div>
                                                <a href="<?= base_url('career-tips/' . $career->slug) ?>" title=""><span>Read
                                                        More</span></a>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                <?php if (count($getTotalcareer) > 3) { ?>
                    <div class="col-lg-12">
                        <div class="browse-all-cat">
                            <a href="<?= base_url('career-tips') ?>" title="">View More</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">Choose Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-4">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="job-field frmSearch">
                    <input type="text" name="location" id="location" value="<?= @$loc ?>" placeholder="Set Location" />
                    <i class="la la-close" style="right: 0px; top: 19px !important;" onclick="removeAdd()"></i>
                    <input type="hidden" id="search_lat" name="s_lat" value="<?= @$lat ?>">
                    <input type="hidden" id="search_lon" name="s_lon" value="<?= @$lon ?>">
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 Mobile_Btn_Container_1" >
                <!-- <button onclick="event.preventDefault(); viewInMap()" style=" width: 100% !important; padding: 18px 0px; height: auto !important; margin: 0; border-radius: 35px !important; font-size: 15px;">View In Map</button> -->
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" onclick="event.preventDefault(); viewInMap()" style=" width: 100% !important; padding: 18px 0px !important; height: auto !important; margin: 0; border-radius: 35px !important; font-size: 15px;">View
                    In Map</button>
            </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
<style>
    .chosen_country {
        color: #888888;
        height: 60px;
        border-radius: 50px;
        padding: 17px !important;
    }

    #state {
        display: block;
        color: #888888;
        height: 60px;
        border-radius: 50px;
        padding: 17px !important;
    }

    #city {
        display: block;
        color: #888888;
        height: 60px;
        border-radius: 50px;
        padding: 17px !important;
    }

    .jconfirm-content-pane {
        text-align: center;
        font-size: 18px;
    }

    .jconfirm-buttons {
        margin-right: 140px;
        display: inline-block;
    }

    #country-list {
        float: left;
        list-style: none;
        margin-top: 60px;
        padding: 0;
        width: 98%;
        position: absolute;
        z-index: 1;
    }

    #country-list li {
        padding: 10px 30px;
        background: #ffffff;
        margin: 0px !important;
        border-radius: 10px;
        border-bottom: 1px solid #eee;
    }

    #country-list li:hover {
        background: #ece3d2;
        cursor: pointer;
    }

    /* #search-box {padding: 10px; border: #a8d4b1 1px solid; border-radius: 4px;} */
    ::-webkit-scrollbar {
        width: 10px;
        background-color: transparent;
    }

    ::-webkit-scrollbar-track {
        background: transparent;
    }

    ::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .pf-map iframe {
        height: 525px !important;
    }

    #map {
        position: relative !important;
        height: 500px !important;
        max-width: 100% !important;
    }

    .hidereplyBox {
        display: none !important;
    }

    .showreplyBox {
        display: flex !important;
    }

    @media screen and (max-width: 425px) {
        .job-field input {
            padding: 0 20px !important;
        }
        .job-field .la-search {
            font-size: 25px !important;
            top: 20px !important;
        }
        .Mobile_Btn_Container_1 {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 !important;
        }
        .Mobile_Btn_Container_1 .btn-primary {
            margin-bottom: 20px !important;
        }
        .TopBar {
            flex-direction: column !important;
            height: 110px !important;
        }
        .TopBar ul {
            width: 100% !important;
            justify-content: space-evenly;
        }
        .TopBar ul li {
            padding: 0 20px !important;
        }
        .TopBar a {
            width: 100% !important;
        }
        .TopBar a span {
            width: 100px !important;
        }
        .PostContainer {
            padding: 10px !important;
        }
        .PostContainer .DataContainer {
            padding: 15px !important;
        }
        .PostContainer .DataContainer .InfoBlock {
            height: 50px !important;
        }
        .PostContainer .DataContainer .InfoBlock img {
            height: 50px !important;
            width: 50px !important;
        }
        .PostContainer .DataContainer .InfoBlock .TextData h3 {
            font-size: 16px !important;
        }
        .PostContainer .DataContainer .InfoBlock .TextData p {
            line-height: 20px !important;
        }
        .PostContainer .DataContainer .CommentData {
            font-size: 14px !important;
            line-height: 20px !important;
        }
        .Rply_Comment_Block {
            flex-direction: column !important;
        }
        .Rply_Comment_Block .Active_Icon_Block {
            justify-content: flex-start !important;
            width: 100% !important;
        }
        .Rply_Comment_Block ul {
            width: 100% !important;
            margin-top: 10px !important;
            justify-content: flex-start !important;
        }
        .Comment_Mobile {
            flex-direction: column !important;
        }
        .Comment_Mobile textarea {
            width: 100% !important;
        }
        .Comment_Mobile a {
            width: 100% !important;
        }
        .PostContainer .DataContainer .Comment_Block {
            padding: 10px !important;
        }
        .Comment_Block_Container {
            flex-direction: column !important;
        }
        .Comment_Data {
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
        .ADD_Sense {
            height: 120px !important;
            top: calc(100vh - 130px) !important;
            padding-left: 0px !important;
            width: 100% !important;
            align-items: center !important;
            justify-content: center !important;
            left: 0 !important;
        }
        .User_Comment_Data {
            width: 100% !important;
        }
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtg6oeRPEkRL9_CE-us3QdvXjupbgG14A&libraries=places&callback=initMap"></script>
<script>
    $(document).ready(function() {
        var base_url = $("#base_url").val();
        var id = 'United States';
        $.ajax({
            type: "post",
            cache: false,
            url: base_url + "Welcome/states_by_country",
            data: {
                country_name: id
            },
            beforeSend: function() {},
            success: function(returndata) {
                $('.state_field').show();
                $('#state').html(returndata);
                $('#city').html('<option value="">Select State First</option>');
            }
        });
        $("#search-box").keyup(function() {
            var text = $("#search-box").val();
            var base_url = $("#base_url").val();
            $.ajax({
                type: "POST",
                url: base_url + "Welcome/get_category_list",
                data: {
                    category_name: text
                },
                beforeSend: function() {
                    $("#search-box").css("background", "#FFF url(<?php base_url() ?>uploads/LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data) {
                    //console.log(data);
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background", "#FFF");
                }
            });
        });

        var location = {
            latitude: '',
            longitude: ''
        };
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            //latitudeAndLongitude.innerHTML="Geolocation is not supported by this browser.";
            //
        }

        function showPosition(position) {
            location.latitude = position.coords.latitude;
            location.longitude = position.coords.longitude;
            //latitudeAndLongitude.innerHTML="Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
            var geocoder = new google.maps.Geocoder();
            var latLng = new google.maps.LatLng(location.latitude, location.longitude);
            $('#search_lat').val(location.latitude);
            $('#search_lon').val(location.longitude);
            if (geocoder) {
                geocoder.geocode({
                    'latLng': latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        console.log(results);
                        $('#location').val(results[0].formatted_address);
                    } else {
                        $('#location').html('Geocoding failed: ' + status);
                        console.log("Geocoding failed: " + status);
                    }
                }); //geocoder.geocode()
            }
        } //showPosition
    })

    function getState(val) {
        var base_url = $("#base_url").val();
        var id = val;
        $.ajax({
            type: "post",
            cache: false,
            url: base_url + "Welcome/states_by_country",
            data: {
                country_name: id
            },
            beforeSend: function() {},
            success: function(returndata) {
                $('.state_field').show();
                $('#state').html(returndata);
                $('#city').html('<option value="">Select State First</option>');
            }
        });
    }

    function getCity(val) {
        var base_url = $("#base_url").val();
        var id = val;
        $.ajax({
            type: "post",
            cache: false,
            url: base_url + "Welcome/cities_by_state",
            data: {
                state_name: id
            },
            beforeSend: function() {},
            success: function(returndata) {
                $('.city_field').show();
                $('#city').html(returndata);
            }
        });
    }

    function viewProfile() {
        $.alert({
            title: '',
            content: "Please login to view professional's profile",
        });
    }

    function selectcategory(val) {
        $("#search-box").val(val);
        $("#suggesstion-box").hide();
    }

    function removeAdd() {
        $('#location').val('');
        $('#search_lon').val('');
        $('#search_lat').val('');
    }

    function viewInMap() {
        var location = $('#location').val();
        $('#map').html('<iframe src="https://maps.google.it/maps?q=' + location + '&output=embed"></iframe>');
        initialize();
    }

    function initialize() {
        var lat = $('#search_lat').val();
        var lon = $('#search_lon').val();
        var myLatlng = new google.maps.LatLng(lat, lon);
        var myOptions = {
            zoom: 20,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.HYBRID
        }
        var map = new google.maps.Map(document.getElementById("map"), myOptions);
        addMarker(myLatlng, 'Default Marker', map);
        map.addListener('click', function(event) {
            addMarker(event.latLng, 'Click Generated Marker', map);
        });
    }

    function handleEvent(event) {
        //console.log('lat:' + event.latLng.lat());
        document.getElementById('search_lat').value = event.latLng.lat();
        document.getElementById('search_lon').value = event.latLng.lng();
        setTimeout(function() {
            //initialize();
            const latlng = {
                lat: parseFloat(event.latLng.lat()),
                lng: parseFloat(event.latLng.lng()),
            };
            const geocoder = new google.maps.Geocoder();
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 20,
                center: {
                    lat: event.latLng.lat(),
                    lng: event.latLng.lng()
                },
                mapTypeId: google.maps.MapTypeId.HYBRID
            });
            geocoder.geocode({
                location: latlng
            }).then((response) => {
                if (response.results[0]) {
                    map.setZoom(20);
                    const marker = new google.maps.Marker({
                        position: latlng,
                        map: map,
                        center: {
                            lat: event.latLng.lat(),
                            lng: event.latLng.lng()
                        },
                        mapTypeId: google.maps.MapTypeId.HYBRID
                    });
                    console.log(response.results[0].formatted_address);
                    addMarker(latlng, 'Default Marker', map);
                    map.addListener('click', function(event) {
                        addMarker(event.latLng, 'Click Generated Marker', map);
                    });
                    $("#location").val(response.results[0].formatted_address);
                    setTimeout(function() {
                        $('#exampleModal').removeClass('show');
                        $('#exampleModal').css('display', 'none');
                        $('body').removeClass('modal-open');
                        $('body').css('padding', '0');
                        $('.modal-backdrop').remove();
                    }, 3000);
                } else {
                    window.alert("No results found");
                }
            })
        }, 3000);
    }

    function addMarker(latlng, title, map) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: title,
            draggable: true
        });
        marker.addListener('drag', handleEvent);
        marker.addListener('dragend', handleEvent);
    }
    // for posting Comment
    function postComment(postjobID) {
        if ($('#comment_' + postjobID).val() == "") {
            $('#err_comment_' + postjobID).fadeIn().html('Please enter your comment first').css('color', 'red');
            setTimeout(function() {
                $("#err_comment_" + postjobID).html("");
            }, 3000);
            $("#comment_" + postjobID).css('border-color', 'red');
            setTimeout(function() {
                $("#comment_" + postjobID).css('border-color', '#80bdff');
            }, 3000);
            return false;
        } else {
            var user_id = $('#userID').val();
            var postjob_id = postjobID;
            var comment_id = $('#comment_id').val();
            var comment = $('#comment_' + postjobID).val();
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
    function replylink(postId, commentid) {
        $('#replyBox_' + commentid).toggleClass('showreplyBox');
        //$('#replyBox_' + commentid).removeClass('hidereplyBox');
    }
    //for user comment's reply
    function postUserComment(postId, commentid) {
        if ($('#users_rply_' + commentid).val() == "") {
            $("#users_rply_" + commentid).css('border-color', 'red');
            $('#users_rply_' + commentid).attr("placeholder", "Please type your reply here");
            setTimeout(function() {
                $("#users_rply_" + commentid).css('border-color', '#80bdff');
            }, 3000);
            return false;
        } else {
            var user_id = $('#userID').val();
            var postjob_id = postId;
            var comment_id = commentid;
            var comment = $('#users_rply_' + commentid).val();
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
    function likepostjob(postjobID) {
        var user_id = $('#userID').val();
        var postjob_id = postjobID;
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
    function likeuserrply(postId, commentid) {
        var user_id = $('#userID').val();
        var postjob_id = postId;
        var comment_id = commentid;
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
    function dislikepostjob(postjobID) {
        var user_id = $('#userID').val();
        var postjob_id = postjobID;
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
    function dislikeuserrply(postId, commentid) {
        var user_id = $('#userID').val();
        var postjob_id = postId;
        var comment_id = commentid;
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