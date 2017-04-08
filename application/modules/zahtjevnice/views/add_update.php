<!-- Zahtjevnice - unos i izmjene - 21.03.2017. -->
<form action="<?php echo base_url()."zahtjevnice/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->zahtjevnice_id)){?><input type="hidden" name="id" value="<?php echo isset($data->zahtjevnice_id) ?$data->zahtjevnice_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_zahtjeva">Broj zahtjeva: <span class="text-red">*</span></label>
      <input type="text" placeholder="Broj zahtjeva" class="form-control" id="rb_zahtjeva" name="rb_zahtjeva" required value="<?php echo isset($data->rb_zahtjeva)?$data->rb_zahtjeva:"";?>">
    </div>
    <div class="form-group">
      <label for="prezime_i_ime">Prezime i ime korisnika: <span class="text-red">*</span></label>
      <?php echo selectBoxDynamic("prezime_i_ime","evidencija_korisnika","prezime_i_ime",isset($data->prezime_i_ime) ?$data->prezime_i_ime: "", required);?>
    </div>
    <div class="form-group">
      <label for="datum_zahtjeva">Datum zahtjeva: <span class="text-red">*</span></label>
      <input type="text" placeholder="Datum zahtjeva" class="form-control" id="datum_zahtjeva" name="datum_zahtjeva" required value="<?php echo isset($data->datum_zahtjeva)?date("Y-m-d",strtotime($data->datum_zahtjeva)):date("Y-m-d",strtotime("now"));?>">
      <script>
      $( function() {
        $("#datum_zahtjeva").datepicker({dateFormat: 'yy-mm-dd'});
        $("#datum_zahtjeva").datepicker("option", "changeMonth", true);
        $("#datum_zahtjeva").datepicker("option", "changeYear", true);
        $("#datum_zahtjeva").datepicker("option", "showAnim", "drop");
        $("#datum_zahtjeva").datepicker();
      } );
      </script>
    </div>
    <div class="form-group">
      <label>Podaci o naručenome gradivu: <span class="text-red">*</span></label>
      <textarea class="form-control" readonly="">NAPOMENA: Korišteno gradivo u zahtjevnici unosite nakon što spremite ovaj zapis!</textarea>
    </div>
    <div class="form-group">
      <label for="oblik_koristenja">Oblik korištenja: <span class="text-red">*</span></label>
      <select name="oblik_koristenja" class="form-control" id="oblik_koristenja" required>
        <option value="">Odaberi</option>
        <option value="Korištenje izvornika" <?php if(isset($data->oblik_koristenja) && ($data->oblik_koristenja=="Korištenje izvornika")){echo "selected";}?>>Korištenje izvornika</option>
        <option value="Korištenje kopije" <?php if(isset($data->oblik_koristenja) && ($data->oblik_koristenja=="Korištenje kopije")){echo "selected";}?>>Korištenje kopije</option>
        <option value="Narudžba za snimanje gradiva" <?php if(isset($data->oblik_koristenja) && ($data->oblik_koristenja=="Narudžba za snimanje gradiva")){echo "selected";}?>>Narudžba za snimanje gradiva</option></select>
      </div>
      <div class="form-group">
        <label for="napomena">Napomena: </label>
        <textarea rows="3" class="form-control" id="napomena" name="napomena" ><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
      </div>
      <div class="heedingInformStyle">Kontrola zapisa</div>
      <div class="form-group">
        <label for="zapis_kreiran">Zapis kreiran: <span class="text-red">*</span></label>
        <input type="text" placeholder="Korisnik i datum" class="form-control" id="zapis_kreiran" name="zapis_kreiran" required value="<?php echo $this->session->userdata('user_details')[0]->name.", ".date('d.m.Y.');;?>" readonly>
      </div>
      </div>
      <div class="box-footer">
        <input type="submit" value="Spremi" name="save" class="btn btn-primary btn-color" title="Spremi zapis">
        <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
      </div>
</form>
