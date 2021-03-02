<h2 class="text-center mt-5">Login</h2>
<div class="row">
    <div class="col-md-6 mx-auto text-center">
        <div class="card card-body bg-info mt-5">
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Your email:</label>
                    <input type="text" name="email" id="email" class="<?php echo (!empty($errors['emailErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="">
                    <span class='invalid-feedback'><?php echo $errors['emailErr'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="<?php echo (!empty($errors['passwordErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="">
                    <span class='invalid-feedback'><?php echo $errors['passwordErr'] ?></span>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <button type="submit" class="btn btn-secondary">Login</button>
                    </div>
                    <div class="col">
                        <a href="/register" class='btn btn-secondary'>No account? Register</a>
                    </div>            
                </div>
            </form>
        </div>
    </div>
</div>