<!-- Mjesta - unos i izmjene - 14.03.2017. -->
<form action="<?php echo base_url()."mjesta/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->mjesta_id)){?><input type="hidden" name="id" value="<?php echo isset($data->mjesta_id) ?$data->mjesta_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="mjesto">Mjesto: <span class="text-red">*</span></label>
      <input type="text" placeholder="Mjesto" class="form-control" id="mjesto" name="mjesto" required value="<?php echo isset($data->mjesto)?$data->mjesto:"";?>"  >
    </div>
    <div class="form-group">
      <label for="postanski_broj">Poštanski broj: <span class="text-red">*</span></label>
      <input type="text" placeholder="Poštanski broj" class="form-control" id="postanski_broj" name="postanski_broj" required value="<?php echo isset($data->postanski_broj)?$data->postanski_broj:"";?>">
    </div>
    <div class="form-group">
      <label for="drzava">Država: <span class="text-red">*</span></label>
      <input type="text" placeholder="Država" class="form-control" id="drzava" name="drzava" required value="<?php echo isset($data->drzava)?$data->drzava:"";?>">
    </div>
    <div class="heedingInformStyle">Kontrola zapisa</div>
    <div class="form-group">
      <label for="zapis_kreiran">Zapis kreiran: <span class="text-red">*</span></label>
      <input type="text" placeholder="Korisnik i datum" class="form-control" id="zapis_kreiran" name="zapis_kreiran" required value="<?php echo $this->session->userdata('user_details')[0]->name.", ".date('d.m.Y.');;?>" readonly="">
    </div>
  </div>
  <div class="box-footer">
    <input type="submit" value="Spremi" name="save" class="btn btn-primary btn-color" title="Spremi zapis">
    <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
  </div>
</form>
