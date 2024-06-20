<section class="topak">
    <div class="block no-padding">
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-featured-sec">
                        <ul class="main-slider-sec text-arrows">
                            <li class="slideHome">
                                <?php if(!empty($get_banner->image) && file_exists('uploads/banner/'.$get_banner->image)){?>
                                <img src="<?=base_url('uploads/banner/'.$get_banner->image); ?>" alt="" />
                                <?php } else{?>
                                <img src="<?=base_url(); ?>assets/images/resource/mslider1.jpg" alt="" />
                                <?php } ?>
                            </li>
                        </ul>
                        <div class="job-search-sec">
                            <div class="job-search">
                                <h3>Easiest way to book the nearest handyman</h3>
                                <span>Search for all types of handymen</span>
                                <form method="post" action="<?= base_url('search-work')?>">
                                    <div class="row" style="align-items: center !important; flex-direction: column;">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <div class="job-field frmSearch">
                                                <input type="text" name="category_id" id="search-box" placeholder="Search By Category" value="" />
                                                <i class="la la-search"></i>
                                            </div>
                                            <div id="suggesstion-box"></div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <div class="job-field frmSearch">
                                            <input type="text" name="location" id="location" value="<?= @$loc ?>" placeholder="Location..." />
                                            <input type="hidden" id="search_lat" name="s_lat" value="<?= @$lat ?>">
                                            <input type="hidden" id="search_lon" name="s_lon" value="<?= @$lon ?>">
                                            </div>
                                            <div id="suggesstion-box"></div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search-btn">
                                            <button type="submit"><i class="la la-search"></i></button>
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

<section>
    <div class="block Opp_Block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Handyman Services Opportunities</h2>
                        <span>Look for the latest jobs posted on the portal.</span>
                    </div>
                    <div class="blog-sec">
                        <div class="row">
                            <?php if(!empty($get_post)) {
                            foreach($get_post as $row){
                            if(strlen($row->description)>200) {
                                $desc=substr($row->description,0,200).'...';
                            } else {
                                $desc=$row->description;
                            } ?>
                            <?php $get_user = $this->db-> query("SELECT * FROM users WHERE userId = '$row->user_id'")->result_array(); ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="my-blog"
                                    onclick="location.href='<?= base_url('workdetail/'.base64_encode($row->id))?>';">
                                    <div class="blog-details">
                                        <?php
                                        $getJobImage = $this->db->query("SELECT * FROM postjob_image WHERE job_id = '".$row->id."'")->row();
                                        $jobimage = base_url("uploads/postjob/".$getJobImage->job_image);
                                        ?>
                                        <img src="<?= $jobimage; ?>" />
                                        <div class="Blog-Emp-Details">
                                            <div class="Blog-Emp-Img">
                                                <?php if (!empty($get_user[0]['profilePic'])) { ?>
                                                <img src="<?php echo base_url('uploads/users/'.$get_user[0]['profilePic']);?>">
                                                <?php } else {?>
                                                <img src="<?php echo base_url('uploads/users/user.png');?>">
                                                <?php } ?>
                                            </div>
                                            <div class="Blog-Emp-Data">
                                                <?php if(!empty($row->post_title)) {
                                                    if(strlen($row->post_title)>30) {
                                                        $title = substr($row->post_title,0,30).'...';
                                                    } else {
                                                        $title = $row->post_title;
                                                    }
                                                } else {
                                                    $title = '';
                                                } ?>
                                                <p><?= ucfirst($title)?></p>
                                                <?php $get_user = $this->db-> query("SELECT * FROM users WHERE userId = '$row->user_id'")->result_array();?>
                                                <p>By <?php echo $get_user[0]['companyname']?></p>
                                            </div>
                                        </div>
                                        <!-- <h3 class="nkash"><a href="javascript:void(0)" title="">Description</a></h3> -->
                                        <!-- <p><?= ucfirst(strip_tags($desc))?></p> -->
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
                <?php if(count($get_post) > 6) { ?>
                <div class="col-lg-12">
                    <div class="browse-all-cat">
                        <a href="<?= base_url('findwork')?>" title="">View More</a>
                    </div>
                </div>
                <?php } ?>
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
                            if(!empty($get_users)){
                                foreach($get_users as $user) {
                                if(strlen($user->short_bio)>200) {
                                    $shortbio=substr($user->short_bio,0,200).'...';
                                } else {
                                    $shortbio=$user->short_bio;
                                }
                            if(!empty($user->firstname) && !empty($user->lastname) && !empty($user->email) && !empty($user->gender) && !empty($user->address) && !empty($user->short_bio)) {
                            ?>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="my-blog">
                                    <div class="blog-thumbak">
                                        <a href="<?= base_url('professionals_detail/'.base64_encode(@$user->userId))?>" title="">
                                            <?php if(!empty($user->profilePic)&& file_exists('uploads/users/'.$user->profilePic)){?>
                                            <img src="<?=base_url('uploads/users/'.$user->profilePic); ?>" alt="" style="height: 300px;" />
                                            <?php } else{?>
                                            <img src="<?=base_url('uploads/no_image.png'); ?>" alt="" style="height: 300px;" />
                                            <?php } ?>
                                        </a>
                                    </div>
                                    <div class="blog-details">
                                        <div class="blog-head">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <ul class="gigasjh">
                                                        <li>Member Since</li>
                                                        <li><?php echo date('m/d/Y', strtotime(@$user->created));?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $user_rating = $this->db->query("SELECT AVG(rt.rating) as rate FROM employer_rating rt WHERE rt.worker_id = '".@$user->userId."'")->result();
                                        ?>
                                        <div class="staak">
                                            <?php
                                            if($user_rating[0]->rate > 0) {
                                                for ($i = 0; $i < $user_rating[0]->rate; $i++) {
                                            ?>
                                            <span class="fa fa-star checked"></span>
                                            <?php }
                                            } else { ?>
                                            <span class="">Not Rated Yet</span>
                                            <?php } ?>
                                        </div>
                                        <?php if(!empty($_SESSION['afrebay']['userId'])) {?>
                                        <h3 class="nkash">
                                            <a type="button" class="btn" href="<?= base_url('professionals_detail/'.base64_encode(@$user->userId))?>" title="">
                                                <?php if(!empty($user->firstname)){ echo $user->firstname.' '.$user->lastname; } else{ echo ucfirst($user->username);}?>
                                            </a>
                                        </h3>
                                        <?php } else { ?>
                                        <h3 class="nkash">
                                            <a type="button" class="btn" href="javascript:void(0)" title="" onclick= "viewProfile()">
                                                <?php if(!empty($user->firstname)){ echo $user->firstname.' '.$user->lastname; } else{ echo ucfirst($user->username);}?>
                                            </a>
                                        </h3>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php }}} ?>
                        </div>
                    </div>
                </div>
                <?php if(count($getTotalworkers) > 8) { ?>
                <div class="col-lg-12">
                    <div class="browse-all-cat">
                        <a href="<?= base_url('professionals')?>" title="">View More</a>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2>Our Services</h2>
                        <span>Looking for a reliable and outstanding business process outsourcing partner? Look no further. With Handyman Services, you no longer have to worry about employing the best service provider for your customer. Our focus is to ensure you get professional expertise needed to make your business grow.</span>
                    </div>
                    <div class="cat-sec">
                        <div class="row no-gape">
                            <?php if(!empty($get_ourservice)){
                            foreach($get_ourservice as $item){
                                //$get_category=$this->Crud_model->get_single('category',"id='".$item->category_id."'");
                                if(strlen($item['description'])>100) {
                                    $description=substr($item['description'],0,100).'...';
                                } else {
                                    $description=$item['description'];
                                }
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="p-category">
                                    <a href="<?php echo base_url('contact-us')?>" title="">
                                        <img src="<?php echo base_url()?>uploads/services/<?php echo $item['icon']?>" style="width: 100%; height: 150px; object-fit: cover; border-radius: 10px;">
                                        <?php if(!empty($item['category_name'])) { ?>
                                        <span><?= ucfirst($item['category_name'])?></span>
                                        <?php } else { ?>
                                        <span></span>
                                        <?php } ?>
                                        <?php if(!empty($description)) { ?>
                                        <p><?= ucfirst(strip_tags($description));?></p>
                                        <?php } else { ?>
                                        <p></p>
                                        <?php } ?>
                                    </a>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="block double-gap-top double-gap-bottom">
        <?php if(!empty($get_banner_middle->image) && file_exists('uploads/banner/'.$get_banner_middle->image)) {
            $image = base_url('uploads/banner/'.$get_banner_middle->image);
        ?>
        <div data-velocity="-.1" style="background: url('<?php echo $image?>') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div>
        <?php } else{?>
        <div data-velocity="-.1" style="background: url('<?=base_url(); ?>assets/images/resource/parallax1.jpg') repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="simple-text-block">
                        <h3>Get access to the best handyman jobs near you.</h3>
                        <span>Create your account here</span>
                        <?php if(empty($_SESSION['afrebay']['userId'])){?>
                        <a href="<?= base_url('signup')?>" title="">Create an Account</a>
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
                        <?php if(!empty($get_company)) {
                        foreach($get_company as $item) { ?>
                        <div class="company-img">
                            <a href="javascript:void(0)" title="">
                                <?php if(!empty($item->logo)&& file_exists('uploads/company_logo/'.$item->logo)){?>
                                <img src="<?=base_url('uploads/company_logo/'.$item->logo); ?>" alt="" />
                                <?php } else { ?>
                                <img src="<?=base_url(); ?>assets/images/resource/b1.jpg" alt="" />
                                <?php } ?>
                            </a>
                        </div>
                        <?php } }?>
                    </div>
                </div>
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
                            <?php if(!empty($get_career)){ foreach($get_career as $career){
                            if(strlen($career->description)>100) {
                                $desc=substr($career->description,0,100).'...';
                            } else {
                                $desc=$career->description;
                            }
                            ?>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="my-blog">
                                    <div class="blog-thumb">
                                        <a href="<?= base_url('career-tips/'.$career->slug)?>" title="">
                                            <?php if(!empty($career->image)&& file_exists('uploads/career/'.$career->image)){?>
                                            <img src="<?=base_url('uploads/career/'.$career->image); ?>" alt="" />
                                            <?php } else{?>
                                            <img src="<?=base_url(); ?>assets/images/resource/b1.jpg" alt="" />
                                            <?php } ?>
                                        </a>
                                        <div class="blog-metas">
                                            <a href="javascript:void(0)"
                                                title=""><?= date('M d,Y',strtotime($career->tipsdate))?></a>
                                            <a href="javascript:void(0)" title="">0 Comments</a>
                                        </div>
                                    </div>
                                    <div class="blog-details">
                                        <h3><a href="<?= base_url('career-tips/'.$career->slug)?>" title=""><?= ucfirst($career->title)?></a></h3>
                                        <div><?= ucfirst($desc)?></div>
                                        <a href="<?= base_url('career-tips/'.$career->slug)?>" title=""><span>Read More</span></a>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
                <?php if(count($getTotalcareer) > 3) { ?>
                <div class="col-lg-12">
                    <div class="browse-all-cat">
                        <a href="<?= base_url('career-tips')?>" title="">View More</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<style>
.chosen_country {color: #888888; height: 60px; border-radius: 50px; padding: 17px !important;}
#state {display: block;color: #888888; height: 60px; border-radius: 50px; padding: 17px !important;}
#city {display: block;color: #888888; height: 60px; border-radius: 50px; padding: 17px !important;}
.jconfirm-content-pane{text-align: center; font-size: 18px;}
.jconfirm-buttons{margin-right: 140px; display: inline-block;}
#country-list {float: left; list-style: none; margin-top: 60px; padding: 0; width: 98%; position: absolute; z-index: 1;}
#country-list li {padding: 10px 30px; background: #ffffff; margin: 0px !important; border-radius: 10px; border-bottom: 1px solid #eee;}
#country-list li:hover {background: #ece3d2; cursor: pointer;}
/* #search-box {padding: 10px; border: #a8d4b1 1px solid; border-radius: 4px;} */
::-webkit-scrollbar {width: 10px;background-color: transparent;}
::-webkit-scrollbar-track {background: transparent;}
::-webkit-scrollbar-thumb {background: #888;border-radius: 5px;}
::-webkit-scrollbar-thumb:hover {background: #555;}
</style>
<script>
$(window).load(function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLocation);
    } else {
        $('#location').html('Geolocation is not supported by this browser.');
    }
});
$(document).ready(function() {
    var base_url = $("#base_url").val();
    var id = 'United States';
    $.ajax({
        type:"post",
        cache:false,
        url:base_url+"Welcome/states_by_country",
        data:{country_name:id},
        beforeSend:function(){},
        success:function(returndata) {
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
			url: base_url+"Welcome/get_category_list",
			data: {category_name: text},
			beforeSend: function() {
				$("#search-box").css("background", "#FFF url(<?php base_url()?>uploads/LoaderIcon.gif) no-repeat 165px");
			},
			success: function(data) {
                //console.log(data);
				$("#suggesstion-box").show();
				$("#suggesstion-box").html(data);
				$("#search-box").css("background", "#FFF");
			}
		});
	});
})
function getState(val) {
    var base_url = $("#base_url").val();
    var id = val;
    $.ajax({
        type:"post",
        cache:false,
        url:base_url+"Welcome/states_by_country",
        data:{
            country_name:id
        },
        beforeSend:function(){},
        success:function(returndata) {
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
        type:"post",
        cache:false,
        url:base_url+"Welcome/cities_by_state",
        data:{
            state_name:id
        },
        beforeSend:function(){},
        success:function(returndata) {
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
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtg6oeRPEkRL9_CE-us3QdvXjupbgG14A&libraries=places&callback=initMap"></script>
<script type="text/javascript">
$(document).ready(function () {
    var location = {
        latitude: '',
        longitude: ''
    };
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    else {
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
            geocoder.geocode({ 'latLng': latLng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log(results);
                    $('#location').val(results[0].formatted_address);
                }
                else {
                    $('#location').html('Geocoding failed: ' + status);
                    console.log("Geocoding failed: " + status);
                }
            }); //geocoder.geocode()
        }
    } //showPosition
});
</script>