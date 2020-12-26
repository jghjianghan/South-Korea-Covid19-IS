<div class="container row position-absolute start-50 translate-middle justify-content-center">
    <div class="col-md-5 text-center position-absolute" style="margin-top: 16%">
        <div class="card p-3">
            <h2>Change Password</h2>
            <form class="px-5" method="POST" action="<?php echo $upPrefix; ?>admin/changePassword">
                <div class="form-floating my-3">
                    <input type="password" class="form-control" name="oldPassword" id="oldPassword" style="border: none; border-bottom: 1px solid black; border-radius: 0" placeholder="Old Password">
                    <label for="floatingPassword">Old Password</label>
                </div>
                <div class="form-floating my-3">
                    <input type="password" class="form-control" name="newPassword" id="newPassword" style="border: none; border-bottom: 1px solid black; border-radius: 0" placeholder="New Password">
                    <label for="floatingPassword">New Password</label>
                </div>
                <div class="form-floating mb-5">
                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" style="border: none; border-bottom: 1px solid black; border-radius: 0" placeholder="Confirm Password">
                    <label for="floatingPassword">Confirm Password</label>
                </div>
                <div class="form-group mb-3">
                    <button type="button" onclick="window.location.href='<?php echo $upPrefix; ?>admin/dataOverall'" class="btn btn-lg bg-dark text-white">CANCEL</button> 
                    <button type="submit" class="btn btn-lg bg-dark text-white">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="background"></div>