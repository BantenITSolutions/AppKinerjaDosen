		<div id="content">
			<div id="content-header">
				<h1>Aplikasi Beban Kerja Dosen</h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current" style="text-transform:capitalize;"><?php echo $bidang; ?></a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5 style="text-transform:capitalize;"><?php echo $bidang; ?></a></h5>
							</div>
							<div class="widget-content nopadding">
							
							<div class="well">
								<?php echo form_open_multipart("admin/kinerja_bidang/simpan"); ?>
								
								<label for="menu">Nomor</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nomor" name="nomor" placeholder="Nomor" value="<?php echo $nomor; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Nama Dosen</label>
								<div class="cleaner_h5"></div>
								<select name="id_dosen">
									<?php
										foreach($dosen->result_array() as $d)
										{
											if($id_dosen==$d['id_dosen'])
											{
												echo '<option value="'.$d['id_dosen'].'" selected>'.$d['nama'].'</option>';
											}
											else
											{
												
												echo '<option value="'.$d['id_dosen'].'">'.$d['nama'].'</option>';
											}
										}
									?>
								</select>
								<div class="cleaner_h10"></div>
								
								<label for="menu">Jenis Kegiatan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Jenis Kegiatan" value="<?php echo $jenis_kegiatan; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Bukti Penugasan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="bukti_penugasan" name="bukti_penugasan" placeholder="Bukti Penugasan" value="<?php echo $bukti_penugasan; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">SKS Penugasan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="sks_penugasan" name="sks_penugasan" placeholder="SKS Penugasan" value="<?php echo $sks_penugasan; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Masa Penugasan</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="masa_penugasan" name="masa_penugasan" placeholder="Masa Penugasan" value="<?php echo $masa_penugasan; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Bukti Dokumen</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="bukti_dokumen" name="bukti_dokumen" placeholder="Bukti Dokumen" value="<?php echo $bukti_dokumen; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">SKS Dokumen</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="sks_dokumen" name="sks_dokumen" placeholder="SKS Dokumen" value="<?php echo $sks_dokumen; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Rekomendasi</label>
								<div class="cleaner_h5"></div>
								<select name="id_rekomendasi">
									<?php
										foreach($rekomendasi->result_array() as $d)
										{
											if($id_rekomendasi==$d['id_rekomendasi'])
											{
												echo '<option value="'.$d['id_rekomendasi'].'" selected>'.$d['rekomendasi'].'</option>';
											}
											else
											{
												
												echo '<option value="'.$d['id_rekomendasi'].'">'.$d['rekomendasi'].'</option>';
											}
										}
									?>
								</select>
								<div class="cleaner_h10"></div>
								
								<input type="hidden" name="id_param" value="<?php echo $id_param; ?>" />
								<input type="hidden" name="tipe" value="<?php echo $tipe; ?>" />
								<input type="hidden" name="jenis_kinerja" value="<?php echo $bidang; ?>" />
								<div class="cleaner_h10"></div>
								<input type="submit" class="btn btn-info" value="SIMPAN" />
								<?php echo form_close(); ?>
							</div>						
							</div>
						</div>
						
					</div>
				</div>
		