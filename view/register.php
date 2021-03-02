<h2 class="text-center mt-5">Register</h2>

<div class="row">
    <div class="col-md-6 mx-auto text-center">
        <div class="card card-body bg-info mt-5" >
            <form action="" method="post">
                <div class="form-row m-1">
                    <label for="email">Email:<sup>*</sup></label>
                    <input type="text" name="email" id="email" class="<?php echo (!empty($errors['emailErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $email; ?>">  
                    <span class='invalid-feedback'><?php echo $errors['emailErr'] ?></span>
                </div>
                <div class="form-row m-1">
                    <label for="password">Password:<sup>*</sup></label>
                    <input type="text" name="password" id="password" class="<?php echo (!empty($errors['passwordErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $password; ?>">
                    <span class='invalid-feedback'><?php echo $errors['passwordErr'] ?></span>   
                </div>
                <div class="form-row m-1">
                    <label for="passwordRpt">Confirm Password:<sup>*</sup></label>
                    <input type="text" name="passwordRpt" id="passwordRpt" class="<?php echo (!empty($errors['passwordRptErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $passwordRpt; ?>"> 
                    <span class='invalid-feedback'><?php echo $errors['passwordRptErr'] ?></span>
                </div>
                <div class="form-row m-1">
                    <label for="name">Name:<sup>*</sup></label>
                    <input type="text" name="name" id="name" class="<?php echo (!empty($errors['nameErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $name; ?>"> 
                    <span class='invalid-feedback'><?php echo $errors['nameErr'] ?></span> 
                </div>
                <div class="form-row m-1">
                    <label for="surname">Surname:<sup>*</sup></label>
                    <input type="text" name="surname" id="surname" class="<?php echo (!empty($errors['surnameErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $surname; ?>"> 
                    <span class='invalid-feedback'><?php echo $errors['surnameErr'] ?></span> 
                </div>
                <div class="form-row m-1">
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" class="<?php echo (!empty($errors['addressErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $address; ?>"> 
                    <span class='invalid-feedback'><?php echo $errors['addressErr'] ?></span> 
                </div>
                <div class="form-row m-1">
                    <label for="phone">Phone:</label>
                    <input type="tel" name="phone" id="phone" class="<?php echo (!empty($errors['phoneErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $phone; ?>">
                    <span class='invalid-feedback'><?php echo $errors['phoneErr'] ?></span>  
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-secondary">Register</button>            
                </div>
            </form>
        </div>
    </div>
</div>