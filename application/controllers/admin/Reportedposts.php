<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reportedposts extends MY_Controller {
    public function __construct() {
        parent::__construct();
    }
    function index() {
        $header = array('title' => 'reportedposts');
        $data = array(
            'heading' => 'Reported Posts',
            'reportPostList' => $this->db->query("SELECT * FROM report_post")->result_array()
        );
        $this->load->view('admin/header', $header);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/reportedposts/list',$data);
        $this->load->view('admin/footer');
    }
    public function change_status() {
        if($_POST['status']=='1') {
            $statuss='0';
        } else if($_POST['status']=='0'){
            $statuss='1';
        }
        $data=array(
            'status'=>$statuss,
        );
        $this->Crud_model->SaveData("users",$data,"userId='".$_POST['id']."'");
    }
    public function delete() {
        if(isset($_POST['cid'])) {
            $getUserDetails = $this->db->query("Select userId, userType FROM users WHERE userId = '".$_POST['cid']."'")->result_array();
            if(@$getUserDetails[0]['userType'] == '1') {
                $this->Crud_model->DeleteData('chat',"userfrom_id = '".@$getUserDetails[0]['userId']."' OR userto_id = '".@$getUserDetails[0]['userId']."'");
                $this->Crud_model->DeleteData('user_education',"user_id='".@$getUserDetails[0]['userId']."'");
                $this->Crud_model->DeleteData('user_workexperience',"user_id='".@$getUserDetails[0]['userId']."'");
                $checkBid = $this->db->query("SELECT * FROM job_bid WHERE user_id = '".@$getUserDetails[0]['userId']."'")->result_array();
                if(!empty($checkBid)) {
                    $this->Crud_model->DeleteData('job_bid',"user_id='".@$getUserDetails[0]['userId']."'");
                }
            } else {
                $this->Crud_model->DeleteData('chat',"userfrom_id = '".@$getUserDetails[0]['userId']."' OR userto_id = '".@$getUserDetails[0]['userId']."'");
                $postJob = $this->db->query("SELECT id FROM postjob WHERE user_id = '".@$getUserDetails[0]['userId']."'")->result_array();
                foreach ($postJob as $value) {
                    $checkBid = $this->db->query("SELECT * FROM job_bid WHERE postjob_id = '".$value['id']."'")->result_array();
                    if(!empty($checkBid)) {
                        $this->Crud_model->DeleteData('job_bid',"postjob_id='".$value['id']."'");
                    }
                }
                $this->Crud_model->DeleteData('postjob',"user_id='".@$getUserDetails[0]['userId']."'");
                $userProduct = $this->db->query("SELECT id FROM user_product WHERE user_id = '".@$getUserDetails[0]['userId']."'")->result_array();
                foreach ($userProduct as $value) {
                    $checkProdImg = $this->db->query("SELECT id FROM user_product_image WHERE prod_id = '".$value['id']."'")->result_array();
                    if(!empty($checkProdImg)) {
                        $this->Crud_model->DeleteData('user_product_image',"prod_id='".$value['id']."'");
                    }
                }
                $this->Crud_model->DeleteData('user_product',"user_id='".@$getUserDetails[0]['userId']."'");
            }
            $this->Crud_model->DeleteData('users',"userId='".@$getUserDetails[0]['userId']."'");
        }
    }
}