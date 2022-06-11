<?php echo validation_errors(); ?>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <br><br><br>
                    <h3 class="mb-4 text-center">Please enter the scores</h3>
                    <?php echo form_open('scores/evaluation') ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group"><label for="first_half_score">First Half (Score)</label>
                        <input type="number" name="first_half_score" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="first_half_survey">First Half (Survey)</label>
                        <input type="number" name="first_half_survey" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="second_half_score">Second Half (Score)</label>
                        <input type="number" name="second_half_score" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="second_half_survey">Second Half (Survey)</label>
                        <input type="number" name="second_half_survey" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="w-100 btn btn-lg btn-dark" type="submit">Create</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>