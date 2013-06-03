<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class berita extends CI_Controller {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
 
   public function index($uri=0)
   {
		if($this->session->userdata("logged_in")!=""  && $this->session->userdata("level")=="admin")
		{
			$d['data_retrieve'] = $this->app_global_admin_model->generate_index_berita($GLOBALS['site_limit_small'],$uri);
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("berita/bg_home");
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
			$d['judul'] = "";
			$d['gbr'] = "";
			$d['isi'] = "";
			
			$d['id_param'] = "";
			$d['tipe'] = "tambah";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("berita/bg_input");
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
			$where['id_berita'] = $id_param;
			$get = $this->db->get_where("dlmbg_berita",$where)->row();
			
			$d['judul'] = $get->judul;
			$d['gbr'] = $get->gbr;
			$d['isi'] = $get->isi;
			
			$d['id_param'] = $get->id_berita;
			$d['tipe'] = "edit";
			
 			$this->load->view("bg_header",$d);
 			$this->load->view("bg_menu");
 			$this->load->view("berita/bg_input");
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
			$id['id_berita'] = $this->input->post("id_param");
			if($tipe=="tambah")
			{
				$config['upload_path'] = './asset/berita/thumb/';
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
					$source             = "./asset/berita/thumb/".$data['file_name'] ;
					$destination_thumb	= "./asset/berita/" ;			 
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

					$this->db->set('id_berita',"REPLACE(UUID(),'-','')",FALSE); 
					$this->db->set('judul',$this->input->post("judul"));
					$this->db->set('isi',$this->input->post("isi"));
					$this->db->set('gbr',$data['file_name']); 
					$this->db->set('tgl_post',gmdate("Y-m-d",time()+3600*24*7)); 
					$this->db->set('jam_post',gmdate("H:i:s",time()+3600*24*7)); 
					$this->db->insert("dlmbg_berita");
				}
				else 
				{
					echo $this->upload->display_errors('<p>','</p>');
				}
				
			}
			else if($tipe=="edit")
			{
				if(empty($_FILES['userfile']['name']))
				{
					$in['judul'] = $this->input->post("judul");
					$in['isi'] = $this->input->post("isi");
					$this->db->update("dlmbg_berita",$in,$id);
				}
				else
				{


					$config['upload_path'] = './asset/berita/thumb/';
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
						$source             = "./asset/berita/thumb/".$data['file_name'] ;
						$destination_thumb	= "./asset/berita/" ;			 
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

						$in['judul'] = $this->input->post("judul");
						$in['gbr'] = $data['file_name'];
						$in['isi'] = $this->input->post("isi");
						$this->db->update("dlmbg_berita",$in,$id);
					}
					else 
					{
						echo $this->upload->display_errors('<p>','</p>');
					}
				}
			}
			
			redirect("admin/berita");
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
			$where['id_berita'] = $id_param;
			$this->db->delete("dlmbg_berita",$where);
			redirect("admin/berita");
		}
		else
		{
			redirect(base_url());
		}
   }
}
 
/* End of file superadmin.php */
