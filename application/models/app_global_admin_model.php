<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_global_admin_model extends CI_Model {

	/**
	 * @author : Gede Lumbung
	 * @web : http://gedelumbung.com
	 **/
	 
	public function generate_index_user($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->where_not_in("level","dosen")->get("dlmbg_user");

		$config['base_url'] = base_url() . 'admin/user/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->where_not_in("level","dosen")->get("dlmbg_user",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Superadmin Name</th>
					<th>Username</th>
					<th>Level</th>
					<th width='160'><a href='".base_url()."admin/user/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_user."</td>
					<td>".$h->username."</td>
					<td>".$h->level."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/user/edit/".$h->kode_user."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/user/hapus/".$h->kode_user."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_sistem($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_setting");

		$config['base_url'] = base_url() . 'admin/sistem/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_setting",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Setting System</th>
					<th>Type</th>
					<th></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->title."</td>
					<td>".$h->tipe."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/sistem/edit/".$h->id_setting."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_menu($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_menu");

		$config['base_url'] = base_url() . 'admin/routing_pages/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_menu",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr class='warning'>
				<td width='30'><b>No.</b></td>
				<td><b>Menu</b></td>
				<td><b>URL Route</b></td>
				<td width='150'><a href='".base_url()."admin/routing_pages/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></td>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$hasil .= "<tr><td>".$i." </td><td>".$h->menu." </td><td>".$h->url_route." </td>
			<td><a href='".base_url()."admin/routing_pages/edit/".$h->id_menu."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/routing_pages/hapus/".$h->id_menu."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_dosen($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_dosen");

		$config['base_url'] = base_url() . 'admin/dosen/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_dosen",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr class='warning'>
				<td width='30'><b>No.</b></td>
				<td><b>Nama</b></td>
				<td><b>NIP</b></td>
				<td><b>Email</b></td>
				<td><b>Foto</b></td>
				<td width='150'><a href='".base_url()."admin/dosen/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></td>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$gbr = "no-image.jpg";
			if($h->gambar!="")
			{
				$gbr = $h->gambar;
			}
			$hasil .= "<tr><td>".$i." </td><td>".$h->nama." </td><td>".$h->nip." </td><td>".$h->email." </td>
			<td><img src='".base_url()."asset/foto-dosen/".$gbr."' width='50'> </td>
			<td><a href='".base_url()."admin/dosen/edit/".$h->id_dosen."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/dosen/hapus/".$h->id_dosen."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_dosen_cetak($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_dosen");

		$config['base_url'] = base_url() . 'admin/cetak/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_dosen",$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr class='warning'>
				<td width='30'><b>No.</b></td>
				<td><b>Nama</b></td>
				<td><b>NIP</b></td>
				<td><b>Email</b></td>
				<td><b>Foto</b></td>
				<td width='150'></td>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$gbr = "no-image.jpg";
			if($h->gambar!="")
			{
				$gbr = $h->gambar;
			}
			$hasil .= "<tr><td>".$i." </td><td>".$h->nama." </td><td>".$h->nip." </td><td>".$h->email." </td>
			<td><img src='".base_url()."asset/foto-dosen/".$gbr."' width='50'> </td>
			<td><a href='".base_url()."admin/cetak/detail/".$h->id_dosen."' class='btn btn-warning btn-small'>
			<i class='icon-edit'></i> Cetak</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_dosen_cetak_detail($param)
	{
		$i = 1;
		$id_param['id_dosen'] = $param;
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr class='warning'>
				<td><b>No.</b></td>
				<td><b>Jenis Kegiatan</b></td>
				<td><b>Bukti Penugasan</b></td>
				<td><b>SKS Penugasan</b></td>
				<td><b>Masa Penugasan</b></td>
				<td><b>Bukti Dokumen</b></td>
				<td><b>SKS Dokumen</b></td>
				<td><b>Jenis Kinerja</b></td>
				</tr>
				</thead>";
				
		$w = $this->db->get_where("dlmbg_kinerja",$id_param);
				
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
			<td>".$h->nomor." </td>
			<td>".$h->jenis_kegiatan." </td>
			<td>".$h->bukti_penugasan." </td>
			<td>".$h->sks_penugasan." </td>
			<td>".$h->masa_penugasan." </td>
			<td>".$h->bukti_dokumen." </td>
			<td>".$h->sks_dokumen." </td>
			<td>".$h->jenis_kinerja." </td>
			</tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		return $hasil;
	}

	public function generate_index_kinerja_bidang($bidang,$limit,$offset)
	{
		$i = $offset+1;
		$where['jenis_kinerja'] = $bidang;
		
		$this->db->select("*")->join("dlmbg_dosen","dlmbg_kinerja.id_dosen=dlmbg_dosen.id_dosen");
		$tot_hal = $this->db->get_where("dlmbg_kinerja",$where);

		$config['base_url'] = base_url() . 'admin/kinerja_bidang/set/'.$bidang.'/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$this->db->select("*")->join("dlmbg_dosen","dlmbg_kinerja.id_dosen=dlmbg_dosen.id_dosen");
		$w = $this->db->get_where("dlmbg_kinerja",$where,$limit,$offset);
		
		$hasil = "";
		$hasil .= "<table class='table table-striped table-condensed'>
				<thead>
				<tr class='warning'>
				<td width='30'><b>No.</b></td>
				<td><b>Nama</b></td>
				<td><b>Jenis Kegiatan</b></td>
				<td><b>SKS</b></td>
				<td><b>Masa Penugasan</b></td>
				<td width='150'><a href='".base_url()."admin/kinerja_bidang/tambah/".$bidang."' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></td>
				</tr>
				</thead>";
				
		foreach($w->result() as $h)
		{
			$gbr = "no-image.jpg";
			if($h->gambar!="")
			{
				$gbr = $h->gambar;
			}
			$hasil .= "<tr><td>".$i." </td><td>".$h->nama." </td><td>".$h->jenis_kegiatan." </td><td>".$h->sks_penugasan." </td><td>".$h->masa_penugasan." </td>
			<td><a href='".base_url()."admin/kinerja_bidang/edit/".$bidang."/".$h->id_kinerja."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i> Edit</a>
			<a href='".base_url()."admin/kinerja_bidang/hapus/".$h->id_kinerja."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i> Hapus</a>";
			
			$hasil .= "</td></tr>";
			$i++;
		}
		
		$hasil .= "</table>";
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}

	public function generate_index_galeri($limit,$offset)
	{
		$i = $offset+1;
		$tot_hal = $this->db->get("dlmbg_galeri");

		$config['base_url'] = base_url() . 'admin/data_galeri/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);
		
		$w = $this->db->get("dlmbg_galeri",$limit,$offset);
		
		$hasil = "";
		
		$hasil = "<p><a href='".base_url()."admin/data_galeri/tambah' class='btn btn-success btn-small'><i class='icon-plus-sign'></i> Tambah Data</a></p>
		<div class='row-fluid'>";
				
		$i = 0;
		foreach($w->result() as $h)
		{
			if($i==0)
			{
				$hasil .= '</ul>';
				$hasil .= '<ul class="thumbnails m-media-container">';
			}
			$hasil .= "<li class='span2'><a href='#' class='thumbnail'>
			<img src='".base_url()."asset/galeri/".$h->gambar."'></a>
			<div class='m-media-action'>
			<a href='".base_url()."admin/data_galeri/edit/".$h->id_galeri."' class='btn btn-inverse btn-small'>
			<i class='icon-edit'></i></a>
			<a href='".base_url()."admin/data_galeri/hapus/".$h->id_galeri."/".$h->gambar."' class='btn btn-danger btn-small' onClick=\"return confirm('Are you sure?');\" >
			<i class='icon-trash'></i></a></div></li>";
			
			$i++;
			if($i>5)
			{
				$i=0;
			}
		}
		
		$hasil .= '</div>';
		
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_kategori_forum($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_kategori");

		$config['base_url'] = base_url() . 'admin/kategori_forum/index/';
		$config['base_url'] = base_url() . 'admin/user/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_kategori",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Nama Kategori</th>
					<th width='160'><a href='".base_url()."admin/kategori_forum/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->nama_kategori."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/kategori_forum/edit/".$h->id_kategori."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/kategori_forum/hapus/".$h->id_kategori."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_rekomendasi($limit,$offset,$filter=array())
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_rekomendasi");

		$config['base_url'] = base_url() . 'admin/rekomendasi/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_rekomendasi",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Rekomendasi</th>
					<th width='160'><a href='".base_url()."admin/rekomendasi/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->rekomendasi."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/rekomendasi/edit/".$h->id_rekomendasi."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/rekomendasi/hapus/".$h->id_rekomendasi."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_banner($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_banner");

		$config['base_url'] = base_url() . 'admin/banner/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_banner",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th width='160'><a href='".base_url()."admin/banner/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/banner/edit/".$h->id_banner."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/banner/hapus/".$h->id_banner."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_berita($limit,$offset)
	{
		$hasil="";
		$tot_hal = $this->db->get("dlmbg_berita");

		$config['base_url'] = base_url() . 'admin/berita/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->get("dlmbg_berita",$limit,$offset);
		
		$hasil .= "<table class='table table-striped table-condensed'>
					<thead>
					<tr>
					<th>No.</th>
					<th>Judul</th>
					<th width='160'><a href='".base_url()."admin/berita/tambah' class='btn btn-small btn-success'><i class='icon-plus-sign'></i> Tambah Data</a></th>
					</tr>
					</thead>";
		$i = $offset+1;
		foreach($w->result() as $h)
		{
			$hasil .= "<tr>
					<td>".$i."</td>
					<td>".$h->judul."</td>
					<td>";
			$hasil .= "<a href='".base_url()."admin/berita/edit/".$h->id_berita."' class='btn btn-small btn-inverse'><i class='icon-edit'></i> Edit</a> ";
			$hasil .= "<a href='".base_url()."admin/berita/hapus/".$h->id_berita."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
					</tr>";
			$i++;
		}
		$hasil .= '</table>';
		$hasil .= '<div class="cleaner_h20"></div>';
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_thread_forum($limit,$offset)
	{
		$tot_hal = $this->db->get("dlmbg_thread_forum");

		$config['base_url'] = base_url() . 'forum/my_thread/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select d.nama_kategori, a.id_forum,a.isi,a.hitung,post_date,a.judul,b.username,count(c.id_reply_forum) as hit, a.last_date from dlmbg_thread_forum as a left join (select username,kode_user from dlmbg_user) as b on a.id_anggota=b.kode_user left join dlmbg_reply_forum as c on a.id_forum=c.id_forum left join dlmbg_kategori d on a.id_kategori=d.id_kategori group by a.id_forum DESC order by a.last_date DESC LIMIT ".$offset.",".$limit." ");
		
		$hasil = "";
				
		foreach($w->result() as $h)
		{
			$hasil .= '<table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="#cbe6ff">
						<tr>
						  <td width="450">
						  <span class="date-txt2">';
			$pecah = explode("-",substr($h->post_date,0,10)); 
			$hasil .= 'Kategori : '.$h->nama_kategori.'</span>
						  <div class="cleaner_h0"></div>
						  <strong><span class="h1-black"><a href="'.base_url().'forum/forum/detail/'.$h->id_forum.'" title="'.$h->judul.'">
						  '.substr($h->judul,0,50).'...</a></span></strong>
						  <div class="cleaner_h0"></div>
						  </td>
						  <td align="right" width="60">'.$h->hitung.' views</td>
						  <td align="right">'.$h->last_date.'</td>';

			$hasil .= "<td align='right'><a href='".base_url()."admin/thread_forum/hapus/".$h->id_forum."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
						</tr>
		      		</table>";
		
		}
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
	public function generate_index_reply_forum($limit,$offset)
	{
		$tot_hal = $this->db->get("dlmbg_reply_forum");

		$config['base_url'] = base_url() . 'forum/my_reply/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$this->pagination->initialize($config);

		$w = $this->db->query("select b.kode_user, c.judul as judul_post, a.id_forum,a.id_reply_forum,a.isi,c.last_date,a.tanggal,a.waktu,a.judul,b.nama_user,b.username from dlmbg_reply_forum as a inner join (select nama_user,kode_user,gbr,level,username from dlmbg_user) as b on a.id_anggota=b.kode_user inner join dlmbg_thread_forum c on a.id_forum=c.id_forum order by a.tanggal,a.waktu ASC LIMIT ".$offset.",".$limit." ");
		
		$hasil = "";
				
		foreach($w->result() as $h)
		{
			$hasil .= '<table width="100%" border="0" cellspacing="0" cellpadding="5" class="alert alert-success" bgcolor="#cbe6ff">
						<tr>
						  <td width="450">
						  <span class="date-txt2">';
			$hasil .= '<div class="cleaner_h0"></div>
						  <strong><span class="h1-black"><a href="'.base_url().'forum/forum/detail/'.$h->id_forum.'" title="'.$h->judul.'">
						  '.substr($h->judul,0,50).'...</a></span></strong>
						  <div class="cleaner_h0"></div>
						  '.strip_tags(substr($h->isi,0,100)).'...
						  </td>
						  <td align="right"><span class="label">'.$h->last_date.'</span><br><span class="label label-info">'.$h->nama_user.'</span></td>';


			$hasil .= "<td align='right'><a href='".base_url()."admin/reply_forum/hapus/".$h->id_reply_forum."' onClick=\"return confirm('Are you sure?');\" class='btn btn-small btn-danger'><i class='icon-trash'></i> Hapus</a></td>
						</tr>";
			$hasil .= '<tr>
						  <td align="left"><span class="label label-important">Forum : '.$h->judul_post.'</span></td>
						</tr>
						<tr>
		      		</table>';
		
		}
		$hasil .= $this->pagination->create_links();
		return $hasil;
	}
	 
}
