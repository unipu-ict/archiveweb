<!-- Stvaratelji - unos i izmjene view - 13.03.2017. -->
<form action="<?php echo base_url()."stvaratelji/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->stvaratelji_id)){?><input type="hidden" name="id" value="<?php echo isset($data->stvaratelji_id) ?$data->stvaratelji_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="naziv_stvaratelja">Stvaratelj: <span class="text-red">*</span></label>
      <input type="text" placeholder="Naziv stvaratelja" class="form-control" id="naziv_stvaratelja" name="naziv_stvaratelja" required value="<?php echo isset($data->naziv_stvaratelja)?$data->naziv_stvaratelja:"";?>">
    </div>
    <div class="form-group">
      <label for="vrijeme_djelovanja">Vrijeme djelovanja stvaratelja: <span class="text-red">*</span></label>
      <input type="text" placeholder="Vrijeme djelovanja stvaratelja" class="form-control" id="vrijeme_djelovanja" name="vrijeme_djelovanja" required value="<?php echo isset($data->vrijeme_djelovanja)?$data->vrijeme_djelovanja:"";?>">
    </div>
    <div class="form-group">
      <label for="mjesto">Sjedište: <span class="text-red">*</span></label>
      <?php echo selectBoxDynamic("mjesto","mjesta","mjesto",isset($data->mjesto)?$data->mjesto:"", required);?>
    </div>
    <div class="heedingInformStyle">Kontrola zapisa</div>
    <div class="form-group">
      <label for="zapis_kreiran">Zapis kreiran: <span class="text-red">*</span></label>
      <input type="text" placeholder="Zapis kreiran" class="form-control" id="zapis_kreiran" name="zapis_kreiran" required value="<?php echo $this->session->userdata('user_details')[0]->name.", ".date('d.m.Y.');;?>" readonly="">
    </div>
  </div>
  <div class="box-footer">
    <input type="submit" value="Spremi" name="save" class="btn btn-primary btn-color" title="Spremi zapis">
    <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
  </div>
</form>
