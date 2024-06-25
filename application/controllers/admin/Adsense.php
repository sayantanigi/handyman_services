<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Adsense extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Adsensemodel');
	}
	function index() {
		$get_adsence=$this->Crud_model->GetData('adsence');
		$header = array('title' => 'AdSense');
		$data = array(
			'heading' => 'AdSense',
			'get_adsence' => $get_adsence
		);
		$this->load->view('admin/header', $header);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/adsence/list',$data);
		$this->load->view('admin/footer');
	}
	function ajax_manage_page() {
		$cond = "1=1";
		$adsence = $_POST['SearchData6'];
		$from_date = $_POST['SearchData5'];
		//print_r($from_date); exit;
		//$to_date = $_POST['SearchData7'];
		if($adsence!='') {
			$cond .=" and adsence.id  = '".$adsence."' ";
		}
		if($from_date!='') {
			$cond .=" and adsence.created_date  >= '".date('Y-m-d',strtotime($from_date))."' ";
		}
		// if($to_date!='') {
		// 	$cond .=" and adsence.created_date  <= '".date('Y-m-d',strtotime($to_date))."' ";
		// }
		$GetData = $this->Adsensemodel->get_datatables($cond);
		if(empty($_POST['start'])) {
			$no=0;
		} else {
			$no =$_POST['start'];
		}
		$data = array();
		foreach ($GetData as $row) {
			$btn = ''.'<span class="btn btn-sm bg-success-light mr-2" data-toggle="modal" data-target="#editModal" onclick="getValue('.$row->id.')" data-placement="right"><i class="far fa-edit mr-1"></i> Edit</span>';
			$btn .= ' | '.'<span data-placement="right" class="btn btn-sm btn-danger mr-2" onclick="adsenceDelete(this,'.$row->id.')" style="margin-left: 8px;">Delete</span>';
			if(!empty($row->image)) {
				if(!file_exists("uploads/adsence/".$row->image)) {
					$img ='<img class="rounded service-img mr-1" src="'.base_url('uploads/no_image.png').'">';
				} else {
					$img ='<a href="'.base_url('uploads/adsence/'.$row->image).'" data-lightbox="roadtrip"><img class="rounded service-img mr-1"src="'.base_url('uploads/adsence/'.$row->image).'"><a>';
				}
			} else {
				$img ='<img class="rounded service-img mr-1" src="'.base_url('uploads/no_image.png').'">';
			}
			$no++;
			$nestedData = array();
			$nestedData[] = $no;
			$nestedData[] = $img.' '.ucwords($row->title);
			$nestedData[] = date('d-m-Y',strtotime($row->created_date));
			$nestedData[] = $btn;
			$data[] = $nestedData;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Adsensemodel->count_all($cond),
			"recordsFiltered" => $this->Adsensemodel->count_filtered($cond),
			"data" => $data,
		);
		echo json_encode($output);
	}
	public function create_action() {
		$get_data=$this->Crud_model->get_single('adsence',"title='".$_POST['title']."'");
		if(isset($_FILES['image']['name'])!='' ) {
			$_POST['image']= rand(0000,9999)."_".$_FILES['image']['name'];
			$config2['image_library'] = 'gd2';
			$config2['source_image'] =  $_FILES['image']['tmp_name'];
			$config2['new_image'] =   getcwd().'/uploads/adsence/'.$_POST['image'];
			$config2['upload_path'] =  getcwd().'/uploads/adsence/';
			$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg';
			$config2['maintain_ratio'] = FALSE;
			$this->image_lib->initialize($config2);
			if(!$this->image_lib->resize()) {
				echo('<pre>');
				echo ($this->image_lib->display_errors());
				exit;
			} else {
				$image  = $_POST['image'];
			}
		} else {
			$image  = "";
		}
		if(empty($get_data)) {
			$data=array(
				'title'=>$_POST['title'],
				'image'=>$image,
				'created_date'=>date('Y-m-d H:i:s'),
			);
			$this->db->insert('adsence',$data);
			$this->session->set_flashdata('message', 'AdSence created successfully');
			echo "1"; exit;
		} else {
			$this->session->set_flashdata('message', 'Something went wrong. Please try again later!');
			echo "0"; exit;
		}
	}
	public function get_value() {
		$adsence_data=$this->Crud_model->get_single('adsence',"id='".$_POST['id']."'");
		if(!empty($adsence_data->image)) {
			if(!file_exists("uploads/adsence/".$adsence_data->image)) {
				$img ='<img class="rounded service-img mr-1" src="'.base_url('adsence/no_image.png').'">';
			} else {
				$img ='<img  class="rounded service-img mr-1" src="'.base_url('uploads/adsence/'.$adsence_data->image).'" >';
			}
		} else {
			$img ='<img class="rounded service-img mr-1" src="'.base_url('uploads/no_image.png').'">';
		}
		$data=array(
			'id'=>$adsence_data->id,
			'title'=>$adsence_data->title,
			'image'=>$img,
			'old_image'=>$adsence_data->image,
		);
		echo json_encode($data);exit;
	}
	function update_action() {
		if(isset($_FILES['image']['name'])!='' ) {
			$_POST['image']= rand(0000,9999)."_".$_FILES['image']['name'];
			$config2['image_library'] = 'gd2';
			$config2['source_image'] =  $_FILES['image']['tmp_name'];
			$config2['new_image'] =   getcwd().'/uploads/adsence/'.$_POST['image'];
			$config2['upload_path'] =  getcwd().'/uploads/adsence/';
			$config2['allowed_types'] = 'JPG|PNG|JPEG|jpg|png|jpeg';
			$config2['maintain_ratio'] = FALSE;
			$this->image_lib->initialize($config2);
			if(!$this->image_lib->resize()) {
				echo('<pre>');
				echo ($this->image_lib->display_errors());
				exit;
			} else {
				$image  = $_POST['image'];
				@unlink('uploads/adsence/'.$_POST['old_image']);
			}
		} else {
			$image  = $_POST['old_image'];
		}
		$get_data=$this->Crud_model->get_single_record('adsence',"title='".$_POST['title']."' and id!='".$_POST['id']."'");
		if(empty($get_data)) {
			$data = array(
				'title'=> $_POST['title'],
				'image'=>$image,
				'update_date'=>date('Y-m-d H:i:s'),
			);
			$this->Crud_model->SaveData('adsence',$data,"id='".$_POST['id']."'");
			$this->session->set_flashdata('message', 'AdSense updated successfully');
			echo 1; exit;
		} else{
			$this->session->set_flashdata('message', 'Something went wrong. Please try again later!');
			echo 0; exit;
		}
	}
	public function delete() {
        $this->Crud_model->DeleteData('adsence',"id='".$_POST['cid']."'");
		$this->session->set_flashdata('message', 'AdSense deleted successfully');
    }
}
