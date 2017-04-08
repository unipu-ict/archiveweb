<!-- Predavatelji - unos i izmjene - 11.03.2017. -->
<form action="<?php echo base_url()."predavatelji/add_edit"; ?>"
  method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->predavatelji_id)){?><input type="hidden" name="id" value="<?php echo isset($data->predavatelji_id) ?$data->predavatelji_id : "";?>"><?php }?>
    <div class="box-body"><div class="form-group">
      <label for="predavatelj">Predavatelj: <span class="text-red">*</span></label>
      <input type="text" placeholder="Naziv predavatelja" class="form-control" id="predavatelj" name="predavatelj" required value="<?php echo isset($data->predavatelj)?$data->predavatelj:"";?>">
    </div>
    <div class="form-group">
      <label for="vrsta">Vrsta predavatelja: <span class="text-red">*</span></label>
      <select name="vrsta" class="form-control" id="vrsta" required><option value="">Odaberi</option>
        <option value="Pravna osoba"<?php if(isset($data->vrsta) && ($data->vrsta=="Pravna osoba")){ echo "selected";}?>>Pravna osoba</option>
        <option value="Fizička osoba"<?php if(isset($data->vrsta) && ($data->vrsta=="Fizička osoba")){ echo "selected";}?>>Fizička osoba</option>
        <option value="Obitelj"<?php if(isset($data->vrsta) && ($data->vrsta=="Obitelj")){ echo "selected";}?>>Obitelj</option>
      </select>
    </div>
    <div class="form-group">
      <label for="mjesto">Mjesto: <span class="text-red">*</span></label>
      <?php echo selectBoxDynamic("mjesto","mjesta","mjesto",isset($data->mjesto)?$data->mjesto:"", required);?>
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
