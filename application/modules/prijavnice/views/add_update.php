<!-- Prijavnice - unos i izmjene - 20.03.2017. -->
<form action="<?php echo base_url()."prijavnice/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->prijavnice_id)){?><input type="hidden" name="id" value="<?php echo isset($data->prijavnice_id) ?$data->prijavnice_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_prijave">Redni broj prijave u godini: <span class="text-red">*</span></label>
      <input type="text" placeholder="Redni broj prijave u godini" class="form-control" id="rb_prijave" name="rb_prijave" required value="<?php echo isset($data->rb_prijave)?$data->rb_prijave:"";?>">
    </div>
    <div class="form-group">
      <label for="prezime_i_ime">Prezime i ime korisnika: <span class="text-red">*</span></label>
      <?php echo selectBoxDynamic("prezime_i_ime","evidencija_korisnika","prezime_i_ime",isset($data->prezime_i_ime) ?$data->prezime_i_ime : "", required);?>
    </div>
    <div class="form-group">
      <label for="tema_ili_podrucje_istrazivanja">Tema ili područje istraživanja: <span class="text-red">*</span></label>
      <textarea rows="3" class="form-control" id="tema_ili_podrucje_istrazivanja" name="tema_ili_podrucje_istrazivanja" required><?php echo isset($data->tema_ili_podrucje_istrazivanja)?$data->tema_ili_podrucje_istrazivanja:"";?></textarea>
    </div>
    <div class="form-group">
      <label>Fondovi i zbirke: <span class="text-red">*</span></label>
      <textarea class="form-control" readonly="">NAPOMENA: Naručeno gradivo u prijavnici unosite nakon što spremite ovaj zapis!</textarea>
    </div>
    <div class="form-group">
      <label for="svrha_koristenja">Svrha korištenja: <span class="text-red">*</span></label>
      <select name="svrha_koristenja" class="form-control" id="svrha_koristenja" required>
        <option value="">Odaberi</option>
        <option value="Članak" <?php if(isset($data->svrha_koristenja) && ($data->svrha_koristenja=="Članak")){echo "selected";}?>>Članak</option>
        <option value="Diplomski rad" <?php if(isset($data->svrha_koristenja) && ($data->svrha_koristenja=="Diplomski rad")){echo "selected";}?>>Diplomski rad</option>
        <option value="Doktorat" <?php if(isset($data->svrha_koristenja) && ($data->svrha_koristenja=="Doktorat")){echo "selected";}?>>Doktorat</option>
        <option value="Genealogija" <?php if(isset($data->svrha_koristenja) && ($data->svrha_koristenja=="Genealogija")){echo "selected";}?>>Genealogija</option>
        <option value="Magistarski rad" <?php if(isset($data->svrha_koristenja) && ($data->svrha_koristenja=="Magistarski rad")){echo "selected";}?>>Magistarski rad</option>
        <option value="Stručni rad" <?php if(isset($data->svrha_koristenja) && ($data->svrha_koristenja=="Stručni rad")){echo "selected";}?>>Stručni rad</option>
        <option value="Završni rad" <?php if(isset($data->svrha_koristenja) && ($data->svrha_koristenja=="Završni rad")){echo "selected";}?>>Završni rad</option>
        <option value="Privatna" <?php if(isset($data->svrha_koristenja) && ($data->svrha_koristenja=="Privatna")){echo "selected";}?>>Privatna</option>
        <option value="Ostalo" <?php if(isset($data->svrha_koristenja) && ($data->svrha_koristenja=="Ostalo")){echo "selected";}?>>Ostalo</option></select>
      </div>
      <div class="form-group">
        <label for="odgovorna_osoba">Odobrio/la: <span class="text-red">*</span></label>
        <input type="text" placeholder="Prezime i ime osobe koja je odobrila korištenje" class="form-control" id="odgovorna_osoba" name="odgovorna_osoba" required value="<?php echo isset($data->odgovorna_osoba)?$data->odgovorna_osoba:"";?>">
      </div>
      <div class="form-group">
        <label for="datum_odobrenja">Datum odobrenja: <span class="text-red">*</span></label>
        <input type="text" placeholder="Datum odobrenja" class="form-control" id="datum_odobrenja" name="datum_odobrenja" required value="<?php echo isset($data->datum_odobrenja)?date("Y-m-d",strtotime($data->datum_odobrenja)):date("Y-m-d",strtotime("now"));?>">
        <script>
        $( function() {
          $("#datum_odobrenja").datepicker({dateFormat: 'yy-mm-dd'});
          $("#datum_odobrenja").datepicker("option", "changeMonth", true);
          $("#datum_odobrenja").datepicker("option", "changeYear", true);
          $("#datum_odobrenja").datepicker("option", "showAnim", "drop");
          $("#datum_odobrenja").datepicker();
        } );
        </script>
      </div>
      <div class="form-group">
        <label for="napomena">Napomena: </label>
        <textarea rows="3" class="form-control" id="napomena" name="napomena"><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
      </div>
      <div class="heedingInformStyle">Kontrola zapisa</div>
      <div class="form-group">
        <label for="zapis_kreiran">Zapis kreiran: <span class="text-red">*</span></label>
        <input type="text" placeholder="Korisnik i datum" class="form-control" id="zapis_kreiran" name="zapis_kreiran" required value="<?php echo $this->session->userdata('user_details')[0]->name.", ".date('d.m.Y.');;?>" readonly>
      </div>
      <div class="box-footer">
        <input type="submit" value="Spremi" name="save" class="btn btn-primary btn-color" title="Spremi zapis">
        <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
      </div>
</form>
