<!-- Evidencija korisnika - unos i izmjene - 17.03.2017. -->
<form action="<?php echo base_url()."evidencija_korisnika/print_record"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px" target="blank">
  <?php if(isset($data->evidencija_korisnika_id)){?><input type="hidden" name="id" value="<?php echo isset($data->evidencija_korisnika_id) ?$data->evidencija_korisnika_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="id_korisnika">Identifikacijski broj: </label>
      <input type="text" class="form-control" id="id_korisnika" name="id_korisnika" value="<?php echo isset($data->id_korisnika)?$data->id_korisnika:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="rb_upisa">Redni broj prijave: </label>
      <input type="text" class="form-control" id="rb_upisa" name="rb_upisa" value="<?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="prezime_i_ime">Prezime i ime: </label>
      <input type="text" class="form-control" id="prezime_i_ime" name="prezime_i_ime" value="<?php echo isset($data->prezime_i_ime)?$data->prezime_i_ime:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="adresa_stalna">Adresa stalnog boravka: </label>
      <input type="text" class="form-control" id="adresa_stalna" name="adresa_stalna" value="<?php echo isset($data->adresa_stalna)?$data->adresa_stalna:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="mjesto_stalno">Mjesto stalnog boravka: </label>
      <input type="text" class="form-control" id="mjesto_stalno" name="mjesto_stalno" value="<?php echo isset($data->mjesto_sta)?$data->mjesto_sta:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="adresa_privremena">Adresa privremenog boravka: </label>
      <input type="text" class="form-control" id="adresa_privremena" name="adresa_privremena" value="<?php echo isset($data->adresa_privremena)?$data->adresa_privremena:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="mjesto_privremeno">Mjesto privremenog boravka: </label>
      <input type="text" class="form-control" id="mjesto_privremeno" name="mjesto_privremeno" value="<?php echo isset($data->mjesto_pri)?$data->mjesto_pri:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="datum_rodenja">Datum rođenja: </label>
      <input type="text" class="form-control" id="datum_rodenja" name="datum_rodenja" value="<?php echo date("d.m.Y.",strtotime($data->datum_rodenja));?>" disabled="">
    </div>
    <div class="form-group">
      <label for="mjesto_rodenja">Mjesto rođenja: </label>
      <input type="text" class="form-control" id="mjesto_rodenja" name="mjesto_rodenja" value="<?php echo isset($data->mjesto_rod)?$data->mjesto_rod:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="zvanje">Zvanje, zanimanje i ustanova zaposlenja: </label>
      <textarea rows="3" class="form-control" id="zvanje" name="zvanje" disabled=""><?php echo isset($data->zvanje)?$data->zvanje:"";?></textarea>
    </div>
    <div class="heedingInformStyle">Kontrola zapisa</div>
    <div class="form-group">
      <label for="zapis_kreiran">Zapis kreiran: </label>
      <input type="text" class="form-control" id="zapis_kreiran" name="zapis_kreiran" value="<?php echo isset($data->zapis_kreiran)?$data->zapis_kreiran:"";?>" disabled="">
    </div>
    </div>
    <div class="box-footer">
      <input type="submit" value="Ispiši" name="print" class="btn btn-primary btn-color" title="Ispiši zapis">
      <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
    </div>
</form>
