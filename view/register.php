<h2 class="text-center mt-5">Registracija naujiems klientams</h2>

<div class="row">
    <div class="col-md-6 mx-auto text-center">
        <div class="card card-body bg-info mt-5" >
            <form action="" method="post">
                <div class="form-row m-1">
                    <label for="email">El. paštas:<sup>*</sup></label>
                    <input type="text" name="email" id="email" class="form-control form-control-lg" value="">  
                </div>
                <div class="form-row m-1">
                    <label for="password">Slaptažodis:<sup>*</sup></label>
                    <input type="text" name="password" id="password" class="form-control form-control-lg" value="<?php ?>">   
                </div>
                <div class="form-row m-1">
                    <label for="passwordRpt">Pakartokite slaptažodį:<sup>*</sup></label>
                    <input type="text" name="passwordRpt" id="passwordRpt" class="form-control form-control-lg" value="<?php ?>"> 
                </div>
                <div class="form-row m-1">
                    <label for="name">Vardas:<sup>*</sup></label>
                    <input type="text" name="name" id="name" class="form-control form-control-lg" value="">  
                </div>
                <div class="form-row m-1">
                    <label for="surname">Pavardė:<sup>*</sup></label>
                    <input type="text" name="surname" id="surname" class="form-control form-control-lg" value="">  
                </div>
                <div class="form-row m-1">
                    <label for="address">Adresas:</label>
                    <input type="text" name="address" id="address" class="form-control form-control-lg" value="">  
                </div>
                <div class="form-row m-1">
                    <label for="phone">Telefonas:</label>
                    <input type="tel" name="phone" id="phone" class="form-control form-control-lg" value="">  
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-secondary">Registruotis</button>            
                </div>
            </form>
        </div>
    </div>
</div>