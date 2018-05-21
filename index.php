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
						}else{
							echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?pageid=userDash\">";
						}
					break;
					case 'user':
						include_once "pages/menuUser.php";
						$form = $_GET['pageid'];

						if($form == 'userDash'){
							include_once "pages/content/userDashboard.php";
						}else if($form == 'userPenerbitan'){
							echo "penerbitan";
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
