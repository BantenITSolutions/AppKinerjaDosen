<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dosen extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 

	function index($uri=0)
	{
		$d['menu'] = $this->app_global_web->generate_index_menu();
		$d['banner_gallery'] = $this->app_global_web->generate_banner_gallery();
		$d['dt_retrieve'] = $this->app_global_web->generate_index_dosen($GLOBALS['site_limit_medium'],$uri);
		$d['banner_berita'] = $this->app_global_web->generate_banner_berita(2);

 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_banner");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/dosen/bg_home");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}

	function detail($param='')
	{
		$where['id_dosen'] = $param;
		$d['banner_gallery'] = $this->app_global_web->generate_banner_gallery();
		$d['menu'] = $this->app_global_web->generate_index_menu();
		$d['banner_berita'] = $this->app_global_web->generate_banner_berita(2);
		$get = $this->db->get_where("dlmbg_dosen",$where)->row();
			
		$d['no_sertifikat'] = $get->no_sertifikat;
		$d['nip'] = $get->nip;
		$d['nidn'] = $get->nidn;
		$d['nama'] = $get->nama;
		$d['nama_pt'] = $get->nama_pt;
		$d['alamat_pt'] = $get->alamat_pt;
		$d['fakultas'] = $get->fakultas;
		$d['prodi'] = $get->prodi;
		$d['jab_fungsional'] = $get->jab_fungsional;
		$d['tgl_lahir'] = $get->tgl_lahir;
		$d['bln_lahir'] = $get->bln_lahir;
		$d['thn_lahir'] = $get->thn_lahir;
		$d['tmp_lahir'] = $get->tmp_lahir;
		$d['s1'] = $get->s1;
		$d['s2'] = $get->s2;
		$d['s3'] = $get->s3;
		$d['jenis'] = $get->jenis;
		$d['bidang_ilmu'] = $get->bidang_ilmu;
		$d['no_hp'] = $get->no_hp;
		$d['tahun_akademik'] = $get->tahun_akademik;
		$d['asesor1'] = $get->asesor1;
		$d['asesor2'] = $get->asesor2;
		$d['email'] = $get->email;
		$d['gambar'] = $get->gambar;
		
		$d['id_param'] = $get->id_dosen;
		$d['tipe'] = "edit";

 		$this->load->view($GLOBALS['site_theme']."/front/bg_header",$d);
 		$this->load->view($GLOBALS['site_theme']."/front/bg_banner");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_left");
 		$this->load->view($GLOBALS['site_theme']."/front/dosen/bg_detail");
 		$this->load->view($GLOBALS['site_theme']."/front/bg_footer");
	}
}
