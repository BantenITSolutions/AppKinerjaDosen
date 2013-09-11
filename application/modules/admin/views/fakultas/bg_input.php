		<div id="content">
			<div id="content-header">
				<h1>Aplikasi Beban Kerja Dosen</h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Fakultas</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Fakultas</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							<div class="well">
								<?php echo form_open_multipart("admin/fakultas/simpan"); ?>
								
								<label for="menu">Universitas/PT</label>
								<div class="cleaner_h5"></div>
								<select name="id_universitas">
									<?php
										foreach($universitas->result_array() as $d)
										{
											if($id_universitas==$d['id_universitas'])
											{
												echo '<option value="'.$d['id_universitas'].'" selected>'.$d['nama'].'</option>';
											}
											else
											{
												
												echo '<option value="'.$d['id_universitas'].'">'.$d['nama'].'</option>';
											}
										}
									?>
								</select>
								<div class="cleaner_h10"></div>
								
								<label for="menu">nama_fakultas</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nama_fakultas" name="nama_fakultas" placeholder="nama_fakultas" value="<?php echo $nama_fakultas; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">nama_dekan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nama_dekan" name="nama_dekan" placeholder="nama_dekan" value="<?php echo $nama_dekan; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">nip_dekan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nip_dekan" name="nip_dekan" placeholder="nip_dekan" value="<?php echo $nip_dekan; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">tahun_akademik</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="tahun_akademik" name="tahun_akademik" placeholder="tahun_akademik" value="<?php echo $tahun_akademik; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">kota</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="kota" name="kota" placeholder="kota" value="<?php echo $kota; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">tgl_cetak</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="tgl_cetak" name="tgl_cetak" placeholder="tgl_cetak" value="<?php echo $tgl_cetak; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">sebutan_pt</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="sebutan_pt" name="sebutan_pt" placeholder="sebutan_pt" value="<?php echo $sebutan_pt; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">sebutan_fakultas</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="sebutan_fakultas" name="sebutan_fakultas" placeholder="sebutan_fakultas" value="<?php echo $sebutan_fakultas; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">sebutan_dekan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="sebutan_dekan" name="sebutan_dekan" placeholder="sebutan_dekan" value="<?php echo $sebutan_dekan; ?>" />
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
		