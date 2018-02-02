<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
class Admin extends CI_Controller {

	public function __construct(){
	  
	  parent::__construct();
	  $this->load->model('admin_model');
	   
	}
	
	public function index(){
		
		$this->load->view('admin/login');
		
	}
	
	public function login(){
		
		if($this->input->post('login')){
			//echo "<pre>";print_r($_POST);exit;
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if($this->form_validation->run()!= FALSE){
				echo"shib";
				$param = array(
							"username" => trim($this->input->post('username')),
							"password" => md5(trim($this->input->post('password')))
						);
				echo $res = $this->admin_model->login($param)->num_rows();
				
				if($res == 1){
					echo"hi";
					$result = $this->admin_model->login($param)->row();
					$this->load->library('session');
					$sess_data = array(
									   "uid" => $result->id,
									   "uname" => $result->username,
									   "is_admin_logged_in" => 1
									   );
					$this->session->set_userdata($sess_data);
					redirect("admin/show_product");
				}
				else{
					$this->session->set_flashdata('msg_error', "User doesn't exist.");
					$this->load->view('admin/login');
				}
				
			}
			else{
				
				$this->session->set_flashdata('msg_error', validation_errors());
				$this->load->view('admin/login');
			}
			
		}
		else{
			
			$this->load->view('admin/login');
		}
		
		
	}
	
	
	public function logout(){
		
		if($this->session->userdata('is_admin_logged_in') == 1){
			
			$sess_data = array(
								"uid" => "",
								"uname" => "",
								"is_admin_logged_in" => ""
							);
			$this->session->unset_userdata($sess_data);
			
			$this->session->sess_destroy();
			
			redirect("admin/login");
			
		}
		else{			
				$this->load->view('admin/login');
		}
	}
	
	public function Show_product(){
		
		if($this->session->userdata('is_admin_logged_in') == 1){
			
			$prd = $prod = $this->admin_model->GetProduct()->result();
		
			foreach($prd as $Key => $p){
				$pp = $this->db->query("select * from product_image where pid =".$p->p_id." limit 0,1")->row();
				$pimage = $pp->p_image;
				$prod[$Key]->p_image = $pimage;
			}
			
			$data['prod'] = $prod;
			$this->load->view('admin/show_product', $data);
			
		}
		else{
			redirect("admin/login");
		}
		
	}
	
	
	public function addProduct(){
		
		if($this->session->userdata('is_admin_logged_in') == 1){
		
			$data['cate'] = $this->db->query("select * from cetegory")->result();
			$data['subcate'] = $this->db->query("select * from sub_cetegory")->result();
			$data['brnd'] = $this->db->query("select * from brand_name")->result();
			
			if($this->input->post('add_prod')){
				
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
				$this->form_validation->set_rules('s_id', 'Subcategory', 'trim|required');
				$this->form_validation->set_rules('brand_name', 'Brand', 'trim|required');
				$this->form_validation->set_rules('p_name', 'Product Name', 'trim|required');
				$this->form_validation->set_rules('p_details', 'Product Details', 'trim|required');
				$this->form_validation->set_rules('quantity', 'Product Quantity', 'trim|required');
				$this->form_validation->set_rules('p_price', 'Product Price', 'trim|required');
				$this->form_validation->set_rules('p_sale', 'Product Sale', 'trim|required');
				$this->form_validation->set_rules('p_war', 'Product Warranty', 'trim|required');
				$this->form_validation->set_rules('p_color', 'Product Colour', 'trim|required');
				$this->form_validation->set_rules('p_dims', 'Product Dimension', 'trim|required');
				$this->form_validation->set_rules('features', 'Product Feature', 'trim|required');
				$this->form_validation->set_rules('bar_code', 'Product Barcode', 'trim|required');
				
				if ($this->form_validation->run() != FALSE){
					
					$table = "product";
					$data = array(
								"cat_id" => trim($this->input->post('cat_id')),
								"s_id" => trim($this->input->post('s_id')),
								"brand_name" => trim($this->input->post('brand_name')),
								"p_name" => trim($this->input->post('p_name')),
								"p_details" => trim($this->input->post('p_details')),
								"quantity" => trim($this->input->post('quantity')),
								"p_price" => trim($this->input->post('p_price')),
								"p_sale" => trim($this->input->post('p_sale')),
								"p_war" => trim($this->input->post('p_war')),
								"p_color" => trim($this->input->post('p_color')),
								"p_dims" => trim($this->input->post('p_dims')),
								"features" => trim($this->input->post('features')),
								"discount" => trim($this->input->post('discount')),
								"offer" => trim($this->input->post('offer')),
								"bar_code" => trim($this->input->post('bar_code'))
								);
					
					$res = $this->admin_model->addData($table, $data);
						
					$dir = "./resources/product_images/".$res;
					if (!file_exists($dir)) {
						mkdir($dir, 0777, true);
					}
					
					$files = $_FILES;
					//echo $dir;exit;
					$config['upload_path'] = $dir.'/';
					$config['allowed_types'] = 'gif|jpg|png';
					//$config['max_size']	= '100';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
					
					$this->load->library('upload', $config);
					
					foreach ($files['p_image']['name'] as $key => $image){
						
						$_FILES['multi_images']['name']= $image;
						$_FILES['multi_images']['type']= $files['p_image']['type'][$key];
						$_FILES['multi_images']['tmp_name']= $files['p_image']['tmp_name'][$key];
						$_FILES['multi_images']['error']= $files['p_image']['error'][$key];
						$_FILES['multi_images']['size']= $files['p_image']['size'][$key];
						
						$this->upload->initialize($config);
			
						if($this->upload->do_upload("multi_images")) {
							
							$upload_data = $this->upload->data();
							$table1 = "product_image";
							$data1 = array(
										"pid" => $res,
										"p_image" => $upload_data['file_name']
									);
							$res = $this->admin_model->addData($table1, $data1);
								
						}
						else {
							$error['upload_error'] = $this->upload->display_errors();
							print_r($error);exit;
						}
					}
					
					redirect("admin/show_product");
						
				}
				else{
					
					//$data['error'] = validation_errors();
					$this->session->set_flashdata('msg_error', validation_errors());
					$this->load->view('admin/add_edit_product', $data);
				}
				//echo "<pre>";print_r($_POST);
				//print_r($_FILES);exit;
			}
			else{
				$this->load->view('admin/add_edit_product', $data);
			}
		
		}
		else{
			redirect("admin/login");
		}
		
	}
	
	
	public function editProduct(){
		if($this->session->userdata('is_admin_logged_in') == 1){
		$pid = $this->uri->segment(3);
		
		$param = array(
					   "table" => "product",
					   "field_name" => "p_id",
					   "field_value" => $pid
					   );
		$data['prod'] = $this->admin_model->GetDatabyId($param)->row();
		
		$data['cate'] = $this->db->query("select * from cetegory")->result();
		$data['subcate'] = $this->db->query("select * from sub_cetegory")->result();
		$data['brnd'] = $this->db->query("select * from brand_name")->result();
		
		if($this->input->post('edit_prod')){
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
			$this->form_validation->set_rules('s_id', 'Subcategory', 'trim|required');
			$this->form_validation->set_rules('brand_name', 'Brand', 'trim|required');
			$this->form_validation->set_rules('p_name', 'Product Name', 'trim|required');
			$this->form_validation->set_rules('p_details', 'Product Details', 'trim|required');
			$this->form_validation->set_rules('quantity', 'Product Quantity', 'trim|required');
			$this->form_validation->set_rules('p_price', 'Product Price', 'trim|required');
			$this->form_validation->set_rules('p_sale', 'Product Sale', 'trim|required');
			$this->form_validation->set_rules('p_war', 'Product Warranty', 'trim|required');
			$this->form_validation->set_rules('p_color', 'Product Colour', 'trim|required');
			$this->form_validation->set_rules('p_dims', 'Product Dimension', 'trim|required');
			$this->form_validation->set_rules('features', 'Product Feature', 'trim|required');
			$this->form_validation->set_rules('bar_code', 'Product Barcode', 'trim|required');
			
			if ($this->form_validation->run() != FALSE){
				
				
				$param = array(
					   "table" => "product",
					   "field_name" => "p_id",
					   "field_value" => $pid
					   );
				$data = array(
							"cat_id" => trim($this->input->post('cat_id')),
							"s_id" => trim($this->input->post('s_id')),
							"brand_name" => trim($this->input->post('brand_name')),
							"p_name" => trim($this->input->post('p_name')),
							"p_details" => trim($this->input->post('p_details')),
							"quantity" => trim($this->input->post('quantity')),
							"p_price" => trim($this->input->post('p_price')),
							"p_sale" => trim($this->input->post('p_sale')),
							"p_war" => trim($this->input->post('p_war')),
							"p_color" => trim($this->input->post('p_color')),
							"p_dims" => trim($this->input->post('p_dims')),
							"features" => trim($this->input->post('features')),
							"discount" => trim($this->input->post('discount')),
							"offer" => trim($this->input->post('offer')),
							"bar_code" => trim($this->input->post('bar_code'))
							);
				
				$res = $this->admin_model->editData($param, $data);
				
				$this->session->set_flashdata('msg_success', 'Product updated successfully.');
				
				redirect("admin/show_product");
					
			}
			else{
				
				$this->session->set_flashdata('msg_error', validation_errors());
				$this->load->view('admin/add_edit_product', $data);
			}
			
		}
		else{
			$this->load->view('admin/add_edit_product', $data);
		}
		
		
		
	}
	else{
		redirect("admin/login");
	}
		
	}

	public function deleteProduct(){
		if($this->session->userdata('is_admin_logged_in') == 1){
		$pid = $this->uri->segment(3);
		$param = array(
					   "table" => "product_image",
					   "field_name" => "pid",
					   "field_value" => $pid
					   );
		
		$del = $this->admin_model->GetDatabyId($param)->result();
		
		foreach($del as $ddl){
			
			$path = "./product_images/".$pid."/".$ddl->p_image;
			unlink($path);
			
		}
		$this->db->query("delete from product_image where pid = ".$pid);
		
		$param1 = array(
					   "table" => "product",
					   "field_name" => "p_id",
					   "field_value" => $pid
					   );
		$this->admin_model->DeleteDatabyId($param1);
		
		$this->session->set_flashdata('msg_success', 'Product Deleted successfully.');
				
		redirect("admin/show_product");
		
	 }
	
	else{
			
			$this->load->view('admin/login');
		}
	}	
	public function show_category(){
		if($this->session->userdata('is_admin_logged_in') == 1){
		$data['cate'] = $this->admin_model->GetData("cetegory")->result();
		
		$this->load->view('admin/show_category', $data);
	 }
		else{			
			$this->load->view('admin/login');
		}
	}
	
	public function addCategory(){
			if($this->session->userdata('is_admin_logged_in') == 1){
			if($this->input->post('add_cate')){
				
				$this->load->library('form_validation');
				$this->form_validation->set_rules('cat_name', 'Category', 'trim|required');
				
				if ($this->form_validation->run() != FALSE){
					
					$cat_name = trim($this->input->post('cat_name'));
					
					$dir = "./resources/category_images/".$cat_name;
					if (!file_exists($dir)) {
						mkdir($dir, 0777, true);
					}
					
					$config['upload_path'] = $dir."/";
					$config['allowed_types'] = 'gif|jpg|png';
					//$config['max_size']	= '100';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
			
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload("c_image")){
						$this->session->set_flashdata('msg_error', $this->upload->display_errors());
						$this->load->view('admin/add_edit_category');
						
					}
					else{
						
						$upload_data = $this->upload->data();
						$table = "cetegory";
						$data = array(
									"cat_name" => $cat_name,
									"cat_image" => $upload_data['file_name']
								);
						$res = $this->admin_model->addData($table, $data);
						redirect("admin/show_category");
					}
				
				}
				else{
					
					$this->session->set_flashdata('msg_error', validation_errors());
					$this->load->view('admin/add_edit_category');
				}
				
			}
			else{
				
				$this->session->set_flashdata('msg_error', validation_errors());
				$this->load->view('admin/add_edit_category');
			}
			
		}
			else{			
				$this->load->view('admin/login');
				}
		
	}
	
	public function editCategory(){
		if($this->session->userdata('is_admin_logged_in') == 1){
			$cid = $this->uri->segment(3);
			
			$param = array(
						   "table" => "cetegory",
						   "field_name" => "cat_id",
						   "field_value" => $cid
						   );
			$data['cate'] = $this->admin_model->GetDatabyId($param)->row();
			
			if($this->input->post('edit_cate')){
				
				$this->load->library('form_validation');
				$this->form_validation->set_rules('cat_name', 'Category', 'trim|required');
				
				if ($this->form_validation->run() != FALSE){
					
					$cat_name = trim($this->input->post('cat_name'));
					
					$data = array(
								"cat_name" => $cat_name
							);
					
					if(!empty($_FILES)){
						
						$dir = "./resources/category_images/".$cat_name;
						if (!file_exists($dir)) {
							mkdir($dir, 0777, true);
						}
						
						$config['upload_path'] = $dir."/";
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_width']  = '1024';
						$config['max_height']  = '768';
				
						
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if (!$this->upload->do_upload("c_image")){
							$this->session->set_flashdata('msg_error', $this->upload->display_errors());
							$this->load->view('admin/add_edit_category', $data);
							
						}
						else{
							
							$upload_data = $this->upload->data();
							$data['cat_image'] = $upload_data['file_name'];
							
							$del = $this->admin_model->GetDatabyId($param)->row();
							$path = "./category_images/".$del->cat_name."/".$del->cat_image;
							unlink($path);
							
						}
						
					}
					
					$res = $this->admin_model->editData($param, $data);
					
					$this->session->set_flashdata('msg_success', 'Category updated successfully.');
					redirect("admin/show_category");
					
				
				}
				else{
					
					$this->session->set_flashdata('msg_error', validation_errors());
					$this->load->view('admin/add_edit_category', $data);
				}
				
			}
			else{
				
				$this->session->set_flashdata('msg_error', validation_errors());
				$this->load->view('admin/add_edit_category', $data);
			}
		}
		else{			
				$this->load->view('admin/login');
			}
	}
	
	public function deleteCategory(){
		if($this->session->userdata('is_admin_logged_in') == 1){
			$cid = $this->uri->segment(3);
			$param = array(
						   "table" => "cetegory",
						   "field_name" => "cat_id",
						   "field_value" => $cid
						   );
			
			$del = $this->admin_model->GetDatabyId($param)->row();
			
			$path = "./category_images/".$del->cat_name."/".$del->cat_image;
			unlink($path);
			
			
			$this->admin_model->DeleteDatabyId($param);
			
			$this->session->set_flashdata('msg_success', 'Category Deleted successfully.');
					
			redirect("admin/show_category");
		}
		else{			
				$this->load->view('admin/login');
			}
	}
	
	
	
	
	public function show_Subcategory(){
		if($this->session->userdata('is_admin_logged_in') == 1){
			$data['scate'] = $this->db->query("select s.*,c.cat_name from sub_cetegory s left join cetegory c on c.cat_id = s.cat_id")->result();
			
			$this->load->view('admin/show_subcategory', $data);
		}
		else{			
				$this->load->view('admin/login');
			}
	}
	
	public function addSubcategory(){
		if($this->session->userdata('is_admin_logged_in') == 1){	
			$data['cate'] = $this->db->query("select * from cetegory")->result();
				
			if($this->input->post('add_scate')){
				
				$this->load->library('form_validation');
				$this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
				$this->form_validation->set_rules('sub_name', 'Subcategory', 'trim|required');
				if ($this->form_validation->run() != FALSE){
					
					$table = "sub_cetegory";
					$data = array(
								"cat_id" => trim($this->input->post('cat_id')),
								"sub_name" => trim($this->input->post('sub_name'))	
								);
					
					$res = $this->admin_model->addData($table, $data);
					$this->session->set_flashdata('msg_success', 'Subcategory added successfully.');
					redirect("admin/show_Subcategory");
				
				}
				else{
					
					$this->session->set_flashdata('msg_error', validation_errors());
					$this->load->view('admin/add_edit_subcategory', $data);
				}
				
			}
			else{
				
				$this->load->view('admin/add_edit_subcategory', $data);
			}
		}
		else{			
				$this->load->view('admin/login');
			}		
	}
	
	public function editSubcategory(){
			if($this->session->userdata('is_admin_logged_in') == 1){	
			$sid = $this->uri->segment(3);
			
			$param = array(
						   "table" => "sub_cetegory",
						   "field_name" => "s_id",
						   "field_value" => $sid
						   );
			$data['scate'] = $this->admin_model->GetDatabyId($param)->row();
			
			$data['cate'] = $this->db->query("select * from cetegory")->result();
			
			if($this->input->post('edit_scate')){
				
				$this->load->library('form_validation');
				$this->form_validation->set_rules('cat_id', 'Category', 'trim|required');
				$this->form_validation->set_rules('sub_name', 'Subcategory', 'trim|required');
				
				if ($this->form_validation->run() != FALSE){
					
					$data = array(
								"cat_id" => trim($this->input->post('cat_id')),
								"sub_name" => trim($this->input->post('sub_name'))	
								);
					$res = $this->admin_model->editData($param, $data);
					
					$this->session->set_flashdata('msg_success', 'Subcategory updated successfully.');
					redirect("admin/show_Subcategory");
				
				}
				else{
					
					$this->session->set_flashdata('msg_error', validation_errors());
					$this->load->view('admin/add_edit_subcategory', $data);
				}
				
			}
			else{
				
				
				$this->load->view('admin/add_edit_subcategory', $data);
			}
		}	
		else{			
				$this->load->view('admin/login');
			}
	}
	
	public function deleteSubcategory(){
		if($this->session->userdata('is_admin_logged_in') == 1){	
			$sid = $this->uri->segment(3);
			$param = array(
						   "table" => "sub_cetegory",
						   "field_name" => "s_id",
						   "field_value" => $sid
						   );
			
			$del = $this->admin_model->GetDatabyId($param)->row();
			
			
			$this->admin_model->DeleteDatabyId($param);
			
			$this->session->set_flashdata('msg_success', 'Subcategory Deleted successfully.');
					
			redirect("admin/show_Subcategory");
		}
		else{			
				$this->load->view('admin/login');
			}
	}
	
	public function show_brand(){
		if($this->session->userdata('is_admin_logged_in') == 1){	
			$data['cate'] = $this->admin_model->GetData("brand_name")->result();
			
			$this->load->view('admin/show_brand', $data);
		}
		else{			
				$this->load->view('admin/login');
			}
	}
	
	public function addBrand(){
		if($this->session->userdata('is_admin_logged_in') == 1){
			if($this->input->post('add_brand')){
				
				$this->load->library('form_validation');
				$this->form_validation->set_rules('brand_name', 'Brand', 'trim|required');
				
				if ($this->form_validation->run() != FALSE){
					
					$cat_name = trim($this->input->post('brand_name'));
					
					$dir = "./resources/Brand_logo/".$cat_name;
					if (!file_exists($dir)) {
						mkdir($dir, 0777, true);
					}
					
					$config['upload_path'] = $dir."/";
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_width']  = '1024';
					$config['max_height']  = '768';
			
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload("brand_logo")){
						$this->session->set_flashdata('msg_error', $this->upload->display_errors());
						$this->load->view('admin/add_edit_brand');
						
					}
					else{
						
						$upload_data = $this->upload->data();
						$table = "brand_name";
						$data = array(
									"brand_name" => $cat_name,
									"brand_logo" => $upload_data['file_name']
								);
						$res = $this->admin_model->addData($table, $data);
						
						$this->session->set_flashdata('msg_success', 'Brand updated successfully.');
						redirect("admin/show_brand");
					}
				
				}
				else{
					
					$this->session->set_flashdata('msg_error', validation_errors());
					$this->load->view('admin/add_edit_brand');
				}
				
			}
			else{
				
				$this->load->view('admin/add_edit_brand');
			}
			
		}
		else{			
				$this->load->view('admin/login');
			}
		
	}
	public function editBrand(){
		
		if($this->session->userdata('is_admin_logged_in') == 1){
			
			$bid = $this->uri->segment(3);
			
			$param = array(
						   "table" => "brand_name",
						   "field_name" => "id",
						   "field_value" => $bid
						   );
			$data['brnd'] = $this->admin_model->GetDatabyId($param)->row();
			
			if($this->input->post('edit_brand')){
				
				$this->load->library('form_validation');
				$this->form_validation->set_rules('brand_name', 'Brand', 'trim|required');
				
				if ($this->form_validation->run() != FALSE){
					
					$brnd_name = trim($this->input->post('brand_name'));
					
					$data = array(
								"brand_name" => $brnd_name
							);
					
					if(!empty($_FILES)){
						
						$dir = "./resources/Brand_logo/".$brnd_name;
						if (!file_exists($dir)) {
							mkdir($dir, 0777, true);
						}
						
						$config['upload_path'] = $dir."/";
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_width']  = '1024';
						$config['max_height']  = '768';
				
						
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if (!$this->upload->do_upload("brand_logo")){
							
							$this->session->set_flashdata('msg_error', $this->upload->display_errors());
							$this->load->view('admin/add_edit_brand', $data);
							
						}
						else{
							
							$upload_data = $this->upload->data();
							$data['brand_logo'] = $upload_data['file_name'];
							
							$del = $this->admin_model->GetDatabyId($param)->row();
							$path = "./resources/Brand_logo/".$del->brand_name."/".$del->brand_logo;
							unlink($path);
							
						}
						
					}
					
					$res = $this->admin_model->editData($param, $data);
					
					$this->session->set_flashdata('msg_success', 'Brand updated successfully.');
					redirect("admin/show_brand");
					
				
				}
				else{
					
					$this->session->set_flashdata('msg_error', validation_errors());
					$this->load->view('admin/add_edit_brand', $data);
				}
				
			}
			else{
				
				$this->session->set_flashdata('msg_error', validation_errors());
				$this->load->view('admin/add_edit_brand', $data);
			}
		}
		else{			
				$this->load->view('admin/login');
		}		
	}
	
	
	public function deleteBrand(){
		
		if($this->session->userdata('is_admin_logged_in') == 1){
			
			$bid = $this->uri->segment(3);
			$param = array(
						   "table" => "brand_name",
						   "field_name" => "id",
						   "field_value" => $bid
						   );
			
			$del = $this->admin_model->GetDatabyId($param)->row();
			
			$path = "./resources/brand_logo/".$del->brand_name."/".$del->brand_logo;
			unlink($path);
			
			
			$this->admin_model->DeleteDatabyId($param);
			
			$this->session->set_flashdata('msg_success', 'Brand Deleted successfully.');
					
			redirect("admin/show_brand");
			
		}
		else{			
				$this->load->view('admin/login');
		}
			
	}
		
	public function table(){
		
		$this->load->view('admin/tables');
		
	}

	public function forms(){
		
		$this->load->view('admin/forms');
		
	}
			
}
