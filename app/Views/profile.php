<div class="container col-md-6">
  <div class="row" style="margin-top:20px">
    <h2 class="text-primary text-center">Profile Page</h2>
    <h6 class="text-center">Add information about yourself</h6>
    <hr />
    <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>/UserProfile/update_action">

      <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success"><?=session()->getFlashdata('success');?></div>
      <?php endif?>

      <?php if (session()->getFlashdata('fail')): ?>
      <div class="alert alert-danger"><?=session()->getFlashdata('fail');?></div>
      <?php endif?>

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?=session('name')?>" />
      </div>
      <br>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" readonly value="<?=session('email')?>" />
      </div>
      <br>
      <div class="form-group">
          <label>DOB</label>
          <input type="date" name="dob" class="form-control" value="<?=set_value('dob')?>" />
        </div>
        <br>

        <div class="form-group">
          <label>Upload Photo:</label>
          <input type="file" name="profilePic" value="<?=set_value('profilePic')?>">
          <input type="submit" name="upload" class="btn btn-primary" value="Upload">

          <?php if (session()->has('filepath')) {?>
              <img src="<?=session()->getFlashdata('filepath')?>" width="150px" height="150px"><br>
              <input type="hidden" name="profilePic" value="<?=session()->getFlashdata('imagePath')?>">
            <?php }?>
        </div>
        <span class="text-danger"><?=isset($validation) ? display_error($validation, 'profilePic') : ''?></span>
        <br />

        <br>
      <input type="submit" name="submit" class="btn btn-primary" value="Update">
    </form>
</div>
</div>



