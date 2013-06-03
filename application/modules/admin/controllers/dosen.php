<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dosen extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_dosen($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("dosen/bg_home");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function tambah()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['no_sertifikat'] = "";
			$d['nip'] = "";
			$d['nidn'] = "";
			$d['nama'] = "";
			$d['nama_pt'] = "";
			$d['alamat_pt'] = "";
			$d['fakultas'] = "";
			$d['prodi'] = "";
			$d['jab_fungsional'] = "";
			$d['tgl_lahir'] = "";
			$d['bln_lahir'] = "";
			$d['thn_lahir'] = "";
			$d['tmp_lahir'] = "";
			$d['s1'] = "";
			$d['s2'] = "";
			$d['s3'] = "";
			$d['jenis'] = "";
			$d['bidang_ilmu'] = "";
			$d['no_hp'] = "";
			$d['tahun_akademik'] = "";
			$d['asesor1'] = "";
			$d['asesor2'] = "";
			$d['email'] = "";
			$d['gambar'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("dosen/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function edit($id_param)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_dosen'] = $id_param;
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
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("dosen/bg_input");
 			$this->load->view("bg_footer");
		}
		else
		{
			redirect(base_url());
		}
   }
 
   public function simpan()
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$tipe = $this->input->post("tipe");
			$id['id_dosen'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				if($_FILES['userfile']['name']!="")
				{
					$config['upload_path'] = './asset/foto-dosen/thumb/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) 
					{
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/foto-dosen/thumb/".$data['file_name'] ;
						$destination_thumb	= "./asset/foto-dosen/" ;			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_thumb    = 640 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$this->db->set('id_dosen',"REPLACE(UUID(),'-','')",FALSE); 
						$this->db->set('gambar',$data['file_name']); 
						$this->db->set("no_sertifikat",$this->input->post("no_sertifikat"));
						$this->db->set("nip",$this->input->post("nip"));
						$this->db->set("nidn",$this->input->post("nidn"));
						$this->db->set("nama",$this->input->post("nama"));
						$this->db->set("nama_pt",$this->input->post("nama_pt"));
						$this->db->set("alamat_pt",$this->input->post("alamat_pt"));
						$this->db->set("fakultas",$this->input->post("fakultas"));
						$this->db->set("prodi",$this->input->post("prodi"));
						$this->db->set("jab_fungsional",$this->input->post("jab_fungsional"));
						$this->db->set("tgl_lahir",$this->input->post("tgl_lahir"));
						$this->db->set("bln_lahir",$this->input->post("bln_lahir"));
						$this->db->set("thn_lahir",$this->input->post("thn_lahir"));
						$this->db->set("tmp_lahir",$this->input->post("tmp_lahir"));
						$this->db->set("s1",$this->input->post("s1"));
						$this->db->set("s2",$this->input->post("s2"));
						$this->db->set("s3",$this->input->post("s3"));
						$this->db->set("jenis",$this->input->post("jenis"));
						$this->db->set("bidang_ilmu",$this->input->post("bidang_ilmu"));
						$this->db->set("no_hp",$this->input->post("no_hp"));
						$this->db->set("tahun_akademik",$this->input->post("tahun_akademik"));
						$this->db->set("asesor1",$this->input->post("asesor1"));
						$this->db->set("asesor2",$this->input->post("asesor2"));
						$this->db->set("email",$this->input->post("email"));
						$this->db->insert("dlmbg_dosen");
						redirect("admin/dosen");
				
						unlink($source);
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
					
				}
				else
				{
					$this->db->set('id_dosen',"REPLACE(UUID(),'-','')",FALSE); 
					$this->db->set("no_sertifikat",$this->input->post("no_sertifikat"));
					$this->db->set("nip",$this->input->post("nip"));
					$this->db->set("nidn",$this->input->post("nidn"));
					$this->db->set("nama",$this->input->post("nama"));
					$this->db->set("nama_pt",$this->input->post("nama_pt"));
					$this->db->set("alamat_pt",$this->input->post("alamat_pt"));
					$this->db->set("fakultas",$this->input->post("fakultas"));
					$this->db->set("prodi",$this->input->post("prodi"));
					$this->db->set("jab_fungsional",$this->input->post("jab_fungsional"));
					$this->db->set("tgl_lahir",$this->input->post("tgl_lahir"));
					$this->db->set("bln_lahir",$this->input->post("bln_lahir"));
					$this->db->set("thn_lahir",$this->input->post("thn_lahir"));
					$this->db->set("tmp_lahir",$this->input->post("tmp_lahir"));
					$this->db->set("s1",$this->input->post("s1"));
					$this->db->set("s2",$this->input->post("s2"));
					$this->db->set("s3",$this->input->post("s3"));
					$this->db->set("jenis",$this->input->post("jenis"));
					$this->db->set("bidang_ilmu",$this->input->post("bidang_ilmu"));
					$this->db->set("no_hp",$this->input->post("no_hp"));
					$this->db->set("tahun_akademik",$this->input->post("tahun_akademik"));
					$this->db->set("asesor1",$this->input->post("asesor1"));
					$this->db->set("asesor2",$this->input->post("asesor2"));
					$this->db->set("email",$this->input->post("email"));
					$this->db->insert("dlmbg_dosen");
					redirect("admin/dosen");
					
				}
			}
			else if($tipe=="edit")
			{
				if($_FILES['userfile']['name']=="")
				{
					$d['no_sertifikat'] =  $this->input->post("no_sertifikat");
					$d['nip'] =  $this->input->post("nip");
					$d['nidn'] =  $this->input->post("nidn");
					$d['nama'] =  $this->input->post("nama");
					$d['nama_pt'] =  $this->input->post("nama_pt");
					$d['alamat_pt'] =  $this->input->post("alamat_pt");
					$d['fakultas'] =  $this->input->post("fakultas");
					$d['prodi'] =  $this->input->post("prodi");
					$d['jab_fungsional'] =  $this->input->post("jab_fungsional");
					$d['tgl_lahir'] =  $this->input->post("tgl_lahir");
					$d['bln_lahir'] =  $this->input->post("bln_lahir");
					$d['thn_lahir'] =  $this->input->post("thn_lahir");
					$d['tmp_lahir'] =  $this->input->post("tmp_lahir");
					$d['s1'] =  $this->input->post("s1");
					$d['s2'] =  $this->input->post("s2");
					$d['s3'] =  $this->input->post("s3");
					$d['jenis'] =  $this->input->post("jenis");
					$d['bidang_ilmu'] =  $this->input->post("bidang_ilmu");
					$d['no_hp'] =  $this->input->post("no_hp");
					$d['tahun_akademik'] =  $this->input->post("tahun_akademik");
					$d['asesor1'] =  $this->input->post("asesor1");
					$d['asesor2'] =  $this->input->post("asesor2");
					$d['email'] =  $this->input->post("email");
					$this->db->update("dlmbg_dosen",$d,$id);
					redirect("admin/dosen");
				}
				else
				{
					$config['upload_path'] = './asset/foto-dosen/thumb/';
					$config['allowed_types']= 'gif|jpg|png|jpeg';
					$config['encrypt_name']	= TRUE;
					$config['remove_spaces']	= TRUE;	
					$config['max_size']     = '3000';
					$config['max_width']  	= '3000';
					$config['max_height']  	= '3000';
			 
					$this->load->library('upload', $config);
	 
					if ($this->upload->do_upload("userfile")) {
						$data	 	= $this->upload->data();
			 
						/* PATH */
						$source             = "./asset/foto-dosen/thumb/".$data['file_name'] ;
						$destination_thumb	= "./asset/foto-dosen/" ;			 
						// Permission Configuration
						chmod($source, 0777) ;
			 
						/* Resizing Processing */
						// Configuration Of Image Manipulation :: Static
						$this->load->library('image_lib') ;
						$img['image_library'] = 'GD2';
						$img['create_thumb']  = TRUE;
						$img['maintain_ratio']= TRUE;
			 
						/// Limit Width Resize
						$limit_thumb    = 640 ;
			 
						// Size Image Limit was using (LIMIT TOP)
						$limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
			 
						// Percentase Resize
						if ($limit_use > $limit_thumb) {
							$percent_thumb  = $limit_thumb/$limit_use ;
						}
			 
						//// Making THUMBNAIL ///////
						$img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
						$img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
			 
						// Configuration Of Image Manipulation :: Dynamic
						$img['thumb_marker'] = '';
						$img['quality']      = '100%' ;
						$img['source_image'] = $source ;
						$img['new_image']    = $destination_thumb ;
			 
						// Do Resizing
						$this->image_lib->initialize($img);
						$this->image_lib->resize();
						$this->image_lib->clear() ;
						
						$d['gambar'] =  $data['file_name'];
						$d['no_sertifikat'] =  $this->input->post("no_sertifikat");
						$d['nip'] =  $this->input->post("nip");
						$d['nidn'] =  $this->input->post("nidn");
						$d['nama'] =  $this->input->post("nama");
						$d['nama_pt'] =  $this->input->post("nama_pt");
						$d['alamat_pt'] =  $this->input->post("alamat_pt");
						$d['fakultas'] =  $this->input->post("fakultas");
						$d['prodi'] =  $this->input->post("prodi");
						$d['jab_fungsional'] =  $this->input->post("jab_fungsional");
						$d['tgl_lahir'] =  $this->input->post("tgl_lahir");
						$d['bln_lahir'] =  $this->input->post("bln_lahir");
						$d['thn_lahir'] =  $this->input->post("thn_lahir");
						$d['tmp_lahir'] =  $this->input->post("tmp_lahir");
						$d['s1'] =  $this->input->post("s1");
						$d['s2'] =  $this->input->post("s2");
						$d['s3'] =  $this->input->post("s3");
						$d['jenis'] =  $this->input->post("jenis");
						$d['bidang_ilmu'] =  $this->input->post("bidang_ilmu");
						$d['no_hp'] =  $this->input->post("no_hp");
						$d['tahun_akademik'] =  $this->input->post("tahun_akademik");
						$d['asesor1'] =  $this->input->post("asesor1");
						$d['asesor2'] =  $this->input->post("asesor2");
						$d['email'] =  $this->input->post("email");
						$this->db->update("dlmbg_dosen",$d,$id);
						redirect("admin/dosen");
				
						unlink($source);
						
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
			
			redirect("admin/dosen");
		}
		else
		{
			redirect(base_url());
		}
   }
 
	public function hapus($id_param)
	{
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$where['id_dosen'] = $id_param;
			$this->db->delete("dlmbg_dosen",$where);
			redirect("admin/dosen");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
