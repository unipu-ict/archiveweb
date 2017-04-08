<!-- Evidencija korisnika - unos i izmjene - 17.03.2017. -->
<form action="<?php echo base_url()."evidencija_korisnika/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->evidencija_korisnika_id)){?><input type="hidden"  name="id" value="<?php echo isset($data->evidencija_korisnika_id) ?$data->evidencija_korisnika_id : "";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="id_korisnika">Identifikacijski broj: <span class="text-red">*</span></label>
      <input type="text" placeholder="Identifikacijski broj" class="form-control" id="id_korisnika" name="id_korisnika" required value="<?php echo isset($data->id_korisnika)?$data->id_korisnika:"";?>">
    </div>
    <div class="form-group">
      <label for="rb_upisa">Redni broj prijave: <span class="text-red">*</span></label>
      <input type="text" placeholder="Redni broj prijave" class="form-control" id="rb_upisa" name="rb_upisa" required value="<?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>">
    </div>
    <div class="form-group">
      <label for="prezime_i_ime">Prezime i ime: <span class="text-red">*</span></label>
      <input type="text" placeholder="Prezime i ime" class="form-control" id="prezime_i_ime" name="prezime_i_ime" required value="<?php echo isset($data->prezime_i_ime)?$data->prezime_i_ime:"";?>">
    </div>
    <div class="form-group">
      <label for="adresa_stalna">Adresa stalnog boravka: <span class="text-red">*</span></label>
      <input type="text" placeholder="Adresa stalnog boravka" class="form-control" id="adresa_stalna" name="adresa_stalna" required value="<?php echo isset($data->adresa_stalna)?$data->adresa_stalna:"";?>">
    </div>
    <div class="form-group">
      <label for="mjesto_stalno">Mjesto stalnog boravka: <span class="text-red">*</span></label>
      <?php echo selectBoxDynamic("mjesto_stalno","mjesta","mjesto",isset($data->mjesto_stalno) ?$data->mjesto_stalno:"", required);?>
    </div>
    <div class="form-group">
      <label for="adresa_privremena">Adresa privremenog boravka: </label>
      <input type="text" placeholder="Adresa privremenog boravka" class="form-control" id="adresa_privremena" name="adresa_privremena" value="<?php echo isset($data->adresa_privremena)?$data->adresa_privremena:"";?>">
    </div>
    <div class="form-group">
      <label for="mjesto_privremeno">Mjesto privremenog boravka: </label>
      <?php echo selectBoxDynamic("mjesto_privremeno","mjesta","mjesto",isset($data->mjesto_privremeno) ?$data->mjesto_privremeno:"");?>
    </div>
    <div class="form-group">
      <label for="datum_rodenja">Datum rođenja: <span class="text-red">*</span></label>
      <input type="text" placeholder="Datum rođenja" class="form-control" id="datum_rodenja" name="datum_rodenja" required value="<?php echo isset($data->datum_rodenja)?date("Y-m-d",strtotime($data->datum_rodenja)):date("Y-m-d",strtotime("now"));?>">
      <script>
      $( function() {
        $("#datum_rodenja").datepicker({dateFormat : 'yy-mm-dd'});
        $("#datum_rodenja").datepicker("option", "changeMonth", true);
        $("#datum_rodenja").datepicker("option", "changeYear", true);
        $("#datum_rodenja").datepicker("option", "showAnim", "drop");
        $("#datum_rodenja").datepicker();
      } );
      </script>
    </div>
    <div class="form-group">
      <label for="mjesto_rodenja">Mjesto rođenja: <span class="text-red">*</span></label>
      <?php echo selectBoxDynamic("mjesto_rodenja","mjesta","mjesto",isset($data->mjesto_rodenja) ?$data->mjesto_rodenja:"", required);?>
    </div>
    <div class="form-group">
      <label for="zvanje">Zvanje, zanimanje i ustanova zaposlenja: <span class="text-red">*</span></label>
      <textarea rows="3" class="form-control" id="zvanje" name="zvanje" required><?php echo isset($data->zvanje)?$data->zvanje:"";?></textarea>
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
