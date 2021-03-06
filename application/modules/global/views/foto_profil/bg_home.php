<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title><?php echo $GLOBALS['site_title'].' - '.$GLOBALS['site_quotes']; ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" /> 
    
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
		
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/signin.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/css/chosen.css" rel="stylesheet" type="text/css" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

<div class="account-container">
	
	<div class="content clearfix">
		
		<?php echo form_open_multipart("global/foto_profil/simpan"); ?>
		
			<h1><?php echo $GLOBALS['site_title']; ?></h1>		
			
			<div class="login-fields">
				
				<p><?php echo $this->session->flashdata("result_login"); ?>
				
				<div class="field">
					<label for="username">Upload Foto :</label>
					<input type="file" id="username" name="userfile" placeholder="Foto..." class="login username-field" />
				</div> <!-- /field -->

				<input type="hidden" name="kode_user" value="<?php echo $kode_user; ?>">
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
									
				<input type="submit" class="button btn btn-warning btn-large" value="Save Changes"> <input type="reset" class="button btn btn-default btn-large" value="Reset">
				
			</div>
				<p align="center"><?php echo $GLOBALS['site_footer']; ?></p>
			
		<?php echo form_close(); ?>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->

	<script src="<?php echo base_url().'asset/theme/'.$GLOBALS['site_theme']; ?>/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/chosen.jquery.js" type="text/javascript"></script>
	<script type="text/javascript"> 
		$(".chzn-select").chosen();
	</script>

</body>
</html>
