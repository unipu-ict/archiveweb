<!-- Mjesta - pregled view - 14.03.2017. -->
<form action="<?php echo base_url()."mjesta/print_record";?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px" target="blank">
  <?php if(isset($data->mjesta_id)){?><input type="hidden" name="id" value="<?php echo isset($data->mjesta_id) ?$data->mjesta_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="mjesto">Mjesto: </label>
      <input type="text" class="form-control" id="mjesto" name="mjesto" value="<?php echo isset($data->mjesto)?$data->mjesto:"";?>" readonly="">
    </div>
    <div class="form-group">
      <label for="postanski_broj">Poštanski broj: </label>
      <input type="text" class="form-control" id="postanski_broj" name="postanski_broj" value="<?php echo isset($data->postanski_broj)?$data->postanski_broj:"";?>" readonly="">
    </div>
    <div class="form-group">
      <label for="drzava">Država: </label>
      <input type="text" class="form-control" id="drzava" name="drzava" value="<?php echo isset($data->drzava)?$data->drzava:"";?>" readonly="">
    </div>
    <div class="heedingInformStyle">Kontrola zapisa</div>
    <div class="form-group">
      <label for="zapis_kreiran">Zapis kreiran: </label>
      <input type="text" class="form-control" id="zapis_kreiran" name="zapis_kreiran" required value="<?php echo $this->session->userdata('user_details')[0]->name.", ".date('d.m.Y.');;?>" readonly="">
    </div>
  </div>
  <div class="box-footer">
    <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
  </div>
</form>
