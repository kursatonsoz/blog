<?php
class Blog_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function yazilar()
    {
        $sonuc = $this->db->query("SELECT * FROM yazi WHERE durum='1' ORDER BY id DESC");
        return $sonuc->result();
    }
    function yazi($param)
    {
        $sonuc = $this->db->query("SELECT * FROM yazi WHERE durum='1' AND seo='$param'");
        return $sonuc->result();
    }
    function kategori($param)
    {
        $sonuc = $this->db->query("SELECT *,Y.id as idsi FROM yazi as Y INNER JOIN kat_to_yazi as KY ON Y.id=KY.yazi INNER JOIN kat as K ON K.id=KY.kat WHERE durum='1' AND K.kseo='$param' ORDER BY Y.id DESC");
        return $sonuc->result();
    }
	function katlar($param)
    {
        $sonuc = $this->db->query("SELECT K.kseo,K.isim FROM yazi as Y INNER JOIN kat_to_yazi as KY ON Y.id=KY.yazi INNER JOIN kat as K ON K.id=KY.kat WHERE durum='1' AND Y.id='$param' ORDER BY Y.id DESC");
        return $sonuc->result();
    }
    function seo_to_text($param){
        return $this->db->query("SELECT isim FROM kat WHERE kseo='$param'")->result();
    }
    function arama($param){
        $this->db->select('*,yazi.id as idsi');
        $this->db->order_by("yazi.id","DESC");
        $this->db->from('yazi');
        $this->db->join("kat_to_yazi","kat_to_yazi.yazi=yazi.id");
        $this->db->join("kat","kat.id=kat_to_yazi.kat");
        $this->db->like('icerik', $param);
        $this->db->or_like('baslik', $param);
        $this->db->or_like('isim', $param);
        $sonuc = $this->db->get();
        return $sonuc->result();
    }
	function sitemap(){
		return $this->db->query("SELECT seo from yazi WHERE durum='1' ORDER BY id DESC")->result();
	}

}
?>
