		<div id="content">
			<div id="content-header">
				<h1>Aplikasi Beban Kerja Dosen</h1>
			<div id="breadcrumb">
				<a href="<?php echo base_url(); ?>app_route" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current">User Management</a>			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon"><i class="icon-th"></i></span>
								<h5>User Management</a></h5>
							</div>
							<div class="widget-content nopadding">
							
							<div class="well">
								<?php echo form_open_multipart("admin/dosen/simpan"); ?>
								
								<label for="menu">Nomor Sertifikat</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="no_sertifikat" name="no_sertifikat" placeholder="Nomor Sertifikat" value="<?php echo $no_sertifikat; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">NIDN</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nidn" name="nidn" placeholder="NIDN" value="<?php echo $nidn; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">NIP</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nip" name="nip" placeholder="NIP" value="<?php echo $nip; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Nama</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama; ?>" required />
								<div class="cleaner_h10"></div>

								<label for="menu">Username</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="username" name="username" placeholder="Username" value="<?php echo $username; ?>" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Password</label>
								<div class="cleaner_h5"></div>
								<input type="password" style="width:90%;" id="password" name="password" placeholder="Password" />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Nama PT</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="nama_pt" name="nama_pt" placeholder="Nama PT" value="<?php echo $nama_pt; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Alamat PT</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="alamat_pt" name="alamat_pt" placeholder="Alamat PT" value="<?php echo $alamat_pt; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Fakultas</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="fakultas" name="fakultas" placeholder="Fakultas" value="<?php echo $fakultas; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Program Studi</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="prodi" name="prodi" placeholder="Program Studi" value="<?php echo $prodi; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Jabatan Fungsional</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="jab_fungsional" name="jab_fungsional" placeholder="Jabatan Fungsional" value="<?php echo $jab_fungsional; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Tempat Lahir</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="tmp_lahir" name="tmp_lahir" placeholder="Tempat Lahir" value="<?php echo $tmp_lahir; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Tanggal Lahir</label>
								<div class="cleaner_h5"></div>
								<select name="tgl_lahir" style="width:100px;">
									<?php
										for($i=1;$i<=31;$i++)
										{
											if($tgl_lahir==$i)
											{
												echo '<option value="'.$i.'" selected>'.$i.'</option>';
											}
											else
											{
												echo '<option value="'.$i.'">'.$i.'</option>';
											}
										}
									?>
								</select>
								
								<select name="bln_lahir" style="width:100px;">
									<?php
										for($i=1;$i<=12;$i++)
										{
											if($bln_lahir==$i)
											{
												echo '<option value="'.$i.'" selected>'.$i.'</option>';
											}
											else
											{
												echo '<option value="'.$i.'">'.$i.'</option>';
											}
										}
									?>
								</select>
								
								<select name="thn_lahir" style="width:100px;">
									<?php
										for($i=1940;$i<=date('Y');$i++)
										{
											if($thn_lahir==$i)
											{
												echo '<option value="'.$i.'" selected>'.$i.'</option>';
											}
											else
											{
												echo '<option value="'.$i.'">'.$i.'</option>';
											}
										}
									?>
								</select>
								<div class="cleaner_h10"></div>
								
								<label for="menu">S1</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="s1" name="s1" placeholder="S1" value="<?php echo $s1; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">S2</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="s2" name="s2" placeholder="S2" value="<?php echo $s2; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">S3</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="s3" name="s3" placeholder="S3" value="<?php echo $s3; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Jenis</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="jenis" name="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Bidang Ilmu</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="bidang_ilmu" name="bidang_ilmu" placeholder="Bidang Ilmu" value="<?php echo $bidang_ilmu; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Nomor HP</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="no_hp" name="no_hp" placeholder="Nomor HP" value="<?php echo $no_hp; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Tahun Akademik</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="tahun_akademik" name="tahun_akademik" placeholder="Tahun Akademik" value="<?php echo $tahun_akademik; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Asesor 1</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="asesor1" name="asesor1" placeholder="Asesor 1" value="<?php echo $asesor1; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Asesor 2</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="asesor2" name="asesor2" placeholder="Asesor 2" value="<?php echo $asesor2; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Email</label>
								<div class="cleaner_h5"></div>
								<input type="search" style="width:90%;" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required />
								<div class="cleaner_h10"></div>
								
								<label for="menu">Foto</label>
								<div class="cleaner_h5"></div>
								<input type="file" style="width:90%;" id="userfile" name="userfile" placeholder="Foto dosen" />
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
		