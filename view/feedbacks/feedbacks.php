<div class="m-3">
    <div class="text-center">
        <h1 class="m-5">CUSTOMER TESTIMONIALS</h1>
        <h3><i>90% of our new revenue annually comes from our customers, partners and vendors referring us to new companies.  WHY? Read what our customers are saying about us.</i> </h3>
    </div>


    <div class="row mt-5">
        <?php foreach ($feedbacks as $feedback) :  ?>
        <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header"><?php echo $feedback->title ?></div>
                    <div class="card-body">
                        <h5 class="card-title"> <i>Writen by: <?php echo $feedback->name ?></i> </h5>
                        <p class="card-text"><?php echo $feedback->body ?></p>
                        <p><?php echo $feedback->feedbackCreated; ?></p>
                    </div>
                </div>
        </div>
        <?php endforeach; ?>
    </div>    
    

        <?php if(\app\core\Session::isUserLoggedIn()) : ?> 
            <!-- <div class="row mt-5 justify-content-center">        
                <button  class="btn btn-info" style="margin-left: 30px;" onclick="showForm()">Leave Your Feedback Here </button>  
            </div>

        <script>
            function showForm() {
                document.getElementById('formAddFeedback').style.display = 'block';
            }
        </script>   -->
        <div id="formAddFeedback" class="row mt-5">
            <div class="col-sm-6 mx-auto">
                <div class="card card-body bg-light " id="feedback">
                    <h2>Leave your feedback</h2>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="title">Title:<sup>*</sup></label>
                            <input type="text" name="title" id="title" class="<?php echo (!empty($errors['titleErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="">
                            <span class='invalid-feedback'><?php echo $errors['titleErr'] ?></span>
                        </div>
                        <div class="form-group">
                            <label for="body">Your text:<sup>*</sup></label>
                            <textarea name="body" id="body" class="<?php echo (!empty($errors['bodyErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg"></textarea>
                            <span class='invalid-feedback'><?php echo $errors['bodyErr'] ?></span>
                        </div>
                        <div class="col">
                            <input type="submit" value="Create" class="btn btn-primary btn-block">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>  
</div>
