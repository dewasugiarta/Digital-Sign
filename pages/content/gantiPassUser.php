<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="https://denpasarkota.go.id/assets/templates/default/ico/favicon.png">

        <title>SIPERDIG ! | </title>

        <!-- Bootstrap -->
        <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="../../build/css/custom.min.css" rel="stylesheet">

    </head>

    <body class="nav-md">

    <!-- //Ganti Password Page  -->
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="../../process/admin/gantiPassUserProcess.php" method="post">
                        <h1>Ganti Password</h1>
                        <div>
                            <input id="iduser" type="hidden" class="hidden form-control" name="iduser" required=""/ value="<?php echo $id=$_GET['id'];?>">
                        </div>
                        <div>
                            <input id="newPass" type="password" class="form-control"  placeholder="Password Baru" name="newPass"required="" />
                        </div>
                        <div>
                            <input id="confPass" type="password" class="form-control" onkeyup="confirmPass(this.value)" placeholder="Confirm Password" name="confPass" required="" />
                            <span><sup id="message"></sup></span>
                        </div>
                        <div>
                            <button id="updatePass" class="btn btn-default submit" type="submit" disabled name="updatePass">Ganti Password</button>
                        </div>

                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h2><i class="fa fa-shield"></i> SIPERDIG</h2>
                                <p>©2018 All Rights Reserved. Dinas Kominfo & Statistik</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Autosize -->
    <script src="../../vendors/autosize/dist/autosize.min.js"></script>
    <!-- admin user js -->
    <script>
    //confrim password
    function confirmPass(val){
        if ($('#newPass').val() === val) {
            $('#updatePass').prop('disabled', false);
            $('#message').html('password match');
        } else {
            $('#updatePass').prop('disabled', true);
            $('#message').html('confirm password not match')
        }
    }
    </script>


    </body>
    </html>
