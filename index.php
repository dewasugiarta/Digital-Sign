<?php
	include_once "pages/header.php";
	include_once "pages/menu.php";
	$form = $_GET['pageid'];
?>
          <!-- page content -->
			<?php
				if($form == 'opd'){
					include_once "pages/content/opd.php";
				}else if($form == 'penerbitan'){
					include_once "pages/content/penerbitan.php";
				}else if($form == 'admDash'){
					include_once "pages/content/adminDashboard.php";
				}else if($form == 'admUser'){
					include_once "pages/content/adminUserDashboard.php";
				}else if($form == 'template_surat'){
					include_once "pages/content/templateSurat.php";
				}else{
					header('location : login.php');
				}
			?>
            <!-- ?php
				include_once "pages/content/opd.php"
			?-->
          <!-- /page content -->

<?php
	include_once "pages/footer.php";
?>
