<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: #fdf8f3;">
            <div class="modal-header" style="background: #7d6f69;">
                <h5 class="modal-title" id="signupModal" style="color:white;">SignUp Here</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/cafe_management_system/partial/_handleSignup.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <b><label for="username">Username:</label></b>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Choose a Unique Username" required minlength="3" maxlength="11">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <b><label for="firstname">First name:</label></b>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <b><label for="lastname">Last name:</label></b>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <b><label for="email">Email:</label></b>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-group">
                        <b><label for="phone">Phone No:</label></b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">+91<input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" maxlength="10"></span>
                            </div>
                        </div>
                    </div>
                    <div class="text-left my-2">
                        <b><label for="password">Password:</label></b>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required data-toggle="password" minlength="4" maxlength="21">
                    </div>
                    <div class="text-left my-2">
                        <b><label for="password1">Renter Password:</label></b>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Renter password" required data-toggle="password" minlength="4" maxlength="21">
                    </div>

                    <div class="form-group">
                        <div class="text-left my-2">
                            <b><label for="profile">Profile Pic: </label></b>
                            <input type="file" class="form-control" name="profile" id="profile" accept=".jpg" style="border:none;">
                            <small id="info" class="form-text text-muted mx-3">Please upload pic for profile</small> 
                        </div>
                    </div>
                    <input type="submit" class="btn" value="submit">
                </form>
                <p class="mb-0 mt-1">Already have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal" style="color: #4b2e0d;font-weight:bold">Login here</a>.</p>
            </div>
        </div>
    </div>
</div>