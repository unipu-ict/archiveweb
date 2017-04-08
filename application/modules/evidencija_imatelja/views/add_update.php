<!-- Evidencija imatelja - unos i izmjene - 17.03.2017. -->
<form action="<?php echo base_url()."evidencija_imatelja/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->evidencija_imatelja_id)){?><input type="hidden" name="id" value="<?php echo isset($data->evidencija_imatelja_id) ?$data->evidencija_imatelja_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_upisa">Redni broj upisa: <span class="text-red">*</span></label>
      <input type="text" placeholder="Redni broj upisa" class="form-control" id="rb_upisa" name="rb_upisa" required value="<?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>">
    </div>
    <div class="form-group">
      <label for="isprava_o_unosu">Datum, klasa i urbroj isprave o unosu: <span class="text-red">*</span></label>
      <textarea rows="3" class="form-control" id="isprava_o_unosu" name="isprava_o_unosu" required><?php echo isset($data->isprava_o_unosu)?$data->isprava_o_unosu:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="isprava_o_brisanju">Datum, klasa i urbroj isprave o brisanju: </label>
      <textarea rows="3" class="form-control" id="isprava_o_brisanju" name="isprava_o_brisanju"><?php echo isset($data->isprava_o_brisanju)?$data->isprava_o_brisanju:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="maticni_broj">Matični broj: <span class="text-red">*</span></label>
      <input type="text" placeholder="Matični broj" class="form-control" id="maticni_broj" name="maticni_broj" required value="<?php echo isset($data->maticni_broj)?$data->maticni_broj:"";?>">
    </div>
    <div class="form-group">
      <label for="naziv">Naziv(i)/prezime i ime: <span class="text-red">*</span></label>
      <textarea rows="3" class="form-control" id="naziv" name="naziv" required><?php echo isset($data->naziv)?$data->naziv:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="sjediste">Sjedište: <span class="text-red">*</span></label>
      <?php echo selectBoxDynamic("sjediste","mjesta","mjesto",isset($data->sjediste) ?$data->sjediste : "", required);?>
    </div>
    <div class="form-group">
      <label for="adresa">Adresa: <span class="text-red">*</span></label>
      <input type="text" placeholder="Adresa" class="form-control" id="adresa" name="adresa" required value="<?php echo isset($data->adresa)?$data->adresa:"";?>">
    </div>
    <div class="form-group">
      <label for="odgovorna_osoba">Odgovorna osoba: <span class="text-red">*</span></label>
      <input type="text" placeholder="Odgovorna osoba" class="form-control" id="odgovorna_osoba" name="odgovorna_osoba" required value="<?php echo isset($data->odgovorna_osoba)?$data->odgovorna_osoba:"";?>">
    </div>
    <div class="form-group">
      <label for="naziv_stvaratelja">Naziv(i)/prezime i ime stvaratelja: </label>
      <textarea rows="3" class="form-control" id="naziv" name="naziv_stvaratelja" required><?php echo isset($data->naziv_stvaratelja)?$data->naziv_stvaratelja:"";?></textarea>
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
  </div>
  <div class="box-footer">
    <input type="submit" value="Spremi" name="save" class="btn btn-primary btn-color" title="Spremi zapis">
    <input type="button" value="Poništi" class="btn btn-default" title="Natrag na listu" data-dismiss="modal">
  </div>
</form>
