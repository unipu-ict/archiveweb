<!-- Moj profil - 09.03.2017. -->
<div class="content-wrapper clearfix">
<div class="col-md-12 form f-label">
  <?php if($this->session->flashdata("messagePr")){?>
    <div class="alert alert-info">
      <?php echo $this->session->flashdata("messagePr")?>
    </div>
    <?php } ?>
    <!-- Korisnička slika -->
    <div class="box box-success pad-profile">
      <div class="box-header with-border">
        <h3 class="box-title">Moj profil <small>- pregled zapisa</small></h3>
      </div>
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'user/add_edit' ?>" class="form-label-left">
        <div class="box-body box-profile">
          <div class="col-md-3">
            <div class="pic_size" id="image-holder">
              <?php
              if(file_exists('assets/images/'.$user_data[0]->profile_pic) && isset($user_data[0]->profile_pic)){
                $profile_pic=$user_data[0]->profile_pic;
              }else{
                $profile_pic='user.png';}?>
                <center> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo isset($profile_pic)?$profile_pic:'user.png';?>" alt="Korisnička slika"></center>
              </div>
              <br>
              <div class="fileUpload btn btn-success wdt-bg">
                <span>Izmjeni profilnu sliku</span>
                <input id="fileUpload" class="upload" name="profile_pic" type="file" accept="image/*" /><br />
                <input type="hidden" name="fileOld" value="<?php echo isset($user_data[0]->profile_pic)?$user_data[0]->profile_pic:'';?>" />
              </div>
            </div>
            <!-- Podaci za moj profil -->
            <div class="col-md-8">
              <h3>Informacije:</h3>
              <div class="form-group has-feedback clear-both">
                <label for="exampleInputemail">E-mail adresa:</label>
                <input type="email" class="form-control" placeholder="E-mail adresa" id="email" name="email" value="<?php echo (isset($user_data[0]->email)?$user_data[0]->email:'');?>" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback clear-both">
                <label for="exampleInputname">Korisničko ime:</label>
                <input type="text" class="form-control" placeholder="Korisničko ime" id="name" name="name" value="<?php echo (isset($user_data[0]->name)?$user_data[0]->name:'');?>" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputstatus">Status:</label>
                  <select name="status" id="status" class="form-control" required>
                    <option value="aktivan" <?php echo (isset($user_data[0]->status) && $user_data[0]->status=='aktivan' ?'selected="selected"':'');?> >Aktivan</option>
                    <option value="izbrisan" <?php echo (isset($user_data[0]->status) && $user_data[0]->status=='izbrisan' ?'selected="selected"':'');?> >Izbrisan</option>
                  </select>
                </div>
                <br>
                <h3>Izmjeni zaporku:</h3>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Trenutna zaporka:</label>
                  <input id="pass11" class="form-control" pattern=".{6,}" type="password" placeholder="********" name="currentpassword" title="6-14 znakova">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Nova zaporka:</label>
                  <input type="password" class="form-control" placeholder="Nova zaporka" name="password">
                  <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Potvrdite novu zaporku:</label>
                  <input type="password" class="form-control" placeholder="Potvrda nove zaporke" name="confirmPassword">
                  <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                </div>
                <br>
                <div class="form-group has-feedback sub-btn-wdt" >
                  <input type="hidden" name="users_id" value="<?php echo isset($user_data[0]->users_id)?$user_data[0]->users_id:''; ?>">
                  <input type="hidden" name="user_type" value="<?php echo isset($user_data[0]->user_type)?$user_data[0]->user_type:''; ?>">
                  <button name="submit1" type="button" id="profileSubmit" class="btn btn-success btn-md wdt-bg">Spremi</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
