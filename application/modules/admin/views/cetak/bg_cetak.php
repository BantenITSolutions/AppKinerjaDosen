<script type="text/javascript">
window.print();
</script>
<table cellpadding="5">
	<tr>
		<td>Nomor Sertifikat</td>
		<td>:</td>
		<td><?php echo $no_sertifikat; ?></td>
	</tr>
	<tr>
		<td>NIDN</td>
		<td>:</td>
		<td><?php echo $nidn; ?></td>
	</tr>
	<tr>
		<td>NIP</td>
		<td>:</td>
		<td><?php echo $nip; ?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $nama; ?></td>
	</tr>
	<tr>
		<td>Nama PT</td>
		<td>:</td>
		<td><?php echo $nama_pt; ?></td>
	</tr>
	<tr>
		<td>Alamat PT</td>
		<td>:</td>
		<td><?php echo $alamat_pt; ?></td>
	</tr>
	<tr>
		<td>Fakultas</td>
		<td>:</td>
		<td><?php echo $fakultas; ?></td>
	</tr>
	<tr>
		<td>Program Studi</td>
		<td>:</td>
		<td><?php echo $prodi; ?></td>
	</tr>
	<tr>
		<td>Jabatan Fungsional</td>
		<td>:</td>
		<td><?php echo $jab_fungsional; ?></td>
	</tr>
	<tr>
		<td>Tempat Lahir</td>
		<td>:</td>
		<td><?php echo $tmp_lahir; ?></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td>
		<td>:</td>
		<td><select name="tgl_lahir" style="width:100px;">
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
</select></td>
	</tr>
	<tr>
		<td>S1</td>
		<td>:</td>
		<td><?php echo $s1; ?></td>
	</tr>
	<tr>
		<td>S2</td>
		<td>:</td>
		<td><?php echo $s2; ?></td>
	</tr>
	<tr>
		<td>S3</td>
		<td>:</td>
		<td><?php echo $s3; ?></td>
	</tr>
	<tr>
		<td>Jenis</td>
		<td>:</td>
		<td><?php echo $jenis; ?></td>
	</tr>
	<tr>
		<td>Bidang Ilmu</td>
		<td>:</td>
		<td><?php echo $bidang_ilmu; ?></td>
	</tr>
	<tr>
		<td>Nomor HP</td>
		<td>:</td>
		<td><?php echo $no_hp; ?></td>
	</tr>
	<tr>
		<td>Tahun Akademik</td>
		<td>:</td>
		<td><?php echo $tahun_akademik; ?></td>
	</tr>
	<tr>
		<td>Asesor 1</td>
		<td>:</td>
		<td><?php echo $asesor1; ?></td>
	</tr>
	<tr>
		<td>Asesor 2</td>
		<td>:</td>
		<td><?php echo $asesor2; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $email; ?></td>
	</tr>
</table>
<br><br>
<?php echo $dt_retrieve; ?>
