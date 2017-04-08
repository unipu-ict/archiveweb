<!-- Prijavnice - pregled - 19.03.2017. -->
<form action="<?php echo base_url()."dnevnik_citaonice/print_record"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px" target="blank">
  <?php if(isset($data->dnevnik_citaonice_id)){?><input type="hidden" name="id" value="<?php echo isset($data->dnevnik_citaonice_id) ?$data->dnevnik_citaonice_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <div class="form-group">
        <label for="prezime_i_ime">Prezime, ime i identifikacijski broj korisnika: </label>
        <input type="text" class="form-control" id="prezime_i_ime" name="prezime_i_ime" value="<?php echo isset($data->prezime_i_ime)?$data->prezime_i_ime.' (ID: '.$data->id_korisnika.')':"";?>" disabled="">
      </div>
      <div class="form-group">
        <label for="datum_posjeta">Datum posjeta: </label>
        <input type="text" class="form-control" id="datum_posjeta" name="datum_posjeta" value="<?php echo date("d.m.Y.",strtotime($data->datum_posjeta));?>" disabled="">
      </div>
      <div class="form-group">
        <label for="vrijeme_ulaska">Vrijeme ulaska: </label>
        <input type="text" class="form-control" id="vrijeme_ulaska" name="vrijeme_ulaska" value="<?php echo isset($data->vrijeme_ulaska)?$data->vrijeme_ulaska:"";?>" disabled="">
      </div>
      <div class="form-group">
        <label for="vrijeme_izlaska">Vrijeme izlaska: </label>
        <input type="text" class="form-control" id="vrijeme_izlaska" name="vrijeme_izlaska" required value="<?php echo isset($data->vrijeme_izlaska)?$data->vrijeme_izlaska:"";?>" disabled="">
      </div>
      <div class="form-group">
        <label for="napomena">Napomena: </label>
        <textarea rows="3" class="form-control" id="napomena" name="napomena" disabled=""><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
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
