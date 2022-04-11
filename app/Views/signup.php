<script>
  function validateUser() {
    const password = document.getElementById("password").value;
    const cpassword = document.getElementById("cpassword").value;

    if (password.length < 8) {
      document.getElementById("err").innerHTML =
        "Password should be greater than or equal to 8 characters!";
      return false;
    }

    if (password !== cpassword) {
      document.getElementById("err").innerHTML = "Password is not matching!";
      return false;
    }
  }
</script>


<div class="container col-md-4" style="margin-top:20px">
  <h2 class="text-primary text-center">Registration Page</h2>
  <hr />
  <form method="post" action="<?php echo base_url() ?>/account/signup_action" onsubmit="return validateUser()">
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" class="form-control" required />
    </div>
    <br />
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="" required />
    </div>
    <?php
    if($err == 'exists'){
      ?>
      <div class="form-group">
      <small class="text-danger"><?php echo "Email already exists"?></small>
      </div>
    <?php
    }
    ?>
    <br />
    <div class="form-group">
      <label>Password</label>
      <input
        type="password"
        name="password"
        id="password"
        class="form-control"
        value=""
        required
      />
    </div>
    <br />
    <div class="form-group">
      <label>Confirm Password</label>
      <input
        type="password"
        name="cpassword"
        id="cpassword"
        class="form-control"
        value=""
        required
      />
    </div>
    <div class="form-group">
      <small id="err" class="text-danger"></small>
    </div>
    <br />
    <button class="btn btn-primary" name="submit">Submit</button>
    <br />
    <br />
    <p>Already have an account <a href ="<?= base_url('account/login'); ?>">Login here</a></p>
  </form>
</div>
