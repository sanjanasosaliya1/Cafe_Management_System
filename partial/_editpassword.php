<div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: #fdf8f3;">
            <div class="modal-header" style="background: #7d6f69;">
                <h5 class="modal-title" id="forgotPasswordModal" style="color:white;">Update Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/cafe_management_system/partial/_managepassword.php" method="post">
                    <div class="text-left my-2">
                        <b><label for="username">Username:</label></b>
                        <input type="text" class="form-control" id="loginusername" name="loginusername" placeholder="Username" required>
                    </div>
                    <input type="hidden" name="userId" id="userId" value="<?php echo $userId; ?>">

                    <div class="text-left my-2">
                        <b><label for="password">New Password:</label></b>
                        <input type="password" class="form-control" id="loginpassword" name="loginpassword" placeholder="New Password" required>
                    </div>

                    <div class="text-left my-2">
                        <b><label for="password">Re-enter Password:</label></b>
                        <input type="password" class="form-control" id="re-loginpassword" name="re-loginpassword" placeholder="Re-enter Password" required>
                    </div>

                    <button type="submit" class="btn">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</div>
