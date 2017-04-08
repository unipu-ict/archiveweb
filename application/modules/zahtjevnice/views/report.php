<!DOCTYPE html>
<!-- Autor: Sebastijan Legović, 30.03.2017. -->
<html>
<head>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url()."assets/images/favicon.ico"?>">
  <title>ArchiveWeb</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style-print.css');?>">
</head>
<body>
  <div class="printing-landscape">
    <div>
      <table>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="print-name" colspan="6">EVIDENCIJA KORIŠTENJA</td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
      </table>
      <table>
        <tr>
          <thead>
            <th class="border_right" width="5%">ID</th>
            <th class="border_right" width="20%">Prezime i ime</th>
            <th class="border_right" width="10%">Broj zahtjeva</th>
            <th class="border_right" width="10%">Datum zahtjeva</th>
            <th class="border_right" width="20%">Datum/vrijeme korištenja</th>
            <th class="border_right" width="25%">Signatura i naziv korištenoga gradiva</th>
            <th class="border_right" width="10%">Napomena</th>
          </thead>
        </tr>
        <tbody>
          <?php foreach($data3 as $data){?>
            <tr class="report">
              <td class="border_right_nobold">
                <?php echo isset($data->id_korisnika)?$data->id_korisnika:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->prezime_i_ime)?$data->prezime_i_ime:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->rb_zahtjeva)?$data->rb_zahtjeva:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo date("d.m.Y.",strtotime($data->datum_zahtjeva));?>
              </td>
              <td class="border_right_nobold">
                <?php echo date("d.m.Y.",strtotime($data->datum_posjeta)).' od '.$data->vrijeme_ulaska.' do '.$data->vrijeme_izlaska;?>
              </td>
              <td class="border_right_nobold">
              <?php foreach($data4 as $data){?>
                <?php echo isset($data->signatura)?$data->signatura.', '.$data->naziv.': '.$data->oznaka.' '.$data->naziv_jedinice:"";?>
              <?php }?>
              </td>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data3->napomena)?$data->napomena:"";?>
              </td>
              <?php }?>
            </tr>
          </tbody>
        </table>
      </div>
    </body>
</div>
<script>
window.print();
setTimeout(function () { window.close(); }, 100);
</script>
