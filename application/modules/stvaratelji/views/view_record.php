<!-- Stvaratelji - pregled view - 13.03.2017. -->
<form action="<?php echo base_url()."stvaratelji/print_record"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px" target="_blank">
  <?php if(isset($data->stvaratelji_id)){?><input type="hidden" name="id" value="<?php echo isset($data->stvaratelji_id) ?$data->stvaratelji_id : "";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="naziv_stvaratelja">Naziv stvaratelja: </label>
      <input type="text" class="form-control" id="naziv_stvaratelja" name="naziv_stvaratelja" value="<?php echo isset($data->naziv_stvaratelja)?$data->naziv_stvaratelja:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="vrijeme_djelovanja">Vrijeme djelovanja stvaratelja: </label>
      <input type="text" class="form-control" id="vrijeme_djelovanja" name="vrijeme_djelovanja" value="<?php echo isset($data->vrijeme_djelovanja)?$data->vrijeme_djelovanja:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="mjesto">Sjedište: </label>
      <input type="text" class="form-control" id="mjesta" name="mjesta" value="<?php echo isset($data->mjesto)?$data->mjesto:"";?>" disabled="">
    </div>
    <div class="heedingInformStyle">Kontrola zapisa</div>
    <div class="form-group">
      <label for="zapis_kreiran">Zapis kreiran: </label>
      <input type="text" class="form-control" id="zapis_kreiran" name="zapis_kreiran" value="<?php echo isset($data->zapis_kreiran)?$data->zapis_kreiran:"";?>" disabled="">
    </div>
  </div>
  <div class="box-footer">
    <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
  </div>
</form>
