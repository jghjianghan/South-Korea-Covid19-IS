<div class="container row position-absolute start-50 translate-middle justify-content-center">
    <div class="col-md-5 text-center mt-5 position-absolute">
        <h1><strong>Welcome!</strong></h1>
        <p>Please login to access your account.</p>
        <div class="card p-3">
            <h2>Log In</h2>
            <form class="px-5" method="POST" action="<?php echo $upPrefix; ?>admin/login">
                <div class="form-floating mx-2 mt-5 mb-2">
                    <input type="text" class="form-control" name="username" id="username" style="border: none; border-bottom: 1px solid black; border-radius: 0" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mx-2 mb-5">
                    <input type="password" class="form-control" name="password" id="password" style="border: none; border-bottom: 1px solid black; border-radius: 0" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-group mb-3">
                    <input type="submit" value="LOGIN" class="btn btn-lg bg-dark text-white">
                </div>
            </form>
        </div>
    </div>
</div>
<p class="position-absolute bottom-0 start-50 translate-middle-x text-white">Stay Safe, Stay Healthy</p>

<div class="background"></div>