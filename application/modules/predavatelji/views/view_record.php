<!-- Predavatelji - pregled - 11.03.2017. -->
<form action="<?php echo base_url()."predavatelji/view_record"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->predavatelji_id)){?><input type="hidden" name="id" value="<?php echo isset($data->predavatelji_id) ?$data->predavatelji_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="predavatelj">Predavatelj: </label>
      <input type="text" class="form-control" id="predavatelj" name="predavatelj" value="<?php echo isset($data->predavatelj)?$data->predavatelj:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="vrsta">Vrsta predavatelja: </label>
      <input type="text" class="form-control" id="vrsta" name="vrsta" value="<?php echo isset($data->vrsta)?$data->vrsta:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="mjesto">Mjesto: </label>
      <input type="text" class="form-control" id="mjesta" name="mjesta" value="<?php echo isset($data->mjesto)?$data->postanski_broj.' '.$data->mjesto:"";?>" disabled="">
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
