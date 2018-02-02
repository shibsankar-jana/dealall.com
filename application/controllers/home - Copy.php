<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 error_reporting(0);
 class Home extends CI_controller {
   
   public function __construct(){
      
      parent::__construct();
      $this->load->model('home_model');
      $this->load->library('session');
       
   }
   
   public function index(){
   
     redirect("home/home");
     
   }
        
  
   public function login(){
		
		if($this->input->post('login')){
			
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Email', 'trim|required');
			if($this->form_validation->run() != FALSE){
			
				$param = array(
							"username" => trim($this->input->post('username')),
							"password" => md5(trim($this->input->post('password')))
						);
				$res = $this->home_model->login($param)->num_rows();
				
				if($res == 1){
					
					$result = $this->home_model->login($param)->row();
					$this->load->library('session');
					$sess_data = array(
									   "uid" => $result->id,
									   "uname" => $result->username,
									   "is_logged_in" => 1
									   );
					$this->session->set_userdata($sess_data);
					
					$ref_prt = trim($this->input->post('ref_page'));
					$ref = explode(base_url()."index.php/", $ref_prt);
					redirect($ref[1]);
					
					//redirect("home/products");
					
                    
				}
				else{
					$this->session->set_flashdata('msg_error', "User doesn't exist.");
					$this->load->view('front/login');
				}
				
			}
			else{
				
				$this->session->set_flashdata('msg_error', validation_errors());
				$this->load->view('front/login');
			}
			
		}
		else{
			$this->load->view("front/login");
			
		}
		
		
   }
    
   public function logout(){
   
     if($this->session->userdata('is_logged_in') == 1){
			
         $sess_data = array(
                             "uid" => "",
                             "uname" => "",
                             "is_logged_in" => ""
                         );
         $this->session->unset_userdata($sess_data);
         
         $this->session->sess_destroy();
         
         redirect("home/home");
         
     }
     else{			
             $this->load->view('admin/login');
     }
     
   }
   public function home(){
	 
	   $prd = $this->home_model->GetProduct()->result();
	   foreach($prd as $Key => $val){
		 $pid = $val->p_id;
		 $pimage = $this->db->query("select * from product_image where pid='".$pid."' limit 0, 1")->row();
		 $prd[$Key]->p_image = $pimage->p_image;
		
	   }
	   $data['prods'] = $prd;
	   
	   $data['cate'] = $this->home_model->GetData("cetegory")->result();
	   $data['brnd'] = $this->home_model->GetData("brand_name")->result();
	   
	   $this->load->view("front/home", $data);
	  
	}

   public function products(){   
	  
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/home/products/';
		$config['total_rows'] = $this->home_model->GetData("product")->num_rows();
		$config['per_page'] = 9;
		$config["uri_segment"] = 3;
		
		$config['cur_tag_open'] = '<li class="active">';
		$config['cur_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$param = array(
					   "table" => "product",
					   "start" => $page,
					   "limit" => $config['per_page']
					   );
		$data["links"] = $this->pagination->create_links();
		$prd = $data['prods'] = $this->home_model->GetDatabylimit($param)->result();
		foreach($prd as $Key => $val){
		  $pid = $val->p_id;
		  $pimage = $this->db->query("select * from product_image where pid='".$pid."' limit 0, 1")->row();
		  $prd[$Key]->p_image = $pimage->p_image;
		 
		}
		
		
		$data['prods'] = $prd;
		
		$data['cate'] = $this->home_model->GetData("cetegory")->result();
		$data['brnd'] = $this->home_model->GetData("brand_name")->result();
		
		
		//echo "<pre>";print_r($prc);exit;
	   
		$this->load->view("front/products", $data);
	 
   }
     
   public function product_filter(){   
	  //print_r($_GET);exit;
	  $ref = "";
	  $dat = array();
	  if(isset($_GET['cat_id'])){
	   $dat['cat'] = $_GET['cat_id'];
	   $ref .= "cat_id=".$_GET['cat_id']."&";
	   
	  }
	  if(isset($_GET['brnd'])){
	   $dat['brnd'] = $_GET['brnd'];
	   $ref .= "brnd=".$_GET['brnd']."&";
	  }
	  if(isset($_GET['price'])){
	   $dat['price'] = $_GET['price'];
	   $ref .= "price=".$_GET['price']."&";
	  }
	  $ref = rtrim($ref, "&");
	  
	 
	  $query_where = $this->query_builder($dat);
	  
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/home/product_filter/';
		$config['total_rows'] = $this->db->query("select * from product ".$query_where)->num_rows();
		$config['per_page'] = 3;
		$config["uri_segment"] = 3;
		
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$start = $page;
		$limit = $config['per_page'];
		
		$links = "<ul class='pagination'>";
		$totpage = ceil($config['total_rows']/$config['per_page']);
		
		$ac = ($page/$limit);
		
		for($i=0;$i<$totpage;$i++){
		   $licls = "";
		   if($ac == $i){
			$licls = "active";
		   }
		   $links .= "<li class='".$licls."'><a href='".base_url()."index.php/home/product_filter/".$i*$limit."?".$ref."'>".($i+1)."</a></li>";			
		}
		$links .= "</ul>";
		$data["links"] = $links;
		
		//echo $this->pagination->create_links();exit;
		
		$prd = $data['prods'] = $this->db->query("select * from product ".$query_where." limit ".$start.", ".$limit)->result();
		foreach($prd as $Key => $val){
		  $pid = $val->p_id;
		  $pimage = $this->db->query("select * from product_image where pid='".$pid."' limit 0, 1")->row();
		  $prd[$Key]->p_image = $pimage->p_image;
		 
		}
		
		
		$data['prods'] = $prd;
		
		$data['cate'] = $this->home_model->GetData("cetegory")->result();
		$data['brnd'] = $this->home_model->GetData("brand_name")->result();
		
		
		//echo "<pre>";print_r($data);exit;
	   
		$this->load->view("front/products_filter", $data);
	 
   }
   
   
   public function query_builder($dat){
   //echo "<pre>";print_r($_GET);exit;
   
     if((!empty($dat['cat'])) || (!empty($dat['brnd'])) || (!empty($dat['price']))){
	  
	   $where = "where ";    
	   if($dat['cat'] != ""){
		 $cid = explode(",",$dat['cat']);
		 $a = count($cid);
		 if(!empty($cid)){
		   $where .= "cat_id in (";
		   for($i=0;$i<$a;$i++){
			 $where .= $cid[$i].",";
		   }
		   $where = rtrim($where, ",");
		   
		   if((!empty($_GET['brnd'])) || (!empty($dat['price']))){
			 $where .= ") AND ";
		   }
		   else{
			 $where .= ")";
		   }
		   
		 }
	   }
	   
	   if($dat['brnd'] != ""){
		 $bid = explode(",",$dat['brnd']);
		 $b = count($bid);
		 if(!empty($bid)){
		   $where .= "brand_name in (";
		   for($i=0;$i<$b;$i++){
			 $where .= $bid[$i].",";
		   }
		   $where = rtrim($where, ",");
		   if((!empty($dat['cat'])) || (!empty($dat['price']))){
			 $where .= ") AND ";
		   }
		   else{
			 $where .= ")";
		   }
		   
		 }
	   }
	   
	   if($dat['price'] != ""){
		 $pid = explode(",",$dat['price']);
		 $c = count($pid);
		 if(!empty($pid)){
		   $where .= "p_price BETWEEN ";
		   if($c>1){
			 $en = $c-2;
			 $strt = explode("_",$pid[0]);
			 $end = explode("_",$pid[$en]);
			 $where .= $strt[0]." AND ".$end[1];
		   }
		   else{
			 $prce = explode("_",$pid[0]);
			 $where .= $prce[0]." AND ".$prce[1];
		   }
		 }
	   }
	   
	   $where = rtrim($where, " AND");
	   //echo $where;
	   //exit;
	   return $where;
	   
	   
	 }
  
     
   }
   
   
   public function product_details(){
   
    $pid = $this->uri->segment(3);
    $param = array(
                   "table" => "product",
                   "field_name" => "p_id",
                   "field_value" => $pid
                   );
    $data['prod'] = $this->home_model->GetDatabyId($param)->row();
    $data['pimage'] = $this->db->query("select * from product_image where pid=".$pid)->result();
    $this->load->view("front/product_details", $data);
     
   }
   
   public function cart(){
   
     if($this->session->userdata("is_logged_in") == 1){
   
         $uid = $this->session->userdata("uid");
         $param = array(
                        "table" => "sess_cart",
                        "field_name" => "u_id",
                        "field_value" => $uid
                        );
         $prd = $this->home_model->GetDatabyId($param)->result();
         
         $prd = $this->db->query("select sc.sess_cart_id,p.* from sess_cart sc left join product p on p.p_id = sc.p_id where sc.u_id=".$uid)->result();
         
         foreach($prd as $Key => $val){
           $pid = $val->p_id;
           $pimage = $this->db->query("select * from product_image where pid='".$pid."' limit 0, 1")->row();
           $prd[$Key]->p_image = $pimage->p_image;
          
         }
         $data['cprod'] = $prd;
         //echo "<pre>";print_r($data);exit;
         $this->load->view("front/cart", $data);
     }
     else{
       redirect("home/login");
     }
     
   }
   
   public function removecartitem(){
   
     if($this->session->userdata("is_logged_in") == 1){
      
       $crt_id = $this->uri->segment(3);
       $param = array(
                      "table" => "sess_cart",
                      "field_name" => "sess_cart_id",
                      "field_value" => $crt_id
                      );
       $this->home_model->DeleteDatabyId($param);
       
       redirect("home/cart");
    
     }
     else{
       redirect("home/login");
     }
     
   }
   
   public function checkout(){
   
     if($this->session->userdata("is_logged_in") == 1){
      
	  
//	  $uid = $this->session->userdata("uid");
//	  foreach($_POST['pid'] as $Key => $val){
//	   
//		$table = "product_order";
//		$data = array(
//					   "uid" => $uid,
//					   "pid" => $val,
//					   "qty" => trim($_POST['quantity'][$Key]),
//					   "price" => trim($_POST['prc'][$Key])
//					   );
//		$this->home_model->addData($table, $data);
//		
//	  }
//	  
//	  $param1 = array(
//                      "table" => "sess_cart",
//                      "field_name" => "u_id",
//                      "field_value" => $uid
//                      );
//       $this->home_model->DeleteDatabyId($param1);
	  
	  
       redirect("home/checkout_step1");
     
     }
     else{
       redirect("home/login");
     }
     
   }
   
   public function checkout_step1(){
   
     if($this->session->userdata("is_logged_in") == 1){
      
		$param = array(
                      "table" => "sess_cart",
                      "field_name" => "u_id",
                      "field_value" => $uid
                      );
       $this->home_model->GetDatabyId($param);
	  
		$this->load->view("front/checkout");
     
     }
     else{
       redirect("home/login");
     }
     
   }
   
   public function wishlist(){
   
     if($this->session->userdata("is_logged_in") == 1){
      
       $uid = $this->session->userdata("uid");
	   
	   $prd = $this->db->query("select w.wid,p.* from wishlist w left join product p on p.p_id = w.pid where w.uid=".$uid)->result();
	   
	   foreach($prd as $Key => $val){
		 $pid = $val->p_id;
		 $pimage = $this->db->query("select * from product_image where pid='".$pid."' limit 0, 1")->row();
		 $prd[$Key]->p_image = $pimage->p_image;
		
	   }
	   $data['cprod'] = $prd;
	   //echo "<pre>";print_r($data);exit;
	   $this->load->view("front/wishlist", $data);
    
     }
     else{
       redirect("home/login");
     }
     
   }
   
   
   public function addwishlist(){
   
     if($this->session->userdata("is_logged_in") == 1){
	  
       $uid = $this->session->userdata("uid");
	   $p_id = $this->uri->segment(3);
	   
       $table = "wishlist";
	   $data = array(
					 "uid" => $uid,
                     "pid" => $p_id
					 );
	   
       $this->home_model->addData($table, $data);
       
	   $ref = explode(base_url()."index.php/", $_SERVER['HTTP_REFERER']);
       redirect($ref[1]);
    
     }
     else{
       redirect("home/login");
     }
     
   }
   
   
   public function removewishlistitem(){
   
     if($this->session->userdata("is_logged_in") == 1){
      
       $wid = $this->uri->segment(3);
       $param = array(
                      "table" => "wishlist",
                      "field_name" => "wid",
                      "field_value" => $wid
                      );
       $this->home_model->DeleteDatabyId($param);
       
       redirect("home/wishlist");
    
     }
     else{
       redirect("home/login");
     }
     
   }
   
   
   
   public function blog(){
   
    $this->load->view("front/blog");
     
   }
   
   public function blog_single(){
   
    $this->load->view("front/blog_single");
     
   }
   
   public function error_page(){
   
    $this->load->view("front/error_page");
     
   }
   
   public function contact_us(){
   
    $this->load->view("front/contact_us");
     
   }
   
   public function table(){
   echo "hi";
     
   }
   
 }