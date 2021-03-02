    <h1>REVIEWS</h1>

<div class="mt-3">
    <?php foreach ($feedbacks as $feedback) :  ?>
    <div class="row">
            <div class="col-lg-10">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $feedback->title ?></h4>
                        <p class="bg-light p-2 mb-3"> Written By <?php //echo $feedback->name ?></p>
                        <p class="card-text"><?php echo $feedback->body ?></p>
                    
                    </div>
                    <div class="card-footer">Created at: <?php echo $feedback->created_at ?></div>
                </div>
            </div>
    </div>
    <?php endforeach; ?>
</div>


<div class="row mt-5">
    <div class="col-lg-10 mx-auto">
        <div class="card card-body bg-light ">
            <h2>Leave your feedback</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">Title:<sup>*</sup></label>
                    <input type="text" name="title" id="title" class="<?php echo (!empty($errors['titleErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg" value="<?php echo $title ?>">
                    <span class='invalid-feedback'><?php echo $errors['titleErr'] ?></span>
                </div>
                <div class="form-group">
                    <label for="body">Your text:<sup>*</sup></label>
                    <textarea name="body" id="body" class="<?php echo (!empty($errors['bodyErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg"><?php echo $body ?></textarea>
                    <span class='invalid-feedback'><?php echo $errors['bodyErr'] ?></span>
                </div>
                <div class="col">
                    <input type="submit" value="Create" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
</div>