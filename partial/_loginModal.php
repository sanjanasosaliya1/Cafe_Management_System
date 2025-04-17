<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: #fdf8f3;">
            <div class="modal-header" style="background: #7d6f69;">
                <h5 class="modal-title" id="loginModal" style="color:white;">Login Here</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partial/_handleLogin.php" method="post">
                    <div class="text-left my-2">
                        <b><label for="username">Username:</label></b>
                        <input type="text" class="form-control" id="loginusername" name="loginusername" placeholder="Username" required>
                    </div>
                    <div class="text-left my-2">
                        <b><label for="password">Password:</label></b>
                        <input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="Password" required data-toggle="password">
                    </div>

                    <div class="text-left my-2">
                        <label for="vercode"><b>Captcha</b></label>
                        <input type="text" name="vercode" id="vercode" class="form-control" placeholder="Captcha Code" required>
                        <img src="/cafe_management_system/admin/captcha.php" alt="Captcha">
                    </div>

                    <p>
                        <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#forgotPasswordModal" style="color: #4b2e0d; font-weight: bold;">
                            Forgot Password?
                        </a>
                    </p>

                    <button type="submit" class="btn">Submit</button>
                </form>
                <p class="mb-0 mt-1">Don't have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#signupModal" style="color: #4b2e0d;font-weight:bold">Sign Up Now</a>.</p>
            </div>
        </div>
    </div>
</div>

<?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/cafe_management_system/partial/_editpassword.php';

?>