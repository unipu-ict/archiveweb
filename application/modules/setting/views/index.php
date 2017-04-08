<!-- page content -->
<div class="content-wrapper settingPage">
  <section class="content">
    <?php if($this->session->flashdata("message")){?>
      <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $this->session->flashdata("message")?>
      </div>
      <?php } ?>
      <div class="box box-success" >
        <div class="box-header with-border">
          <h3 class="box-title">Korisničke ovlasti</h3>
        </div>
        <div class="box-body" style="background: rgb(249, 250, 252);">
          <div class="row">
            <div class="col-lg-12">
              <div class="tabbable tabs-left">
                <div class="tab-pane" id="permissionSetting">
                  <div class="panel-group" id="accordion">
                    <h5 class="over-title">
                      <div class="row form-horizontal">
                        <div class="col-md-3">
                          <a class="btn btn-o btn-success" id="addmoreRoles" href="#"><i class="fa fa-plus"></i> Dodaj vrstu korisnika</a>
                        </div>
                        <div class="col-md-9">
                          <div class="form-horizontal" id="addmoreRolesShow">
                            <form>
                              <div class="form-group">
                                <label for="roles" class="control-label col-md-2 thfont">Vrsta korisnika:</label>
                                <div class="col-md-5">
                                  <input type="text" name="roles" id="roles" class="form-control" placeholder="Unesite vrstu korisnika" />
                                  <p id="showRolesMSG" style="color:red;"></p>
                                </div>
                                <button type="button" id="rolesAdd" class="btn btn-success">Dodaj novi</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </h5>
                </div>
              <form class="form-horizontal" action="<?php echo base_url().'setting/permission' ?>" method="post">
                <?php
                $permission=getAllDataByTable('permission');
                $setPermission=array();
                $own_create = '';$own_read = '';$own_update = '';$own_delete = '';$own_view = '';
                $all_create = '';$all_read = '';$all_update = '';$all_delete = '';$all_view = '';
                $i=0;
                $permission=isset($permission)&&is_array($permission)&&!empty($permission)?$permission:array();
                if(isset($permission[1])) {
                  foreach($permission as $perkey=>$value){
                    $id=isset($value->id)?$value->id:'';
                    $user_type=isset($value->user_type)?$value->user_type:'';
                    $data=isset($value->data)?json_decode($value->data):'';
                    if($user_type=='admin'){}else{
                      ?>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $id;?>"><i class="fa fa-bars"></i> <?php echo 'Korisničke ovlasti za: '. ucfirst($user_type);?></a></h4>
                            </div>
                            <div id="collapse_<?php echo $id;?>" class="panel-collapse collapse <?php if($i==0){echo"in";}?>">
                              <div class="panel-body">
                                <table class="table table-bordered dt-responsive rolesPermissionTable">
                                  <thead>
                                    <tr class="showRolesPermission">
                                      <th scope="col" width="25%">Zapisi u aplikaciji</th>
                                      <th scope="col" width="15%">Dodaj novi</th>
                                      <th scope="col" width="15%">Čitanje</th>
                                      <th scope="col" width="15%">Izmjena</th>
                                      <th scope="col" width="15%">Brisanje</th>
                                      <th scope="col" width="15%">Pregled</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    if(isset($data) && !empty($data)){
                                      foreach($data as $perkey=>$valueR){
                                        $perkey=isset($perkey)?$perkey:'';
                                        $valueR=isset($valueR)?$valueR:'';
                                        if(isset($valueR)) {
                                          $setPermissionCheck = $valueR;
                                          $own_create = isset($setPermissionCheck->own_create)?$setPermissionCheck->own_create:'';
                                          $own_read = isset($setPermissionCheck->own_read)?$setPermissionCheck->own_read:'';
                                          $own_update = isset($setPermissionCheck->own_update)?$setPermissionCheck->own_update:'';
                                          $own_delete = isset($setPermissionCheck->own_delete)?$setPermissionCheck->own_delete:'';
                                          $own_view = isset($setPermissionCheck->own_view)?$setPermissionCheck->own_view:'';
                                          $all_create = isset($setPermissionCheck->all_create)?$setPermissionCheck->all_create:'';
                                          $all_read = isset($setPermissionCheck->all_read)?$setPermissionCheck->all_read:'';
                                          $all_update = isset($setPermissionCheck->all_update)?$setPermissionCheck->all_update:'';
                                          $all_delete = isset($setPermissionCheck->all_delete)?$setPermissionCheck->all_delete:'';
                                          $all_view = isset($setPermissionCheck->all_view)?$setPermissionCheck->all_view:'';
                                        } else {
                                          $setPermissionCheck=array();$own_create = '';$own_read = '';$own_update = '';$own_delete = '';$own_view = '';
                                          $all_create= '';$all_read = '';$all_update = '';$all_delete = '';$all_view = '';
                                        }
                                        ?>
                                        <tr>
                                          <th scope="col" colspan="6" class="showRolesPermission text-center"><?php echo ucfirst(str_replace('_', ' ', $perkey));?>
                                            <?php
                                            $user_type=str_replace(' ', '_SPACE_', $user_type);
                                            ?>
                                            <input type="hidden" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>]" value="<?php echo $perkey;?>" />
                                          </th>
                                        </tr>
                                        <tr>
                                          <th scope="row" class="thfont">Vlastiti zapisi</th>
                                          <td><input type="checkbox" class="chk_create" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_create]" value="1" <?php if($own_create==1){echo"checked";}?>/></td>
                                          <td><input type="checkbox" class="chk_read" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_read]"  value="1" <?php if($own_read==1){echo"checked";}?>/></td>
                                          <td><input type="checkbox" class="chk_update" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_update]"  value="1" <?php if($own_update==1){echo"checked";}?>/></td>
                                          <td><input type="checkbox" class="chk_delete" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_delete]" value="1" <?php if($own_delete==1){echo"checked";}?>/></td>
                                          <td><input type="checkbox" class="chk_view" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][own_view]" value="1" <?php if($own_view==1){echo"checked";}?>/></td>
                                        </tr>
                                        <tr>
                                          <th scope="row" class="thfont">Svi zapisi</th>
                                          <td>-</td>
                                          <td><input type="checkbox" class="chk_read" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][all_read]"  value="1" <?php if($all_read==1){echo"checked";}?>/></td>
                                          <td><input type="checkbox" class="chk_update" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][all_update]"  value="1" <?php if($all_update==1){echo"checked";}?> /></td>
                                          <td><input type="checkbox" class="chk_delete" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][all_delete]" value="1" <?php if($all_delete==1){echo"checked";}?>/></td>
                                          <td><input type="checkbox" class="chk_view" name="data[<?php echo $user_type;?>][<?php echo $perkey;?>][all_view]" value="1" <?php if($all_view==1){echo"checked";}?>/></td>
                                        </tr>
                                        <?php }
                                      } else {
                                        $blanckModule1=getRowByTableColomId('permission','admin','user_type','data');
                                        if(isset($blanckModule1) && $blanckModule1!='') {
                                          foreach(json_decode($blanckModule1) as $key1=>$value1) {
                                            ?>
                                            <tr>
                                              <th scope="col" colspan="5" class="showRolesPermission text-center"><?php echo ucfirst(str_replace('_', ' ', $key1));?>
                                                <?php
                                                $user_type=str_replace(' ', '_SPACE_', $user_type);
                                                ?>
                                                <input type="hidden" name="data[<?php echo $user_type;?>][<?php echo $key1;?>]" value="<?php echo $key1;?>" />
                                              </th>
                                            </tr>
                                            <tr>
                                              <th scope="row" class="thfont">Vlastiti zapisi</th>
                                              <td><input type="checkbox" class="chk_create" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][own_create]" value="1"/></td>
                                              <td><input type="checkbox" class="chk_read" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][own_read]"  value="1"/></td>
                                              <td><input type="checkbox" class="chk_update" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][own_update]"  value="1"/></td>
                                              <td><input type="checkbox" class="chk_delete" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][own_delete]" value="1"/></td>
                                              <td><input type="checkbox" class="chk_view" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][own_view]" value="1"/></td>
                                            </tr>
                                            <tr>
                                              <th scope="row" class="thfont">Svi zapisi</th>
                                              <td>-</td>
                                              <td><input type="checkbox" class="chk_read" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][all_read]"  value="1"/></td>
                                              <td><input type="checkbox" class="chk_update" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][all_update]"  value="1"/></td>
                                              <td><input type="checkbox" class="chk_delete" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][all_delete]" value="1"/></td>
                                              <td><input type="checkbox" class="chk_view" name="data[<?php echo $user_type;?>][<?php echo $key1;?>][all_view]" value="1"/></td>
                                            </tr>
                                            <?php
                                          }
                                        }
                                      }
                                      ?>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <?php
                            $i++;
                          }
                        }
                        ?>
                        <hr>
                        <input type="submit" name="save" value="Spremi" class="btn btn-wide btn-success margin-top-20" />
                        <?php } ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <script>
      $(document).ready(function() {
        $('#rolesAdd').prop('disabled', true);
        $('#roles').keyup(function() {
          if($(this).val()!='') {
            $('#rolesAdd').prop('disabled', false);
          }
          else{
            $('#rolesAdd').prop('disabled', true);
          }
        });
        $('#addmoreRolesShow').hide();
        $('#addmoreRoles').on('click', function(){
          $('#addmoreRolesShow').slideToggle();
        });
        $('#rolesAdd').on('click',function(event){
          var roles=$('#roles').val();
          if(roles!=''){
            var url_page = '<?php echo base_url().'setting/add_user_type'; ?>';
            event.preventDefault();
            $.ajax({
              type: "POST",
              url: url_page,
              data:{ action: 'ADDACTION',rolesName:roles},
              success: function (data) {
                if(data=='Unesena vrsta korisnika ('+ roles +') već postoji u aplikaciji, molimo unesite drugu.'){$("#showRolesMSG").html(data);}
                else{
                  $('#addmoreRolesShow').hide();
                  location.reload();
                }
              }
            });
          } else {
            $('#roles').focus();
          }
        });
        var url=document.location.toString();
        if (url.match('#')) {
          var tag=url.split('#')[1];
          if(tag=='templates-div'){
            $('#templates').click();
          }
          $('.nav-tabs a[href="#' + tag + '"]').tab('show');
        }
        // Promjena hash za page-reload
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
          window.location.hash=e.target.hash;
        });
      })
</script>
