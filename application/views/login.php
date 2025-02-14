<?php
$get_setting = $this->Crud_model->get_single('setting');
if (!empty($get_banner->image) && file_exists('uploads/banner/' . $get_banner->image)) {
    $banner_img = base_url("uploads/banner/" . $get_banner->image);
} else {
    $banner_img = base_url("assets/images/resource/mslider1.jpg");
} ?>
<style>
#register-messages { text-align: center; margin-top: 25px; display: none; }
#register-messages-notemail { text-align: center; margin-top: 25px; display: none; }
/* #err-messages { text-align: center; margin-top: 10px; display: none; } */
</style>
<div class="shutter left"></div>
<div class="shutter right"></div>
<div class="content">
    <section>
        <video autoplay muted loop class="background-video">
            <source src="<?= base_url(); ?>assets/video/backg-video.mp4" type="video/mp4">
        </video>
    </section>
    <section class="max_height">
        <div class="block remove-bottom Sign_Up">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 regcontent">
                        <img class="Logo_Style" src="<?= base_url(); ?>uploads/logo/<?= $get_setting->flogo ?>">
                        <?= htmlspecialchars_decode($get_setting->register_body_header); ?>
                        <?= htmlspecialchars_decode($get_setting->register_body_content); ?>
                    </div>
                    <div class="col-lg-5">
                        <div class="logForm">
                            <div class="row m-0">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center mb-3">
                                    <a href="<?= base_url(); ?>">
                                        <img class="Logo_Style" style="width: 250px;" src="<?= base_url(); ?>uploads/logo/<?= $get_setting->flogo ?>">
                                    </a>
                                    <h3 class="h3 font-weight-bold Primary_Text_Color">Welcome Back</h3>
                                    <span>Enter your Username and Password</span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 SignIn_Right">
                                    <?php if ($this->session->flashdata('message')) { ?>
                                        <div id="register-messages" class="text-invalid f-20 text-center">
                                            <span class="text-invalid f-15" style="text-align: center; margin-bottom: 10px;">
                                                <?php
                                                echo $this->session->flashdata('message');
                                                unset($_SESSION['message']);
                                                ?>
                                            </span>
                                        </div>
                                    <?php } ?>
                                    <?php if ($this->session->flashdata('error')) { ?>
                                        <div id="err-messages">
                                            <span class="text-danger f-15 d-block" style="text-align: center; margin-bottom: 10px;">
                                                <?php echo $this->session->flashdata('error');
                                                unset($_SESSION['error']); ?>
                                            </span>
                                        </div>
                                    <?php } ?>
                                    <form action="<?= base_url(); ?>validate" method="post">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="cfield">
                                                    <div class="cfield_Input">
                                                        <input type="text" placeholder="username" name="email" class="form-control" />
                                                        <span class="iconkey">
                                                            <i class="la la-user"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="error text-left"><?php echo form_error('email'); ?></div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="cfield">
                                                    <div class="cfield_Input">
                                                        <input type="password" placeholder="password" name="password" id="login_pass" class="form-control" />
                                                        <span class="iconkey">
                                                            <i class="la la-key" onclick="checkPass()"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="error text-left"><?php echo form_error('password'); ?></div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 rememberme">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="remember-label m-0"><input type="checkbox" name="cb" id="cb1" /><label for="cb1">Remember me</label></p>
                                                    <div>
                                                        <a href="<?= base_url('forgot-password') ?>" title="" class="text-dark font-weight-bold">Forgot Password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-3 SignIn_Remember text-center"></div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 SignIn_Btn">
                                                <button type="submit" class="btn logbtn w-100 Gradient_Back_Color">Log In</button>
                                            </div>
                                            <!-- <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="extra-login">
                                                    <span>OR</span>
                                                    <div class="mt-3">
                                                        <a class="socialBtn" href="#" title=""><img src="<?= base_url(); ?>assets/images/google-icon.png"> Continue with Google</a>
                                                        <a class="socialBtn" href="#" title=""><img src="<?= base_url(); ?>assets/images/apple-icon.png"> Continue with Apple</a>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="logForm" style="width :48%; margin-top: 10px; display: flex; float: left; margin-right: 15px;">
                            <div class="col-lg-12 text-center">
                                <a href="<?= base_url() ?>signup" class="text-primary font-weight-bold">Join SideQuote</a>
                            </div>
                        </div>
                        <div class="logForm" style="width :48%; margin-top: 10px; display: flex; float: left; padding: 19px;">
                        <div class="col-lg-12 text-center">
                            <form id="signUp_form" action="<?= base_url()?>view_as_guest" method="post">
                                <input type="hidden" name="location_guest" id="location_guest" value="<?= @$loc ?>" placeholder="Set Location" />
                                <input type="hidden" id="search_lat_guest" name="s_lat_guest" value="<?= @$lat ?>">
                                <input type="hidden" id="search_lon_guest" name="s_lon_guest" value="<?= @$lon ?>">
                                <input type="submit" class="text-primary font-weight-bold" name="submit" value="Proceed as Guest" style="border: none; background: none;">
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<style>
#loader {
    display: none;
    width: 40px;
}
header {
    display: none !important;
}
</style>
<script src="<?= base_url('assets/js/jquery.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url('assets/custom_js/register.js') ?>"></script>
<script>
window.addEventListener('load', () => {
    document.body.classList.add('loaded');
});
function forgotPass() {
    var email = $('#forget_email').val();
    var base_url = $('#base_url').val();
    $.ajax({
        url: base_url + "user/login/send_forget_password",
        method: "POST",
        data: {
            email: email
        },
        success: function(data) {
            //alert(data);
            if (data == '1') {
                $('.text-success-msg').show();
                setTimeout(function() {
                    $('.text-success-msg').hide();
                }, 2500);
            } else if (data == '2') {
                $('.text-error').show();
                setTimeout(function() {
                    $('.text-error').hide();
                }, 2500);
            } else if (data == '3') {
                $('.text-danger').show();
                setTimeout(function() {
                    $('.text-danger').hide();
                }, 2500);
            } else {
                $('.text-danger').show();
                setTimeout(function() {
                    $('.text-danger').hide();
                }, 2500);
            }
        }

    })
}

function checkPass() {
    var x = document.getElementById("login_pass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>