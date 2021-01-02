<div class="container row position-absolute start-50 translate-middle justify-content-center">
    <div class="col-md-5 text-center position-absolute" style="margin-top: 10%">
        <div class="card p-3">
            <h2>New Account</h2>
            <form class="px-5" method="POST" action="<?php echo $upPrefix; ?>admin/addAccount">
                <div class="form-floating mx-2 mt-5 mb-2">
                    <input type="text" class="form-control" name="username" id="username" style="border: none; border-bottom: 1px solid black; border-radius: 0" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating input-group-append mx-2 mb-2">
                    <input type="password" class="form-control" name="password" id="password" style="border: none; border-bottom: 1px solid black; border-radius: 0" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <span class="mt-3 border-bottom border-dark" id="mybutton" onclick="change('password')"><i class="far fa-eye"></i></span>
                </div>
                <div class="form-floating input-group-append mx-2 mb-5">
                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" style="border: none; border-bottom: 1px solid black; border-radius: 0" placeholder="Confirm Password">
                    <label for="floatingPassword">Confirm Password</label>
                    <span class="mt-3 border-bottom border-dark" id="mybutton2" onclick="change2('confirmPassword')"><i class="far fa-eye"></i></span>
                </div>
                <div class="form-group mb-3 text-danger">
                    <?php echo $message; ?>
                </div>
                <div class="form-group mb-3">
                    <button type="button" onclick="window.location.href='<?php echo $upPrefix; ?>admin/dataOverall'" class="btn btn-lg bg-dark text-white">CANCEL</button>
                    <button type="submit" class="btn btn-lg bg-dark text-white">CREATE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="background"></div>