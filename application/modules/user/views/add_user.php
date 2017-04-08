<!-- Dodaj korisnika - 09.03.2017. -->
<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'user/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <!-- Unos korisnika -->
        <div class="form-group">
          <label for="">E-mail adresa:</label>
          <input type="email" name="email" value="<?php echo isset($userData->email)?$userData->email:'';?>" required class="form-control" placeholder="E-mail adresa">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Korisničko ime:</label>
          <input type="text" name="name" value="<?php echo isset($userData->name)?$userData->name:'';?>" required class="form-control" placeholder="Korisničko ime">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="status">Status:</label>
          <select name="status" id="" class="form-control" required>
            <option value="aktivan" <?php echo (isset($userData->status) && $userData->status == 'aktivan')?'selected':''; ?> >Aktivan</option>
            <option value="izbrisan" <?php echo (isset($userData->status) && $userData->status == 'izbrisan')?'selected':''; ?> >Izbrisan</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="">Vrsta korisnika:</label>
          <?php $u_type=isset($userData->user_type)?$userData->user_type:'';
          $user_type=getAllDataByTable('permission');
          ?>
          <select name="user_type" class="form-control" required>
            <?php foreach($user_type as $option){$sel='';if(strtolower($option->user_type)==strtolower($u_type)){$sel="selected";}
            if(strtolower($option->user_type) != 'admin'){?>
              <option value="<?php echo $option->user_type;?>" <?php echo $sel; ?> ><?php echo ucfirst($option->user_type);?> </option>
              <?php } }?>
            </select>
          </div>
        </div>
        <?php if(isset($userData)){ ?>
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Zaporka:</label>
              <input type="text" style="display: none">
              <input type="Password" name="currentpassword" class="form-control" value="" placeholder="Zaporka">
            </div>
          </div>
          <?php }
          else { ?>
            <!-- Izmjena korisnika -->
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Zaporka:</label>
                <input type="Password" name="password" class="form-control" value="" required placeholder="Zaporka">
              </div>
            </div>
            <?php } if(isset($userData)){ ?>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Nova zaporka:</label>
                  <input type="Password" name="password" class="form-control" value="" placeholder="Nova zaporka">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Potvrdite zaporku:</label>
              <input type="Password" name="confirmPassword" class="form-control" value="" placeholder="Potvrda zaporke">
            </div>
          </div>
          <?php } ?>
          <!-- Profilna slika - upload -->
          <div class="col-md-12">
            <div class="form-group imsize">
              <label for="exampleInputFile">Korisnička slika:</label>
              <div class="pic_size" id="image-holder">
                <?php if(isset($userData->profile_pic) && file_exists('assets/images/'.$userData->profile_pic)){
                  $profile_pic=$userData->profile_pic;
                }else{
                  $profile_pic='user.png';
                } ?>
                <left> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo isset($profile_pic)?$profile_pic:'user.png';?>" alt="User profile picture"></left>
              </div> <input type="file" name="profile_pic" id="exampleInputFile">
            </div>
          </div>
        </div>
        <?php if(!empty($userData->users_id)){?>
          <input type="hidden" name="users_id" value="<?php echo isset($userData->users_id)?$userData->users_id:'';?>">
          <input type="hidden" name="fileOld" value="<?php echo isset($userData->profile_pic)?$userData->profile_pic:'';?>">
          <div class="box-footer sub-btn-wdt">
            <button type="submit" name="edit" value="edit" class="btn btn-success wdt-bg">Izmjeni</button>
          </div>
          <?php }else{?>
            <div class="box-footer sub-btn-wdt">
              <button type="submit" name="submit" value="add" class="btn btn-success wdt-bg">Spremi</button>
        </div>
    <?php }?>
</form>
