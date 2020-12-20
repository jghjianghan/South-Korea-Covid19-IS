<div class="container row position-absolute top-50 start-50 translate-middle justify-content-center" style="z-index: 2;">
    <div class="col-md-5 text-center">
        <div class="card p-3">
            <h2>New Account</h2>
            <form class="px-5" method="GET" action="<?php echo $upPrefix; ?>admin/data">
                <div class="form-floating mx-2 mt-5 mb-2">
                    <input type="text" class="form-control" id="Username" style="border: none; border-bottom: 1px solid black; border-radius: 0" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mx-2 mb-5">
                    <input type="password" class="form-control" id="Password" style="border: none; border-bottom: 1px solid black; border-radius: 0" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="form-group mb-3">
                    <input type="submit" value="CREATE" class="btn btn-lg bg-dark text-white">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="background"></div>