<!DOCTYPE html>
<!-- Autor: Sebastijan Legović, 28.03.2017. -->
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
          <td class="print-name" colspan="6">DNEVNIK ČITAONICE</td>
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
            <th class="border_right" width="25%">Korisnik</th>
            <th class="border_right" width="10%">RB</th>
            <th class="border_right" width="15%">Datum posjeta</th>
            <th class="border_right" width="15%">Vrijeme ulaska</th>
            <th class="border_right" width="15%">Vrijeme izlaska</th>
            <th class="border_right" width="20%">Napomena</th>
          </thead>
        </tr>
        <tbody>
          <?php foreach($data as $data){?>
            <tr class="report">
              <td class="border_right_nobold">
                <?php echo isset($data->prezime_i_ime)?$data->prezime_i_ime.' (ID: '.$data->id_korisnika.')':"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo date("d.m.Y.",strtotime($data->datum_posjeta));?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->vrijeme_ulaska)?$data->vrijeme_ulaska:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->vrijeme_izlaska)?$data->vrijeme_izlaska:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->napomena)?$data->napomena:"";?>
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
