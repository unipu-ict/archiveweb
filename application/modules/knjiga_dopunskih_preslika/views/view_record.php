<!-- Knjiga dopunskih preslika - pregled view - 16.03.2017. -->
<form action="<?php echo base_url()."knjiga_dopunskih_preslika/print_record"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px" target="blank">
  <?php if(isset($data->knjiga_dopunskih_preslika_id)){?><input type="hidden" name="id" value="<?php echo isset($data->knjiga_dopunskih_preslika_id) ?$data->knjiga_dopunskih_preslika_id:"";?>"> <?php } ?>
    <div class="box-body"><div class="form-group">
      <label for="rb_upisa">Redni broj upisa: </label>
      <input type="text" class="form-control" id="rb_upisa" name="rb_upisa" value="<?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="drzava">Država, mjesto i ustanova čije je gradivo preslikano: </label>
      <textarea rows="3" class="form-control" id="drzava" name="drzava" disabled=""><?php echo isset($data->drzava)?$data->drzava:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="signatura">Signatura i naziv fonda/zbirke: </label>
      <input type="text" class="form-control" id="signatura" name="signatura" value="<?php echo isset($data->signatura)?$data->signatura:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="signatura_izvornika">Signatura preslikane arhivske jedinice/izvornika: </label>
      <input type="text" class="form-control" id="signatura_izvornika" name="signatura_izvornika" value="<?php echo isset($data->signatura_izvornika)?$data->signatura_izvornika:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="sadrzaj_preslike">Sadržaj preslike: </label>
      <input type="text" class="form-control" id="sadrzaj_preslike" name="sadrzaj_preslike" value="<?php echo isset($data->sadrzaj_preslike)?$data->sadrzaj_preslike:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="vremenski_raspon_gradiva">Vremenski raspon gradiva: </label>
      <input type="text" class="form-control" id="vremenski_raspon_gradiva" name="vremenski_raspon_gradiva" value="<?php echo isset($data->vremenski_raspon_gradiva)?$data->vremenski_raspon_gradiva:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="podloga_snimanja">Podloga snimanja: </label>
      <input type="text" class="form-control" id="podloga_snimanja" name="podloga_snimanja" value="<?php echo isset($data->podloga_snimanja)?$data->podloga_snimanja:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="tehnika_snimanja">Tehnika snimanja: </label>
      <input type="text" class="form-control" id="tehnika_snimanja" name="tehnika_snimanja" value="<?php echo isset($data->tehnika_snimanja)?$data->tehnika_snimanja:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="format">Format filma ili digitalnog zapisa: </label>
      <input type="text" class="form-control" id="format" name="format" value="<?php echo isset($data->format)?$data->format:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="oblik_filma">Oblik filma: </label>
      <input type="text" class="form-control" id="oblik_filma" name="oblik_filma" value="<?php echo isset($data->oblik_filma)?$data->oblik_filma:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="vrsta_preslike">Vrsta preslike: </label>
      <input type="text" class="form-control" id="vrsta_preslike" name="vrsta_preslike" value="<?php echo isset($data->vrsta_preslike)?$data->vrsta_preslike:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="generacija_preslika">Generacija preslika: </label>
      <input type="text" class="form-control" id="generacija_preslika" name="generacija_preslika" value="<?php echo isset($data->generacija_preslika)?$data->generacija_preslika:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="kolicina_zapisa">Količina zapisa: </label>
      <textarea rows="3" class="form-control" id="kolicina_zapisa" name="kolicina_zapisa" disabled><?php echo isset($data->kolicina_zapisa)?$data->kolicina_zapisa:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="datum_narudzbe">Datum narudžbe: </label>
      <input type="text" class="form-control" id="datum_narudzbe" name="datum_narudzbe" value="<?php echo date("d.m.Y.",strtotime($data->datum_narudzbe))?>" disabled="">
    </div>
    <div class="form-group">
      <label for="podaci_o_nabavi">Podaci o nabavi: </label>
      <textarea rows="3" id="podaci_o_nabavi" class="form-control" name="podaci_o_nabavi" disabled><?php echo isset($data->podaci_o_nabavi)?$data->podaci_o_nabavi:"";?></textarea>
    </div>
    <div class="form-group">
      <label for="oznaka_smjestaja">Oznaka smještaja/topografska oznaka preslike: </label>
      <input type="text" class="form-control" id="oznaka_smjestaja" name="oznaka_smjestaja" value="<?php echo isset($data->oznaka_smjestaja)?$data->oznaka_smjestaja:"";?>" disabled="">
    </div>
    <div class="form-group">
      <label for="dostupnost">Dostupnost: </label>
      <input type="text" class="form-control" id="dostupnost" name="dostupnost" required value="<?php echo isset($data->dostupnost)?$data->dostupnost:"";?>" disabled="">
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
