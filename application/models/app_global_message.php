<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_message extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/

	public function generate_indexs_pesan($id_param,$limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

		$where['id_member'] = $id_param;
		$tot_hal = $this->db->query("select * from dlmbg_pesan where id_penerima='".$id_param."' group by id_sampul");
		$config['base_url'] = base_url() . 'global/inbox/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select * from  (SELECT c.id_sampul,c.id_penerima,c.id_pengirim,c.stts,  (select max(id_pesan) from dlmbg_pesan a where a.id_sampul=c.id_sampul ) as max_id from dlmbg_pesan c group by c.id_sampul) x left join (select i.id_pesan,i.waktu,j.nama_user,j.username,i.isi,j.gbr from dlmbg_pesan i left join (select v.nama_user,v.kode_user,v.gbr,v.username from dlmbg_user v) j on i.id_pengirim=j.kode_user)  y on x.max_id =y.id_pesan where id_penerima='".$id_param."' or id_pengirim='".$id_param."' order by waktu DESC  LIMIT ".$offset.",".$limit."");
		$i = 0;
		foreach($w->result() as $h)
		{	
			$gbr = "no-img.jpg";
			if($h->gbr!="")
			{
				$gbr = $h->gbr;
			}
			$warna = "";
			$status = "Sudah Terbaca";
			if($h->stts=='N'){ $warna = "#D4E5A1"; $status="Belum Terbaca"; }
			$hasil .= '<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#ECF5CF">
				<tr bgcolor="'.$warna.'">
				  <td width="520">
				  <div class="border-photo-profil2" style="float:left; margin-right:10px;"><div class="hide-photo-profil-medium2"><img src="'.base_url().'asset/gravatar-member/thumb/'.$gbr.'" width="60" /></div></div>
				  <span class="date-txt2">'.$h->waktu.' - ';

				  if($h->id_penerima!=$this->session->userdata('kode_user'))
				  {
				  	$hasil .= 'dari : '.$h->nama_user.' - '.$h->username.'</span>';
				  }
				  else if($h->id_pengirim!=$this->session->userdata('id_member'))
				  {
				  	$hasil .= 'oleh : '.$h->nama_user.' - '.$h->username.'';
				  }

				  $hasil .= '<br />
				  <strong><span class="h2-black"><a href="'.base_url().'global/inbox/detail_pesan/'.$h->id_sampul.'" 
				  title="Baca Pesan :';
				  if($h->id_penerima!=$this->session->userdata('kode_user'))
				  { $hasil .= 'ke : '.$h->nama_user.' - '.$h->username; } 
				  else { $hasil .= 'untuk : '.$h->nama_user.' - '.$h->username; } 
				  $hasil .= ' | Status Pesan : '.$status.'">'.strip_tags(substr($h->isi,0,80)).'</a></span></strong>
				  <div class="cleaner_h0"></div>
				  </td>
				  <td align="right"><span class="date-txt3">'.relativeTime($h->waktu).'&nbsp;&nbsp;</span></td>
				</tr>
				<tr>
      		</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ECF5CF">
				<td>
            		<div class="line-grey"></div>
				</td>
				</tr>
			</table>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_detail_pesan($id_param,$limit,$offset)
	{
		$hasil = "";

		$page=$offset;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

		$where['id_member'] = $id_param;
		$tot_hal = $this->db->query("select * from dlmbg_pesan where id_sampul='".$id_param."'");
		$config['base_url'] = base_url() . 'global/inbox/detail_pesan/'.$id_param.'/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("SELECT b.kode_user,a.id_sampul,a.isi,a.id_penerima,a.id_pengirim,a.waktu,b.nama_user,b.gbr from dlmbg_pesan as a left join (select nama_user,x.kode_user,gbr from dlmbg_user as x) as b on a.id_pengirim=b.kode_user where id_sampul='".$id_param."' order by waktu DESC LIMIT ".$offset.",".$limit."");

		$w_get = $w->row();
		$id_penerima =  $w_get->id_penerima;
		if($w_get->id_penerima==$this->session->userdata("id_member"))
		{
			$id_penerima = $w_get->id_pengirim;
		}

		$hasil .='<div id="form_balas" style="display:none; ">
							'.form_open("global/inbox/kirim").'
							<table  width="700" bgcolor="#ECF5CF" cellspacing="0" border="0" cellpadding="10">
							<tr>
							<td>
							<textarea class="ckeditor" name="isi_pesan"></textarea>
							</td>
							</tr>
							<tr>
								<td>
								<input type="submit" value="KIRIM PESAN" class="btn btn-primary" />
								<input type="hidden" name="id_sampul" value="'.$id_param.'" />
								<input type="hidden" name="id_penerima" value="'.$id_penerima.'" />
								</td>
							</tr>
							</table>
							'.form_close().'
						</div>';
		foreach($w->result() as $h)
		{	
			$gbr = "no-img.jpg";
			if($h->gbr!="")
			{
				$gbr = $h->gbr;
			}

			$hasil .='<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#ECF5CF">
				<tr valign="top">
				  <td class="LeftBg">
				  <div class="border-photo-profil2" style="float:left; margin-right:10px;">
				  <div class="hide-photo-profil-medium2"><img src="'.base_url().'asset/gravatar-member/thumb/'.$gbr.'" width="60" /></div></td>
				  <td width="640">
				   <strong><a href="'.base_url().'web/member/get/'.$h->id_pengirim.'">'.$h->nama_user.'</a></strong> | <span class="date-txt2">'.$h->waktu.'</span>
				  <div class="cleaner_h0"></div>
				 '.$h->isi.'
				  <div class="cleaner_h0"></div>
				  </td>
				</tr>
				<tr>
      		</table>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ECF5CF">
				<td>
            		<div class="line-grey"></div>
				</td>
				</tr>
			</table>';
		}
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

}
