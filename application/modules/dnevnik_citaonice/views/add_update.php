<!-- Prijavnice - unos i izmjene - 19.03.2017. -->
<form action="<?php echo base_url()."dnevnik_citaonice/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->dnevnik_citaonice_id)){?><input type="hidden" name="id" value="<?php echo isset($data->dnevnik_citaonice_id) ?$data->dnevnik_citaonice_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <div class="form-group">
        <label for="prezime_i_ime">Prezime i ime korisnika: <span class="text-red">*</span></label>
        <?php echo selectBoxDynamic("prezime_i_ime","evidencija_korisnika","prezime_i_ime",isset($data->prezime_i_ime) ?$data->prezime_i_ime:"", required);?>
      </div>
      <div class="form-group">
        <label for="datum_posjeta">Datum posjeta: <span class="text-red">*</span></label>
        <input type="text" placeholder="Datum posjeta" class="form-control" id="datum_posjeta" name="datum_posjeta" required value="<?php echo isset($data->datum_posjeta)?date("Y-m-d",strtotime($data->datum_posjeta)):date("Y-m-d",strtotime("now"));?>">
        <script>
        $( function() {
          $("#datum_posjeta").datepicker({dateFormat: 'yy-mm-dd'});
          $("#datum_posjeta").datepicker("option", "changeMonth", true);
          $("#datum_posjeta").datepicker("option", "changeYear", true);
          $("#datum_posjeta").datepicker("option", "showAnim", "drop");
          $("#datum_posjeta").datepicker();
        } );
        </script>
      </div>
      <div class="form-group">
        <label for="vrijeme_ulaska">Vrijeme ulaska: <span class="text-red">*</span></label>
        <input type="text" placeholder="Vrijeme ulaska (hh:mm)" class="form-control" id="vrijeme_ulaska" name="vrijeme_ulaska" required value="<?php echo isset($data->vrijeme_ulaska)?$data->vrijeme_ulaska:"";?>">
      </div>
      <div class="form-group">
        <label for="vrijeme_izlaska">Vrijeme izlaska: <span class="text-red">*</span></label>
        <input type="text" placeholder="Vrijeme izlaska (hh:mm)" class="form-control" id="vrijeme_izlaska" name="vrijeme_izlaska" required value="<?php echo isset($data->vrijeme_izlaska)?$data->vrijeme_izlaska:"";?>">
      </div>
      <div class="form-group">
        <label for="napomena">Napomena: </label>
        <textarea rows="3" class="form-control" id="napomena" name="napomena"><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
      </div>
      <div class="heedingInformStyle">Kontrola zapisa</div>
      <div class="form-group">
        <label for="zapis_kreiran">Zapis kreiran: <span class="text-red">*</span></label>
        <input type="text" placeholder="Korisnik i datum" class="form-control" id="zapis_kreiran" name="zapis_kreiran" required value="<?php echo $this->session->userdata('user_details')[0]->name.", ".date('d.m.Y.');;?>" readonly="">
      </div>
      <div class="box-footer">
        <input type="submit" value="Spremi" name="save" class="btn btn-primary btn-color" title="Spremi zapis">
        <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
      </div>
</form>
