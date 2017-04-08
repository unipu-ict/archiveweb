<!-- Evidencija stvaratelja - unos i izmjene - 17.03.2017. -->
<form action="<?php echo base_url()."evidencija_stvaratelja/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->evidencija_stvaratelja_id)){?><input type="hidden" name="id" value="<?php echo isset($data->evidencija_stvaratelja_id) ?$data->evidencija_stvaratelja_id:"";?>"> <?php }?>
    <div class="box-body"><div class="form-group">
      <label for="rb_upisa">Redni broj upisa: <span class="text-red">*</span></label>
      <input type="text" placeholder="Redni broj upisa" class="form-control" id="rb_upisa" name="rb_upisa" required value="<?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>">
    </div>
    <div class="form-group">
      <label for="datum_unosa">Datum unosa: <span class="text-red">*</span></label>
      <input type="text" placeholder="Datum unosa" class="form-control" id="datum_unosa" name="datum_unosa" required value="<?php echo isset($data->datum_unosa)?date("Y-m-d",strtotime($data->datum_unosa)):date("Y-m-d",strtotime("now"));?>">
      <script>
      $( function() {
        $("#datum_unosa").datepicker({dateFormat: 'yy-mm-dd'});
        $("#datum_unosa").datepicker("option", "changeMonth", true);
        $("#datum_unosa").datepicker("option", "changeYear", true);
        $("#datum_unosa").datepicker("option", "showAnim", "drop");
        $("#datum_unosa").datepicker();
      } );
      </script>
    </div>
    <div class="form-group">
      <label for="maticni_broj">Matični broj: <span class="text-red">*</span></label>
      <input type="text" placeholder="Matični broj" class="form-control" id="maticni_broj" name="maticni_broj" required value="<?php echo isset($data->maticni_broj)?$data->maticni_broj:"";?>">
    </div>
    <div class="form-group">
      <label for="naziv">Naziv(i)/prezime i ime: <span class="text-red">*</span></label>
      <textarea rows="5" class="form-control" id="naziv" name="naziv" required><?php echo isset($data->naziv)?$data->naziv:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="sjediste">Sjedište/prebivalište: <span class="text-red">*</span></label>
      <?php echo selectBoxDynamic("sjediste","mjesta","mjesto",isset($data->sjediste) ?$data->sjediste:"", required);?>
    </div>
    <div class="form-group">
      <label for="adresa">Adresa: <span class="text-red">*</span></label>
      <input type="text" placeholder="Adresa" class="form-control" id="adresa" name="adresa" required value="<?php echo isset($data->adresa)?$data->adresa:"";?>">
    </div>
    <div class="form-group">
      <label for="vrijeme_djelovanja">Vrijeme djelovanja: <span class="text-red">*</span></label>
      <input type="text" placeholder="Vrijeme djelovanja" class="form-control" id="vrijeme_djelovanja" name="vrijeme_djelovanja" required value="<?php echo isset($data->vrijeme_djelovanja)?$data->vrijeme_djelovanja:"";?>">
    </div>
    <div class="form-group">
      <label for="klasifikacija_djelatnosti">Klasifikacija djelatnosti: <span class="text-red">*</span></label>
      <input type="text" placeholder="Klasifikacija djelatnosti" class="form-control" id="klasifikacija_djelatnosti" name="klasifikacija_djelatnosti" required value="<?php echo isset($data->klasifikacija_djelatnosti)?$data->klasifikacija_djelatnosti:"";?>">
    </div>
    <div class="form-group">
      <label for="pravni_status">Pravni status: <span class="text-red">*</span></label>
      <select name="pravni_status" class="form-control" id="pravni_status" required>
        <option value="">Odaberi</option>
        <option value="Pravna osoba"<?php if(isset($data->pravni_status) && ($data->pravni_status=="Pravna osoba")){echo "selected";}?>>Pravna osoba</option>
        <option value="Fizička osoba"<?php if(isset($data->pravni_status) && ($data->pravni_status=="Fizička osoba")){echo "selected";}?>>Fizička osoba</option>
        <option value="Obitelj"<?php if(isset($data->pravni_status) && ($data->pravni_status=="Obitelj")){echo "selected";}?>>Obitelj</option>
      </select>
    </div>
    <div class="form-group">
      <label for="povijest_stvaratelja">Povijest stvaratelja: <span class="text-red">*</span></label>
      <textarea rows="3" class="form-control" id="povijest_stvaratelja" name="povijest_stvaratelja" required><?php echo isset($data->povijest_stvaratelja)?$data->povijest_stvaratelja:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="djelatnost">Djelatnost: <span class="text-red">*</span></label>
      <textarea rows="3" class="form-control" id="djelatnost" name="djelatnost" required><?php echo isset($data->djelatnost)?$data->djelatnost:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="organizacijski_ustroj">Organizacijski ustroj: <span class="text-red">*</span></label>
      <textarea rows="3" class="form-control" id="organizacijski_ustroj" name="organizacijski_ustroj" required><?php echo isset($data->organizacijski_ustroj)?$data->organizacijski_ustroj:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="kategorija">Kategorija: <span class="text-red">*</span></label>
      <select name="kategorija" class="form-control" id="kategorija" required>
        <option value=""></option>
        <option value="I. Kategorija"<?php if(isset($data->kategorija) && ($data->kategorija=="I. Kategorija")){echo "selected";}?>>I. Kategorija</option>
        <option value="II. Kategorija"<?php if(isset($data->kategorija) && ($data->kategorija=="II. Kategorija")){echo "selected";}?>>II. Kategorija</option>
        <option value="III. Kategorija"<?php if(isset($data->kategorija) && ($data->kategorija=="III. Kategorija")){echo "selected";}?>>III. Kategorija</option>
        <option value="Stvaratelj nije kategoriziran"<?php if(isset($data->kategorija) && ($data->kategorija=="Stvaratelj nije kategoriziran")){echo "selected";}?>>Stvaratelj nije kategoriziran</option>
      </select>
    </div>
    <div class="form-group">
      <label for="veze">Veze: </label>
      <textarea rows="3" class="form-control" id="veze" name="veze"><?php echo isset($data->veze)?$data->veze:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="naziv_imatelja">Naziv/prezime i ime imatelja gradiva: </label>
      <textarea rows="3" class="form-control" id="djelatnost" name="naziv_imatelja"><?php echo isset($data->naziv_imatelja)?$data->naziv_imatelja:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="napomena">Napomena: </label>
      <textarea rows="3" class="form-control" id="napomena" name="napomena" ><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
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
