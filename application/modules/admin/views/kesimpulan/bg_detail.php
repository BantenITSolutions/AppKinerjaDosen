		<div id="content">
			<div id="content-header">
				<h1>Aplikasi Beban Kerja Dosen</h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">Kesimpulan</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>Kesimpulan</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							<div class="well">
								<?php echo form_open_multipart("admin/kesimpulan/simpan"); ?>
								
								<label for="menu">No Sertifikat / NIP</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="tahun_akademik" name="tahun_akademik" placeholder="tahun_akademik" value="<?php echo $no_sertifikat." / ".$nip; ?>" required />
								
								<div class="cleaner_h10"></div>
								
								<label for="menu">Nama</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nama" name="nama" placeholder="nama" value="<?php echo $nama; ?>" required />
								
								<div class="cleaner_h10"></div>
								
								<label for="menu">Status</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="jenis" name="jenis" placeholder="jenis" value="<?php echo $jenis; ?>" required />
								
								<div class="cleaner_h10"></div>
								
								<label for="menu">Tahun Akademik</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="tahun_akademik" name="tahun_akademik" placeholder="tahun_akademik" value="<?php echo $tahun_akademik; ?>" required />
								<div class="cleaner_h10"></div>
								<?php echo form_close(); ?>

								<table class='table table-striped table-condensed'>
								<tr>
									<td>Keterangan</td>
									<td>Syarat</td>
									<td>Kinerja</td>
									<td>Kesimpulan</td>
								</tr>	
								<tr>
									<td>Pendidikan</td>
									<td>
										<?php
										if($jenis=="DT" || $jenis=="PT"){echo "Min 6 sks";}
										else{echo "Min 3 sks";}
										?>
									</td>
									<td><?php 
									$where['jenis_kinerja'] = "pendidikan";
									$where['id_dosen'] = $id_dosen;
									$pendidikan = $this->db->select_sum("sks_dokumen")->get_where("dlmbg_kinerja",$where)->row();
									echo $pendidikan->sks_dokumen;

									 ?></td>
									<td>
										<?php
										if($jenis=="DT" || $jenis=="PT"){if($pendidikan->sks_dokumen>=6){echo "M";}else {echo "T";}}
										else{if($pendidikan->sks_dokumen>=3){echo "M";}else {echo "T";}}
										?>
									</td>
								</tr>
								<tr>
									<td>Penelitian</td>
									<td>Boleh Kosong</td>
									<td><?php 
									$where2['jenis_kinerja'] = "penelitian";
									$where2['id_dosen'] = $id_dosen;
									$penelitian = $this->db->select_sum("sks_dokumen")->get_where("dlmbg_kinerja",$where2)->row();
									echo $penelitian->sks_dokumen;
									 ?></td>
									<td><?php if($penelitian->sks_dokumen>=0){echo "M";}else {echo "T";} ?></td>
								</tr>
								<tr>
									<td>Pendidikan + Penelitian</td>
									<td>
										<?php
										if($jenis=="DS" || $jenis=="PR"){echo "Min 18 sks";}
										else{echo "Min 3 sks";}
										?>
									</td>
									<td><?php 
									echo $sub = $pendidikan->sks_dokumen+$penelitian->sks_dokumen; ?></td>
									<td>
										<?php
										if($jenis=="DS" || $jenis=="PR"){if($sub>=18){echo "M";}else {echo "T";}}
										else{if($sub>=3){echo "M";}else {echo "T";}}
										?>
									</td>
								</tr>
								<tr>
									<td>Pengabdian</td>
									<td>Boleh Kosong</td>
									<td><?php 
									$where3['jenis_kinerja'] = "pengabdian";
									$where3['id_dosen'] = $id_dosen;
									$pengabdian = $this->db->select_sum("sks_dokumen")->get_where("dlmbg_kinerja",$where3)->row();
									echo $pengabdian->sks_dokumen;
									 ?></td>
									<td><?php if($pengabdian->sks_dokumen>=0){echo "M";}else {echo "T";} ?></td>
								</tr>
								<tr>
									<td>Penunjang/Pendukung</td>
									<td>Boleh Kosong</td>
									<td><?php 
									$where4['jenis_kinerja'] = "penunjang";
									$where4['id_dosen'] = $id_dosen;
									$penunjang = $this->db->select_sum("sks_dokumen")->get_where("dlmbg_kinerja",$where4)->row();
									echo $penunjang->sks_dokumen;
									 ?></td>
									<td><?php if($penunjang->sks_dokumen>=0){echo "M";}else {echo "T";} ?></td>
								</tr>
								<tr>
									<td>Pengabdian + Penunjang/Pendukung</td>
									<td>Boleh Kosong</td>
									<td><?php 
									echo $sub2 = $pengabdian->sks_dokumen+$penunjang->sks_dokumen; ?></td>
									<td><?php if($sub2>=3){echo "M";}else {echo "T";} ?></td>
								</tr>
								<?php
									if($jenis=="PT" || $jenis=="PR"){
								?>
								<tr>
									<td>Kewajiban Khusus</td>
									<td>Min 6 sks</td>
									<td><?php 
									$where5['jenis_kinerja'] = "kewajiban";
									$where5['id_dosen'] = $id_dosen;
									$kewajiban = $this->db->select_sum("sks_dokumen")->get_where("dlmbg_kinerja",$where5)->row();
									echo $penunjang->sks_dokumen;
									 ?></td>
									<td><?php if($kewajiban->sks_dokumen>=6){echo "M";}else {echo "T";} ?></td>
								</tr>
								<?php } ?>
								<tr>
									<td>Total Kinerja</td>
									<td>Max. 16 SKS</td>
									<td><?php echo $tot = $pendidikan->sks_dokumen+$pengabdian->sks_dokumen+$penelitian->sks_dokumen+$penunjang->sks_dokumen; ?></td>
									<td><?php if($tot<=32){echo "M";}else {echo "T";} ?></td>
								</tr>	
							</table>	
							</div>		
										
							</div>
						</div>
						
					</div>
				</div>
		