<!-- Akvizicije - pregled - 13.03.2017. -->
<form action="<?php echo base_url()."akvizicije/print_record"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px" target="_blank">
  <?php if(isset($data->akvizicije_id)){?><input type="hidden" name="id" value="<?php echo isset($data->akvizicije_id) ?$data->akvizicije_id : "";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_u_godini">Redni broj upisa tijekom godine: </label>
      <input type="text" class="form-control" id="rb_u_godini" name="rb_u_godini" value="<?php echo isset($data->rb_u_godini)?$data->rb_u_godini:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="datum_preuzimanja">Datum preuzimanja: </label>
      <input type="text" class="form-control" id="datum_preuzimanja" name="datum_preuzimanja" value="<?php echo date("d.m.Y.",strtotime($data->datum_preuzimanja));?>" disabled="">
    </div>
    <div class="form-group">
      <label for="predavatelj">Naziv i adresa predavatelja: </label>
      <input type="text" class="form-control" id="predavatelj" name="predavatelj" value="<?php echo isset($data->predavatelj)?$data->predavatelj.', '.$data->postanski_broj.' '.$data->mjesto:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="pravna_osnova_predaje">Pravna osnova predaje: </label>
      <input type="text" class="form-control" id="pravna_osnova_predaje" name="pravna_osnova_predaje" value="<?php echo isset($data->pravna_osnova_predaje)?$data->pravna_osnova_predaje:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="dokument">Dokument: </label>
      <input type="text" class="form-control" id="dokument" name="dokument" value="<?php echo isset($data->dokument)?$data->dokument:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="datum">Datum: </label>
      <input type="text" class="form-control" id="datum" name="datum" value="<?php echo date("d.m.Y.",strtotime($data->datum))?>" disabled="">
    </div>
    <div class="form-group">
      <label for="klasa">Klasa: </label>
      <input type="text" class="form-control" id="klasa" name="klasa" value="<?php echo isset($data->klasa)?$data->klasa:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="urbroj">Urbroj: </label>
      <input type="text" class="form-control" id="urbroj" name="urbroj" value="<?php echo isset($data->urbroj)?$data->urbroj:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="stvaratelj">Naziv stvaratelja gradiva: </label>
      <input type="text" class="form-control" id="stvaratelj" name="stvaratelj" value="<?php echo isset($data->naziv_stvaratelja)?$data->naziv_stvaratelja:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="sadrzaj_gradiva">Sadržaj gradiva: </label>
      <textarea rows="5" class="form-control" id="sadrzaj_gradiva" name="sadrzaj_gradiva" disabled><?php echo isset($data->sadrzaj_gradiva)?$data->sadrzaj_gradiva:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="vremenski_raspon">Vremenski raspon cjeline gradiva: </label>
      <input type="text" class="form-control" id="vremenski_raspon" name="vremenski_raspon" value="<?php echo isset($data->vremenski_raspon)?$data->vremenski_raspon:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="kolicina">Količina cjeline gradiva: </label>
      <input type="text" class="form-control" id="kolicina" name="kolicina" value="<?php echo isset($data->kolicina)?$data->kolicina:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="oznaka_fonda">Oznaka i naziv fonda ili zbirke kojima je gradivo pripojeno: </label>
      <input type="text" class="form-control" id="oznaka_fonda" name="oznaka_fonda" value="<?php echo isset($data->oznaka_fonda)?$data->signatura.', '.$data->naziv:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="smjestaj_gradiva">Smještaj gradiva: </label>
      <input type="text" class="form-control" id="smjestaj_gradiva" name="smjestaj_gradiva"  value="<?php echo isset($data->smjestaj_gradiva)?$data->smjestaj_gradiva:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="napomena">Napomena: </label>
      <textarea rows="5" class="form-control" id="napomena" name="napomena" disabled><?php echo isset($data->napomena)?$data->napomena:"";?></textarea>
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
