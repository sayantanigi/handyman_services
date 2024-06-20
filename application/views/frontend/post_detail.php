<?php
if (!empty($get_banner->image) && file_exists('uploads/banner/' . $get_banner->image)) {
    $banner_img = base_url("uploads/banner/" . $get_banner->image);
} else {
    $banner_img = base_url("assets/images/resource/mslider1.jpg");
} ?>
<style media="screen">
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
</style>
<style>
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
</style>
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url('<?= $banner_img ?>') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>
        <!-- PARALLAX BACKGROUND IMAGE -->
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
                        <?php if (@$_SESSION['afrebay']['userType'] == '1') { ?>
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-12">
                            <?php } else if (@$_SESSION['afrebay']['userType'] == '2') { ?>
                                <div class="col-8">
                                <?php } else { ?>
                                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-12">
                                    <?php } ?>
                                    <div class="bid-dis">
                                        <ul style="margin-bottom: 0;">
                                            <li>
                                                <span>Job Title </span>
                                                <a href="<?= base_url('workdetail/' . base64_encode($post_data->id)) ?>" style="text-transform: uppercase;">
                                                    <?php if (!empty($post_data->post_title)) {
                                                        echo $post_data->post_title;
                                                    } ?>
                                                </a>
                                            </li>
                                            <?php if (!empty($post_data->description)) { ?>
                                                <li class="cstm_desc"><span>Description</span><?php echo $post_data->description; ?>
                                                <?php } ?>
                                                </li>
                                                <div class="Bid-Data">
                                                    <?php if (!empty($post_data->required_key_skills)) { ?>
                                                        <li><span>Required key skills </span><?php echo ucfirst($post_data->required_key_skills); ?></li>
                                                    <?php } ?>
                                                    <?php if (!empty($post_data->appli_deadeline)) { ?>
                                                        <li><span>Application Deadline Date </span><?php echo $post_data->appli_deadeline; ?></li>
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
                                                            <span style="color: #fff !important; font-weight: 400;">
                                                                <?php echo $post_data->city . ', ' . $post_data->state . ', ' . $post_data->country; ?>
                                                            </span>
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                        </ul>
                                        <!-- <?php $postedBy = $this->db->query("SELECT * FROM users WHERE userId = '" . $post_data->user_id . "'")->result_array(); ?> -->
                                        <!-- <a class="btn btn-info" href="<?= base_url('customer_detail/' . base64_encode($post_data->user_id)) ?>">
                                        <?php
                                        if ($postedBy[0]['userType'] == 1) {
                                            echo $postedBy[0]['firstname'] . ' ' . $postedBy[0]['lastname'];
                                        } else if ($postedBy[0]['userType'] == 2) {
                                            echo $postedBy[0]['companyname'];
                                        } ?>
                                    </a> -->
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
                                                    <span>
                                                        <?php if (!empty($post_data->user_address)) {
                                                            echo $post_data->user_address;
                                                        } ?></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="hope-aus1">
                                                    <ul>
                                                        <!-- <li><a href="javascript:void(0)"><i class="fa fa-shield"></i></a></li> -->
                                                        <li><a href="javascript:void(0)"><i class="fa fa-envelope"></i></a></li>
                                                        <!-- <li><a href="javascript:void(0)"><i class="fa fa-user"></i></a></li> -->
                                                        <li><a href="javascript:void(0)"><i class="fa fa-phone"></i></a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="col-12 JobImage">
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
                                        <div class="col-12" style="margin-top: 30px;">
                                            <div class="bid-dis" style="background: linear-gradient(180deg, rgba(252, 119, 33, 1) 0%, rgba(249, 80, 30, 1) 100%);">
                                                <a style="display: flex; flex-direction: row; align-items: center; justify-content: space-evenly;" href="<?= base_url('customer_detail/' . base64_encode($post_data->user_id)) ?>">
                                                    <img style="width: 70px; height: 70px; object-fit: cover; border-radius: 100%;" src="https://techg.igiapp.com/handymanservices/uploads/users/4374_dafc3addfd37737b93fa9ecce064f73d.jpg" alt="">
                                                    <div style="display: flex; flex-direction: column; align-items: flex-start; justify-content: flex-start;">
                                                        <h3 style="margin-bottom: 5px; font-size: 18px; color: #fff !important; letter-spacing: 0 !important; font-weight: 600;">Demo Customer</h3>
                                                        <span style="font-weight: 500; color: #fff !important; font-size: 13px;">
                                                            <i class="la la-map-marker"></i>
                                                            Kolkata, West Bengal, India
                                                        </span>
                                                        <span style="font-weight: 500; color: #fff !important; font-size: 13px;">
                                                            <i class="la la-eye"></i>
                                                            Views 24
                                                        </span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if (@$_SESSION['afrebay']['userType'] == '1' || empty(@$_SESSION['afrebay']['userType']) || @$_SESSION['afrebay']['userType'] == '2') { ?>
                                        <div class="col-8" style="margin-top: 30px;">
                                            <div class="bid-dis">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <textarea style="background: transparent !important; font-size: 14px; margin-bottom: 20px !important; padding: 10px 10px !important; border-bottom: 2px solid #b1b1b1; border-radius: 10px !important; box-shadow: 0 0 10px #e1e1e1; min-height: 100px !important;" type="text" class="form-control f1" placeholder="Enter your comments" required=""></textarea>
                                                    </div>
                                                    <div class="col-2">
                                                        <a href="" style="background: linear-gradient(180deg, rgba(249, 80, 30, 1) 0%, rgba(252, 119, 33, 1) 100%); border: 0; border-radius: 100px; width: 100%; height: 45px; cursor: pointer; display:flex; align-items: center; justify-content: center; ">
                                                            <span style="font-size: 15px; font-weight: 600; letter-spacing: 0; color: #fff;">
                                                                Comment
                                                            </span>
                                                        </a>
                                                    </div>

                                                    <div class="col-6" style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start;">
                                                        <div style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start;">
                                                            <span><i style="color: #fb6920; font-size: 18px;" class="fa fa-heart" aria-hidden="true"></i></span>
                                                            <p style="margin: 0; margin-left: 10px; font-size: 16px; font-weight: 500; color: #fb6920;">15 Likes</p>
                                                        </div>
                                                        <div style="display: flex; flex-direction: row; align-items: center; justify-content: flex-start; margin-left: 20px;">
                                                            <span><i style="color: #fb6920; font-size: 20px;" class="fa fa-comment" aria-hidden="true"></i></span>
                                                            <p style="margin: 0; margin-left: 10px; font-size: 16px; font-weight: 500; color: #fb6920;">9 Comments</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <ul style="margin: 0; display: flex; align-items: center; justify-content: flex-end; flex-direction: row; width: 250px; float: right;">
                                                            <li style="margin: 0 20px 0 0 !important; font-weight: 600; font-size: 15px; color: #000 !important;">
                                                                <a style="color: #000 !important;" href="">
                                                                    <i style="color: #000;" class="fa fa-heart-o" aria-hidden="true"></i>
                                                                    Like
                                                                </a>
                                                            </li>
                                                            <li style="margin: 0 !important; font-weight: 600; font-size: 15px; color: #000 !important;">
                                                                <a style="color: #000 !important;" href="">
                                                                    <i style="color: #000;" class="fa fa-share" aria-hidden="true"></i>
                                                                    Share</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="Comment_Block">
                                                            <div class="Comment_Img">
                                                                <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1760&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                                            </div>
                                                            <div class="Comment_Data">
                                                                <p>Demo Customer .
                                                                    <span style="font-size: 13px; color: #6a6a6a; font-weight: 400;">1d</span> .
                                                                    <span style="color: #fb6920; font-size: 13px;"><i class="fa fa-heart" aria-hidden="true"></i> 5 Likes</span>
                                                                </p>
                                                                <p>The handyman service was fantastic! They arrived on time, fixed my leaky faucet, and even helped with some additional minor repairs around the house. Highly recommend!</p>
                                                                <ul>
                                                                    <li style="margin: 0 25px 0 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Like</a>
                                                                    </li>
                                                                    <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="Comment_Block">
                                                            <div class="Comment_Img">
                                                                <img src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                                            </div>
                                                            <div class="Comment_Data">
                                                                <p>Demo Customer .
                                                                    <span style="font-size: 13px; color: #6a6a6a; font-weight: 400;">1h</span>
                                                                </p>
                                                                <p>The handyman service was fantastic! They arrived on time, fixed my leaky faucet, and even helped with some additional minor repairs around the house. Highly recommend!</p>
                                                                <ul>
                                                                    <li style="margin: 0 25px 0 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Like</a>
                                                                    </li>
                                                                    <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="Comment_Block">
                                                            <div class="Comment_Img">
                                                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                                            </div>
                                                            <div class="Comment_Data">
                                                                <p>Demo Customer .
                                                                    <span style="font-size: 13px; color: #6a6a6a; font-weight: 400;">30m</span> .
                                                                    <span style="color: #fb6920; font-size: 13px;"><i class="fa fa-heart" aria-hidden="true"></i> 17 Likes</span>
                                                                </p>
                                                                <p>The handyman service was fantastic! They arrived on time, fixed my leaky faucet, and even helped with some additional minor repairs around the house. Highly recommend!</p>
                                                                <ul>
                                                                    <li style="margin: 0 25px 0 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Like</a>
                                                                    </li>
                                                                    <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>


                                                        <div class="Comment_Block">
                                                            <div class="Comment_Img">
                                                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                                            </div>
                                                            <div class="Comment_Data">
                                                                <p>Demo Customer .
                                                                    <span style="font-size: 13px; color: #6a6a6a; font-weight: 400;">25m</span>
                                                                </p>
                                                                <p>The handyman service was fantastic! They arrived on time, fixed my leaky faucet, and even helped with some additional minor repairs around the house. Highly recommend!</p>
                                                                <ul>
                                                                    <li style="margin: 0 25px 0 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Like</a>
                                                                    </li>
                                                                    <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="Comment_Block">
                                                            <div class="Comment_Img">
                                                                <img src="https://images.unsplash.com/photo-1616179054043-7570cd0d47d6?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                                            </div>
                                                            <div class="Comment_Data">
                                                                <p>Demo Customer .
                                                                    <span style="font-size: 13px; color: #6a6a6a; font-weight: 400;">20m</span>.
                                                                    <span style="color: #fb6920; font-size: 13px;"><i class="fa fa-heart" aria-hidden="true"></i> 8 Likes</span>
                                                                </p>
                                                                <p>The handyman service was fantastic! They arrived on time, fixed my leaky faucet, and even helped with some additional minor repairs around the house. Highly recommend!</p>
                                                                <ul>
                                                                    <li style="margin: 0 25px 0 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Like</a>
                                                                    </li>
                                                                    <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="Comment_Block">
                                                            <div class="Comment_Img">
                                                                <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                                            </div>
                                                            <div class="Comment_Data">
                                                                <p>Demo Customer .
                                                                    <span style="font-size: 13px; color: #6a6a6a; font-weight: 400;">20m</span>.
                                                                    <span style="color: #fb6920; font-size: 13px;"><i class="fa fa-heart" aria-hidden="true"></i> 10 Likes</span>
                                                                </p>
                                                                <p>The handyman service was fantastic! They arrived on time, fixed my leaky faucet, and even helped with some additional minor repairs around the house. Highly recommend!</p>
                                                                <ul>
                                                                    <li style="margin: 0 25px 0 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Like</a>
                                                                    </li>
                                                                    <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="Comment_Block">
                                                            <div class="Comment_Img">
                                                                <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                                            </div>
                                                            <div class="Comment_Data">
                                                                <p>Demo Customer .
                                                                    <span style="font-size: 13px; color: #6a6a6a; font-weight: 400;">16m</span>.
                                                                    <span style="color: #fb6920; font-size: 13px;"><i class="fa fa-heart" aria-hidden="true"></i> 2 Likes</span>
                                                                </p>
                                                                <p>The handyman service was fantastic! They arrived on time, fixed my leaky faucet, and even helped with some additional minor repairs around the house. Highly recommend!</p>
                                                                <ul>
                                                                    <li style="margin: 0 25px 0 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Like</a>
                                                                    </li>
                                                                    <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="Comment_Block">
                                                            <div class="Comment_Img">
                                                                <img src="https://images.unsplash.com/photo-1672748341520-6a839e6c05bb?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                                            </div>
                                                            <div class="Comment_Data">
                                                                <p>Demo Customer .
                                                                    <span style="font-size: 13px; color: #6a6a6a; font-weight: 400;">14m</span>
                                                                </p>
                                                                <p>The handyman service was fantastic! They arrived on time, fixed my leaky faucet, and even helped with some additional minor repairs around the house. Highly recommend!</p>
                                                                <ul>
                                                                    <li style="margin: 0 25px 0 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Like</a>
                                                                    </li>
                                                                    <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="Comment_Block">
                                                            <div class="Comment_Img">
                                                                <img src="https://plus.unsplash.com/premium_photo-1680658084469-100de185031a?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                                                            </div>
                                                            <div class="Comment_Data">
                                                                <p>Demo Customer .
                                                                    <span style="font-size: 13px; color: #6a6a6a; font-weight: 400;">10m</span>
                                                                </p>
                                                                <p>The handyman service was fantastic! They arrived on time, fixed my leaky faucet, and even helped with some additional minor repairs around the house. Highly recommend!</p>
                                                                <ul>
                                                                    <li style="margin: 0 25px 0 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Like</a>
                                                                    </li>
                                                                    <li style="margin: 0 !important; font-size: 13px; color: #000 !important; font-weight: 600;">
                                                                        <a style="color: #000 !important;" href="">Reply</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4" style="margin-top: 30px; position: sticky; top: 160px; height: fit-content;">
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
                                                            <div style="display: inline-block;width: 82%; margin-left: 10px;">
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
                                                                    if (@$_SESSION['afrebay']['userType'] == '1') {
                                                                        //$userBidData = $this->db->query("SELECT * FROM `job_bid` WHERE postjob_id = '".$post_data->id."' and user_id = '".$_SESSION['afrebay']['userId']."'")->result_array();
                                                                        //if(!empty($userBidData)) {
                                                                ?>
                                                                        <!-- <a href="<?= base_url() ?>jobbid" class="cstm_viewbid_btn"> View Bid</a> -->
                                                                        <?php //} else {
                                                                        ?>
                                                                        <input type="submit" name="">
                                                                        <?php //}
                                                                        ?>
                                                                    <?php } else { ?>
                                                                        <h2 class="job-bid" style="font-size:16px;">Customer are not eligible to Bid for jobs</h2>
                                                                    <?php }
                                                                } else { ?>
                                                                    <br />
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