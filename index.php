<?php
	include_once "pages/header.php";
?>

          <!-- page content -->
			<?php
				session_start();
				$loginState = $_SESSION['loginState'];

				switch ($loginState) {
					case 'admin':
						include_once "pages/menu.php";
						$form = $_GET['pageid'];

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
						}else if($form == "admPencabutan"){
							include_once "pages/content/adminPencabutan.php";
						}else{
							echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?pageid=admDash\">";
						}
					break;
					case 'user':
						include_once "pages/menuUser.php";
						$form = $_GET['pageid'];

						if($form == 'userDash'){
							include_once "pages/content/userDashboard.php";
						}else if($form == 'userPenerbitan'){
							include_once "pages/content/userPenerbitan.php";
						}else if($form == 'formPenerbitan'){
							include_once "pages/content/userPengajuanPenerbitan.php";
						}else if($form == 'template_surat'){
							include_once "pages/content/templateSuratDownload.php";
						}else if($form == 'profile'){
							include_once "pages/content/userProfile.php";
						}else if($form == 'userPencabutan'){
							include_once "pages/content/userPencabutan.php";
						}else{
							echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?pageid=userDash\">";
						}
					break;

					default:
						header('location: loginUser.php');
					break;
				}

			?>
            <!-- ?php
				include_once "pages/content/opd.php"
			?-->
          <!-- /page content -->

<?php
	include_once "pages/footer.php";
?>
