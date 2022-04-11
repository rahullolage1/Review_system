<div class="container col-md-4" style="margin-top:25px">
    <h2 class="text-primary text-center">Login Page</h2><br>
    <form method="post" action="<?php echo base_url() ?>/account/login_action">    
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="" required>
        </div>
        <br>   
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="" required>
        </div>
        <?php
    if($err){
      ?>
      <div class="form-group">
      <small class="text-danger"><?php echo "Invalid Email ID or Password"?></small>
      </div>
    <?php
    }
    ?>
        <br>
        <button class="btn btn-primary" name="submit">Login</button>
        <br>
        <br>
        <p>Have no account? <a href ="<?= base_url('account/signup'); ?>">Register here</a></p>
    </form>       
</div>
