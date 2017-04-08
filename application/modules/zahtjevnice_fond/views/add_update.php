<!-- Zahtjevnice_fond - unos i izmjene - 29.03.2017. -->
<form action="<?php echo base_url()."zahtjevnice_fond/add_edit"; ?>" method="post" role="form" id="form" enctype="multipart/form-data" style="padding: 0px 30px">
  <?php if(isset($data->zahtjevnice_fond_id)){?><input type="hidden" name="id" value="<?php echo isset($data->zahtjevnice_fond_id) ?$data->zahtjevnice_fond_id:"";?>"> <?php } ?>
    <div class="box-body">
      <div class="form-group">
        <label for="id_zahtjeva">Redni broj zahtjeva (u zahtjevnici): <span class="text-red">*</span></label>
        <?php echo selectBoxDynamic("id_zahtjeva","zahtjevnice","rb_zahtjeva",isset($data->id_zahtjeva)?$data->id_zahtjeva:"", required);?>
      </div>
      <div class="form-group">
        <label for="signatura_fonda">Signatura: <span class="text-red">*</span></label>
          <?php echo selectBoxDynamic("signatura_fonda","opci_inventar","signatura",isset($data->signatura_fonda)?$data->signatura_fonda:"", required);?>
      </div>
      <div class="form-group">
        <label for="oznaka">Oznaka arhivske jedinice: <span class="text-red">*</span></label>
          <input type="text" placeholder="Oznaka arhivske jedinice" class="form-control" id="oznaka" name="oznaka" required value="<?php echo isset($data->oznaka)?$data->oznaka:"";?>">
      </div>
      <div class="form-group">
      <label for="naziv_jedinice">Naziv arhivske jedinice: <span class="text-red">*</span></label>
      <input type="text" placeholder="Naziv arhivske jedinice" class="form-control" id="naziv_jedinice" name="naziv_jedinice" required value="<?php echo isset($data->naziv_jedinice)?$data->naziv_jedinice:"";?>">
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
