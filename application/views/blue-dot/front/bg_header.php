
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $GLOBALS['site_title'].' - '.$GLOBALS['site_quotes']; ?></title>
<meta name="description" content="Samas adalah akronim dari Sekretariat Bersama Sepeda yang secara harfiah berarti bersatu-(artikan sebagai: tidak hanya sekadar bergabung)-nya klub-klub sepeda se Denpasar dan sekitarnya dalam satu payung komunitas sepeda yang bermana Samas Denpasar." />
<meta name="keywords" content="samas, komunitas, sepeda, bali" />
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/css/samas.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/css/menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/scripts/menu.js"></script>
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/scripts/swfobject_modified.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/banner/nivo-slider.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/banner/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/banner/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/colorbox/colorbox.css" />
<script>!window.jQuery && document.write('<script src="<?php echo base_url(); ?>asset/<?php echo $GLOBALS['site_theme']; ?>/theme/<?php echo $GLOBALS['site_theme']; ?>/colorbox/jquery.min.js"><\/script>');</script>
<script src="<?php echo base_url(); ?>asset/colorbox/jquery.colorbox.js"></script>
<script>
	  $(document).ready(function(){
		  //Examples of how to assign the ColorBox event to elements
		  $(".group").colorbox({rel:'group', iframe:true, width:"70%", height:"70%"});
		  $(".ajax").colorbox();
		  $(".iframe").colorbox({rel:'group', iframe:true, width:"680", height:"70%"});
		  $(".iframe_member").colorbox({rel:'group', iframe:true, width:"800", height:"90%"});
		  $('.gallery').colorbox({rel:'gallery'});
		  $(".group3").colorbox({rel:'group2', iframe:true, width:"700px", height:"430px"});

	  });
</script>
</head>
<body>

<div id="MainContainer">

<div id="MainHeader"><div id="TopHeader"><div id="ContentTopHeader"><div id="Date">
	<?php 
	echo "Selamat ".salam(); 
	echo " | ";
	$tgl = explode("-",gmdate("Y-m-d", time()+60*60*7));
	echo nama_hari($tgl[2],$tgl[1],$tgl[0])

.', '.tgl_indo(gmdate("Y-m-d", time()+60*60*7)).' - '.gmdate("H:i:s", time()+60*60*7);  ?></div>
<div id="BtnReg">

<a href="<?php echo base_url(); ?>auth/registrasi"><img src="<?php echo base_url(); ?>asset/images/btn-reg-anggota.gif" alt="daftar anggota samas" width="112" height="20" border="0" style="float:right; padding-top:3px; margin-right:10px;" /></a>

</div>

</div></div>
<div id="MainHeader2"><div id="Header"><div id="LogoSamas"><a href="<?php echo base_url(); ?>">
	<img src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/images/samas-bali-logo-komunitas-sepeda.png" alt="logo samas bali" border="0" /></a></div>

</div></div></div>

<div id="MainMenu"><div id="Menu">
  <div class="suckertreemenu">
  	<?php echo $menu; ?>
</div>
</div></div>