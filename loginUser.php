<?php
    include_once "pages/header.php";
?>
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="process/user/loginUserProcess.php" method="post">
                        <h1>Login User</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="username" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="password" required="" />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit" name="login">Log in</button>
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
</body>
</html>
