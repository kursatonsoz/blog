<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {
	function __construct() {
       	parent::__construct();
		$this->load->model("Blog_model");
		$this->load->library("fonksiyon");
		$this->key = "Kürşat Önsöz,Oracle,Linux,PL/SQL,SQL,Veritabanı,Database,ORA";
   }
	public function index()
	{
		$data['func'] = new fonksiyon();
		$data['yazilar'] = $this->Blog_model->yazilar();
		$obj = new stdClass();
		$obj->baslik = "Anasayfa";
		$obj->keys = $this->key;
		$dataz['data'] = $obj;
		$data['ust'] = $this->load->view("header",$dataz,TRUE);
		$this->load->view('anasayfa',$data);
		
		$this->load->view("footer");
	}
	public function yazilar($param)
	{
		$data['func'] = new fonksiyon();
		$x = $this->Blog_model->yazi($param);
		if(!$x){
			$this->load->helper('url');
 			redirect(base_url().'error.html');
		}
		$data['yazi'] = $x[0];
		$obj = new stdClass();
		$obj->baslik = $data["yazi"]->baslik;
		$keyler = json_decode($data["yazi"]->tags);
		$obj->keys = implode(",", $keyler);
		$dataz['data'] = $obj;
		$data['ust'] = $this->load->view("header",$dataz,TRUE);
		$this->load->view('yazi',$data);
		$this->load->view("footer");

	}
	public function kategori($param)
	{
		$data['func'] = new fonksiyon();
		$data['yazilar'] = $this->Blog_model->kategori($param);
		$x = $this->Blog_model->seo_to_text($param);
			if(!$data['yazilar']){
				$this->load->helper('url');
	 			redirect(base_url().'error.html');
			}
		$obj = new stdClass();
		$obj->baslik = $x[0]->isim . " Kategorisinde Olan Yazılar" ;
		$obj->keys = $this->key;
		$dataz['data'] = $obj;
		$data['ust'] = $this->load->view("header",$dataz,TRUE);
		$this->load->view('kat',$data);
		
		$this->load->view("footer");

	}
	public function arama(){
		$src = mysql_real_escape_string($_GET["q"]);
		$data['func'] = new fonksiyon();
		$data['yazilar'] = $this->Blog_model->arama($src);
		
		$obj = new stdClass();
		$obj->baslik = $src . " için arama sonuçları" ;
		$obj->keys = $this->key;
		$dataz['data'] = $obj;
		$data['ust'] = $this->load->view("header",$dataz,TRUE);
		$this->load->view('arama',$data);
		$this->load->view("footer");
	}
	function sitemap()
    {
    	$this->load->helper("url");
        $data['xml'] = $this->Blog_model->sitemap();
        header("Content-Type: text/xml;charset=UTF-8");
        $this->load->view("feed",$data);
    }
    function feed()
    {
    	$this->load->helper("url");
        $data['xml'] = $this->Blog_model->sitemap();
        header("Content-Type: text/xml;charset=UTF-8");
        $this->load->view("feed",$data);
    }
	function error(){
		$obj = new stdClass();
		$obj->baslik = "Page Not Found" ;
		$obj->keys = $this->key;
		$dataz['data'] = $obj;
		$data['ust'] = $this->load->view("header",$dataz,TRUE);
		$this->load->view('404',$data);
		$this->load->view("footer");
	}
}
