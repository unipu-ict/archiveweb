<!-- Akvizicije - unos i izmjene - 13.03.2017. -->
<form action="<?php echo base_url()."akvizicije/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->akvizicije_id)){?><input type="hidden" name="id" value="<?php echo isset($data->akvizicije_id) ?$data->akvizicije_id : "";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_u_godini">RB u godini: <span class="text-red">*</span></label>
      <input type="text" placeholder="Redni broj upisa tijekom godine" class="form-control" id="rb_u_godini" name="rb_u_godini" required value="<?php echo isset($data->rb_u_godini)?$data->rb_u_godini:"";?>">
    </div>
    <div class="form-group">
      <label for="datum_preuzimanja">Datum preuzimanja: <span class="text-red">*</span></label>
      <input type="text" placeholder="Datum preuzimanja" class="form-control" id="datum_preuzimanja" name="datum_preuzimanja" required value="<?php echo isset($data->datum_preuzimanja)?date("Y-m-d",strtotime($data->datum_preuzimanja)):date("Y-m-d",strtotime("now"));?>">
      <script>
      $( function() {
        $("#datum_preuzimanja").datepicker({dateFormat: 'yy-mm-dd'});
        $("#datum_preuzimanja").datepicker("option", "changeMonth", true);
        $("#datum_preuzimanja").datepicker("option", "changeYear", true);
        $("#datum_preuzimanja").datepicker("option", "showAnim", "drop");
        $("#datum_preuzimanja").datepicker();
      } );
      </script>
    </div>
    <div class="form-group">
      <label for="predavatelj">Predavatelj: <span class="text-red">*</span></label>
      <?php echo selectBoxDynamic("predavatelj","predavatelji","predavatelj",isset($data->predavatelj) ?$data->predavatelj:"", required);?>
    </div>
    <div class="form-group">
      <label for="pravna_osnova_predaje">Pravna osnova predaje: <span class="text-red">*</span></label>
      <select name="pravna_osnova_predaje" class="form-control" id="pravna_osnova_predaje"  required>
        <option value="">Odaberi</option>
        <option value="Otkup" <?php if(isset($data->pravna_osnova_predaje) && ($data->pravna_osnova_predaje=="Otkup")){ echo "selected";}?>>Otkup</option>
        <option value="Po službenoj dužnosti" <?php if(isset($data->pravna_osnova_predaje) && ($data->pravna_osnova_predaje=="Po službenoj dužnosti")){ echo "selected";}?>>Po službenoj dužnosti</option>
        <option value="Poklon" <?php if(isset($data->pravna_osnova_predaje) && ($data->pravna_osnova_predaje=="Poklon")){ echo "selected";}?>>Poklon</option>
      </select>
    </div>
    <div class="form-group">
      <label for="dokument">Dokument: <span class="text-red">*</span></label>
      <select name="dokument" class="form-control" id="dokument"  required>
        <option value="">Odaberi</option>
        <option value="Zapisnik o primopredaji arhivskog gradiva" <?php if(isset($data->dokument) && ($data->dokument == "Zapisnik o primopredaji arhivskog gradiva")){ echo "selected";}?>>Zapisnik o primopredaji arhivskog gradiva</option>
        <option value="Ugovor o predaji arhivskog gradiva" <?php if(isset($data->dokument) && ($data->dokument == "Ugovor o predaji arhivskog gradiva")){ echo "selected";}?>>Ugovor o predaji arhivskog gradiva</option>
        <option value="Ugovor o darovanju arhivskog gradiva" <?php if(isset($data->dokument) && ($data->dokument == "Ugovor o darovanju arhivskog gradiva")){ echo "selected";}?>>Ugovor o darovanju arhivskog gradiva</option>
        <option value="Kupoprodajni ugovor" <?php if(isset($data->dokument) && ($data->dokument == "Kupoprodajni ugovor")){ echo "selected";}?>>Kupoprodajni ugovor</option>
      </select>
    </div>
    <div class="form-group">
      <label for="datum">Datum: </label>
      <input type="text" placeholder="Datum" class="form-control" id="datum" name="datum" value="<?php echo isset($data->datum)?date("Y-m-d",strtotime($data->datum)):date("Y-m-d",strtotime("now"));?>">
      <script>
      $( function() {
        $("#datum").datepicker({dateFormat : 'yy-mm-dd'});
        $("#datum").datepicker("option", "changeMonth", true);
        $("#datum").datepicker("option", "changeYear", true);
        $("#datum").datepicker("option", "showAnim", "drop");
        $("#datum").datepicker();
      } );
      </script>
    </div>
    <div class="form-group">
      <label for="klasa">Klasa: </label>
      <input type="text" placeholder="Klasa" class="form-control" id="klasa" name="klasa" value="<?php echo isset($data->klasa)?$data->klasa:"";?>">
    </div>
    <div class="form-group">
      <label for="urbroj">Urbroj: </label>
      <input type="text" placeholder="Urbroj" class="form-control" id="urbroj" name="urbroj" value="<?php echo isset($data->urbroj)?$data->urbroj:"";?>">
    </div>
    <div class="form-group">
      <label for="stvaratelj">Stvaratelj: <span class="text-red">*</span></label>
      <?php echo selectBoxDynamic("stvaratelj","stvaratelji","naziv_stvaratelja",isset($data->stvaratelj) ?$data->stvaratelj:"", required);?>
    </div>
    <div class="form-group">
      <label for="sadrzaj_gradiva">Sadržaj gradiva: <span class="text-red">*</span></label>
      <textarea rows="5" class="form-control" id="sadrzaj_gradiva" name="sadrzaj_gradiva" required><?php echo isset($data->sadrzaj_gradiva)?$data->sadrzaj_gradiva:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="vremenski_raspon">Vremenski raspon cjeline gradiva: <span class="text-red">*</span></label>
      <input type="text" placeholder="Vremenski raspon cjeline gradiva" class="form-control" id="vremenski_raspon" name="vremenski_raspon" required value="<?php echo isset($data->vremenski_raspon)?$data->vremenski_raspon:"";?>">
    </div>
    <div class="form-group">
      <label for="kolicina">Količina cjeline gradiva: <span class="text-red">*</span></label>
      <input type="text" placeholder="Količina cjeline gradiva" class="form-control" id="kolicina" name="kolicina" required value="<?php echo isset($data->kolicina)?$data->kolicina:"";?>">
    </div>
    <div class="form-group">
      <label for="oznaka_fonda">Naziv fonda ili zbirke: </label>
      <?php echo selectBoxDynamic("oznaka_fonda","opci_inventar","naziv",isset($data->oznaka_fonda) ?$data->oznaka_fonda:"", required);?>
    </div>
    <div class="form-group">
      <label for="smjestaj_gradiva">Smještaj gradiva: </label>
      <input type="text" placeholder="Smještaj gradiva" class="form-control" id="smjestaj_gradiva" name="smjestaj_gradiva" value="<?php echo isset($data->smjestaj_gradiva)?$data->smjestaj_gradiva:"";?>">
    </div>
    <div class="form-group">
      <label for="napomena">Napomena: </label>
      <textarea rows="5" class="form-control" id="napomena" name="napomena" ><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
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
