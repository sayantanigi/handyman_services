<?php
if (!empty($userdata->backgroundPic) && file_exists('uploads/users/background/' . $get_banner->backgroundPic)) {
    $banner_img=base_url("uploads/users/background/".$userdata->backgroundPic);
} else {
    $banner_img=base_url("assets/images/resource/mslider1.jpg");
} ?>
<section style="width: 100%; height: 400px;">
    <div style="width: 100%; height: 100%; position: relative;">
        <div style="background: #c34e102b; position: absolute; z-index: 1; width: 100%; height: 100%;"></div>
        <img style="width: 100%; height: 100%; object-fit: cover;" src="<?= $banner_img ?>" />
    </div>
</section>

<section>
    <div class="block Employer_Details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 column">
                    <div class="job-single-sec style3">
                        <div class="job-head-wide">
                            <div class="row">
                                <div class="col-lg-10 col-md-12 col-sm-12">
                                    <div class="job-single-head3 emplye">
                                        <div class="job-thumb">
                                            <?php if (@$userdata->profilePic && file_exists('uploads/users/' . @$userdata->profilePic)) { ?>
                                            <img id="profile-img" src="<?= base_url('uploads/users/'.@$userdata->profilePic)?>" class="online" alt="" />
                                            <?php } else { ?>
                                            <img id="profile-img" src="<?= base_url('uploads/no_pimage.png')?>" class="online" alt="" />
                                            <?php } ?>
                                        </div>
                                        <div id="status-options">
                                            <a href="javascript:void(0)" style=" background: #fa8558; padding: 10px; border-radius: 5px; color: #fff; "><i class="la la-volume-mute"></i> Mute</a>
                                            <a href="javascript:void(0)" style=" background: #fa8558; padding: 10px; border-radius: 5px; color: #fff; "><i class="la la-flag"></i> Report</a>
                                            <a href="javascript:void(0)" style=" background: #fa8558; padding: 10px; border-radius: 5px; color: #fff; "><i class="la la-share"></i> Forward </a>
                                        </div>
                                        <div class="job-single-info3">
                                            <h3>
                                                <?php
                                                $companyname = $userdata->companyname;
                                                if (!empty($companyname)) {
                                                    echo ucwords($companyname);
                                                } else {
                                                    echo ucwords($userdata->firstname." ".$userdata->lastname);
                                                } ?>
                                            </h3>
                                            <!--<span><i class="la la-map-marker"></i><?= @$userdata->address; ?></span>
                                            <span class="job-is ft">Full time</span>-->
                                            <ul class="tags-jobs">
                                                <li><i class="la la-file-text"></i> Applications <?= count($get_post); ?></li>
                                                <!-- <li><i class="la la-calendar-o"></i>
                                                    <?php $getdate = $this->Crud_model->get_single('postjob', "user_id='" . $userdata->userId . "'");
                                                    if (!empty($getdate->appli_deadeline)) { ?>
                                                    Post Date: <?= date('M d,Y', strtotime(@$getdate->appli_deadeline));
                                                            } ?>
                                                </li> -->
                                                <li><i class="la la-eye"></i> Views <?= @$userdata->view_count ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Job Head -->
                                </div>
                                <div class="col-lg-2 col-md-12 col-sm-12">
                                    <!-- <div class="share-bar">
                                        <div class="sharethis-inline-share-buttons"></div>
                                    </div> -->
                                    <!-- <div class="emply-btns">
                                        <a class="seemap" id="ShowMap"><i class="la la-map-marker"></i> See On Map</a>
                                        <?php if (!empty(@$userdata->address)) { ?>
                                            <p style="display:none;" id="show_maping">
                                                <iframe width="260" height="100px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?= @$userdata->address ?>&output=embed"></iframe>
                                            </p>
                                        <?php } ?>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="job-wide-devider">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12 column">
                                    <div class="job-details">
                                        <h3>About
                                        <?php
                                        $companyname = $userdata->companyname;
                                        if (!empty($companyname)) {
                                            echo ucwords($companyname);
                                        } else {
                                            echo ucwords($userdata->firstname." ".$userdata->lastname);
                                        } ?>
                                        </h3>
                                        <p><?= @$userdata->short_bio; ?></p>
                                    </div>
                                    <?php if (!empty($get_post)) { ?>
                                    <div class="recent-jobs">
                                        <h3>Jobs from
                                        <?php
                                        $companyname = $userdata->companyname;
                                        if (!empty($companyname)) {
                                            echo ucwords($companyname);
                                        } else {
                                            echo ucwords($userdata->firstname." ".$userdata->lastname);
                                        } ?>
                                        </h3>
                                        <div class="job-list-modern">
                                            <div class="job-listings-sec no-border">
                                                <?php
                                                //echo "<pre>"; print_r($get_post);
                                                $total_post = count($get_post);
                                                foreach ($get_post as $key) {
                                                ?>
                                                <div class="job-listing wtabs noimg col-lg-6 col-md-6 col-sm-12">
                                                    <div class="CustomBlockDesign">
                                                        <?php
                                                        $getJobImage = $this->db->query("SELECT * FROM postjob_image WHERE job_id = '".$key->id."'")->row();
                                                        $jobimage = base_url("uploads/postjob/".$getJobImage->job_image);
                                                        ?>
                                                        <img src="<?= $jobimage; ?>" />
                                                        <div class="CustomContainer">
                                                            <div class="job-title-sec">
                                                                <h3 style="text-transform: uppercase;"><a href="<?php echo base_url() ?>workdetail/<?php echo base64_encode($key->id) ?>" title=""><?= $key->post_title; ?></a></h3>
                                                                <span><?php echo $key->required_key_skills; ?></span>
                                                                <div class="job-lctn"><i class="la la-map-marker"></i><?= ucwords($key->location); ?></div>
                                                            </div>
                                                            <div class="job-style-bx">
                                                                <span class="fav-job"><i class="la la-heart-o"></i></span>
                                                                <i>
                                                                    <?php
                                                                    echo date('d-m-Y', strtotime($key->created_date));
                                                                    // $insertdate=date('Y-m-d',strtotime($key->created_date));
                                                                    // $date1 = new DateTime($insertdate);
                                                                    // $current_date=date('Y-m-d');
                                                                    // $date2 = new DateTime($current_date);
                                                                    // $interval = $date1->diff($date2);
                                                                    // echo $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
                                                                    ?>
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 column">
                                    <div class="job-overview">
                                        <h3>Company Information</h3>
                                        <ul>
                                            <li>
                                                <i class="la la-eye"></i>
                                                <h3>Viewed</h3>
                                                <span><?= @$userdata->view_count ?></span>
                                            </li>
                                            <li>
                                                <i class="la la-file-text"></i>
                                                <h3>Posted Jobs</h3>
                                                <span><?= @$total_post; ?></span>
                                            </li>
                                            <li>
                                                <i class="la la-map"></i>
                                                <h3>Location</h3>
                                                <span>
                                                    <?php
                                                    @$userdata->address;
                                                    $splitAddress = explode(',', @$userdata->address);
                                                    $numItems = count($splitAddress);
                                                    $i = 0;
                                                    foreach ($splitAddress as $key => $value) {
                                                        if (0 === --$numItems) {
                                                            echo $value;
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                            </li>

                                            <?php
                                            //$skills = $this->db->query("SELECT group_concat(required_key_skills) as skill FROM postjob WHERE user_id = '".$userdata->userId."'")->result_array();
                                            //if(!empty($skills[0]['skill'])) {
                                            ?>
                                            <!-- <li>
                                                <i class="la la-bars"></i>
                                                <h3>Skills</h3>
                                                <span>
                                                <?php echo $uniq_skill = implode(', ', array_unique(explode(',', $skills[0]['skill']))); ?>
                                                </span>
                                            </li> -->
                                            <?php // }
                                            ?>
                                            <?php if (!empty(@$userdata->foundedyear)) { ?>
                                                <li>
                                                    <i class="la la-clock-o"></i>
                                                    <h3>Since</h3>
                                                    <span><?= @$userdata->foundedyear; ?></span>
                                                </li>
                                            <?php } ?>
                                            <!-- <li>
                                                <i class="la la-users"></i>
                                                <h3>Team Size</h3>
                                                <span>
                                                    <?php if ($userdata->teamsize > '10000') {
                                                        echo "10000+";
                                                    } else {
                                                        echo $userdata->teamsize;
                                                    }
                                                    ?>
                                                </span>
                                            </li>
                                            <li>
                                                <i class="la la-users"></i>
                                                <h3>TAX ID</h3>
                                                <span>
                                                    <?php echo $userdata->teamsize; ?>
                                                </span>
                                            </li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                    <div class="Product_Details">
                                        <?php if (!empty($prod_list)) { ?>
                                            <h3 class="mt-5 mb-5">Products</h3>
                                        <?php } ?>
                                        <div class="row">
                                            <?php if (!empty($prod_list)) {
                                                $i = 1;
                                                foreach ($prod_list as $value) { ?>
                                                    <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                        <div class="Product">
                                                            <div class="Product_Img">
                                                                <img src="<?php echo base_url() ?>uploads/products/<?php echo $value['prod_image'] ?>">
                                                            </div>
                                                            <div class="Product_Data">
                                                                <p class="mt-2 mb-2"><span><?php echo $value['prod_name'] ?></span></p>
                                                                <p><span>
                                                                        <?php
                                                                        $string = strip_tags($value['prod_description']);
                                                                        if (strlen($string) > 200) {
                                                                            $stringCut = substr($string, 0, 100);
                                                                            $endPoint = strrpos($stringCut, ' ');
                                                                            $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                                            $string .= '...';
                                                                        }
                                                                        echo $string;
                                                                        ?>
                                                                    </span>
                                                                </p>
                                                                <a href="<?php echo base_url() ?>productdetail/<?php echo base64_encode($value['id']) ?>" type="button" class="btn btn-info">Contact Seller</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php $i++;
                                                }
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="Map_Viwe" id="MapView">
    <div class="Map_Module">
        <span class="Close_Icon" id="MapClose"><i class="fa fa-times" aria-hidden="true"></i></span>
        <div class="Map_Container">
            <iframe src="https://maps.google.it/maps?q=<?= @$userdata->address ?>&output=embed" height="70%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
<script>
function show_map() {
    $('#show_maping').show();
}
$(".job-thumb").click(function() {
    $("#status-options").toggle();
});
$("#status-options ul li").click(function() {
    $("#profile-img").removeClass();
    $("#status-online").removeClass("active");
    $("#status-away").removeClass("active");
    $("#status-busy").removeClass("active");
    $("#status-offline").removeClass("active");
    $(this).addClass("active");
    if ($("#status-online").hasClass("active")) {
        $("#profile-img").addClass("online");
    } else if ($("#status-away").hasClass("active")) {
        $("#profile-img").addClass("away");
    } else if ($("#status-busy").hasClass("active")) {
        $("#profile-img").addClass("busy");
    } else if ($("#status-offline").hasClass("active")) {
        $("#profile-img").addClass("offline");
    } else {
        $("#profile-img").removeClass();
    };
    //$("#status-options").toggle();
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" async="" src="<?php echo base_url(); ?>assets/js/Map_Modal.js"></script>
<style>
.CustomBlockDesign {position: relative; height: 300px;}
.CustomBlockDesign img {width: 100%; height: 100%; border-radius: 15px; object-fit: cover;}
.CustomBlockDesign .CustomContainer {padding: 10px 15px !important; position: absolute; bottom: 0; background: rgb(0 0 0 / 20%); backdrop-filter: blur(5px); width: 100%; border-radius: 0 0 15px 15px;}
.CustomBlockDesign .CustomContainer .job-title-sec h3,
.CustomBlockDesign .CustomContainer .job-title-sec span {color: #fff !important;}
.CustomBlockDesign .CustomContainer .job-title-sec .job-lctn,
.CustomBlockDesign .CustomContainer .job-title-sec .job-lctn i {color: #fff !important;}
.job-style-bx i, .job-style-bx .fav-job i {color: #fff !important;}
#status-options {width: 180px; border-radius: 6px; z-index: 99; line-height: initial; background: #435f7a; transition: 0.3s all ease; position: absolute; bottom: 0px; left: 15px; bottom: 0px; left: 15px; border: 1px solid #eee; padding: 10px; text-align: center;}
.job-thumb .active {opacity: 1; visibility: visible; margin: 75px 0 0 0;}
</style>