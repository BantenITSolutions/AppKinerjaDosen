		<div id="content">
			<div id="content-header">
				<h1>Aplikasi Beban Kerja Dosen</h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Universitas</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Universitas</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							<div class="well">
								<?php echo form_open_multipart("admin/universitas/simpan"); ?>
								
								<label for="menu">nama</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nama" name="nama" placeholder="nama" value="<?php echo $nama; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">alamat</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="alamat" name="alamat" placeholder="alamat" value="<?php echo $alamat; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">kota</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="kota" name="kota" placeholder="kota" value="<?php echo $kota; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">nama_rektor</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nama_rektor" name="nama_rektor" placeholder="nama_rektor" value="<?php echo $nama_rektor; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">nip_rektor</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nip_rektor" name="nip_rektor" placeholder="nip_rektor" value="<?php echo $nip_rektor; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">tahun_laporan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="tahun_laporan" name="tahun_laporan" placeholder="tahun_laporan" value="<?php echo $tahun_laporan; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">tanggal_cetak</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="tanggal_cetak" name="tanggal_cetak" placeholder="tanggal_cetak" value="<?php echo $tanggal_cetak; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">sebutan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="sebutan" name="sebutan" placeholder="sebutan" value="<?php echo $sebutan; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">sebutan_pimpinan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="sebutan_pimpinan" name="sebutan_pimpinan" placeholder="sebutan_pimpinan" value="<?php echo $sebutan_pimpinan; ?>" />
								<div class="cleaner_h10"></div>
								
								<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
								<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
								<div class="cleaner_h10"></div>
								<input type="submit" class="btn btn-info" value="SIMPAN" />
								<?php echo form_close(); ?>
							</div>						
							</div>
						</div>
						
					</div>
				</div>
		