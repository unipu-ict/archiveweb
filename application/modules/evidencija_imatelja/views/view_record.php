<!-- Evidencija imatelja - pregled - 17.03.2017. -->
<form action="<?php echo base_url()."evidencija_imatelja/print_record"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px" target="blank">
  <?php if(isset($data->evidencija_imatelja_id)){?><input type="hidden" name="id" value="<?php echo isset($data->evidencija_imatelja_id) ?$data->evidencija_imatelja_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_upisa">Redni broj upisa: </label>
      <input type="text" class="form-control" id="rb_upisa" name="rb_upisa" value="<?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="isprava_o_unosu">Datum, klasa i urbroj isprave o unosu: </label>
      <textarea rows="3" class="form-control" id="isprava_o_unosu" name="isprava_o_unosu" disabled=""><?php echo isset($data->isprava_o_unosu)?$data->isprava_o_unosu:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="isprava_o_brisanju">Datum, klasa i urbroj isprave o brisanju: </label>
      <textarea rows="3" class="form-control" id="isprava_o_brisanju" name="isprava_o_brisanju" disabled=""><?php echo isset($data->isprava_o_brisanju)?$data->isprava_o_brisanju:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="maticni_broj">Matični broj: </label>
      <input type="text" class="form-control" id="maticni_broj" name="maticni_broj" value="<?php echo isset($data->maticni_broj)?$data->maticni_broj:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="naziv">Naziv(i)/prezime i ime: </label>
      <textarea rows="3" class="form-control" id="naziv" name="naziv" disabled><?php echo isset($data->naziv)?$data->naziv:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="sjediste">Sjedište: </label>
      <input type="text" class="form-control" id="sjediste" name="sjediste" value="<?php echo isset($data->mjesto)?$data->mjesto:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="adresa">Adresa: </label>
      <input type="text" class="form-control" id="adresa" name="adresa" required value="<?php echo isset($data->adresa)?$data->adresa:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="odgovorna_osoba">Odgovorna osoba: </label>
      <input type="text" class="form-control" id="odgovorna_osoba" name="odgovorna_osoba" value="<?php echo isset($data->odgovorna_osoba)?$data->odgovorna_osoba:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="naziv_stvaratelja">Naziv(i)/prezime i ime stvaratelja: </label>
      <textarea rows="3" class="form-control" id="naziv" name="naziv_stvaratelja" disabled=""><?php echo isset($data->naziv_stvaratelja)?$data->naziv_stvaratelja:"";?></textarea>
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
