<?php echo validation_errors(); ?>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <br><br><br>
                    <h3 class="mb-4 text-center">Please sign in</h3>
                    <?php echo form_open('logins/login') ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="w-100 btn btn-lg btn-dark" type="submit">Login</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>