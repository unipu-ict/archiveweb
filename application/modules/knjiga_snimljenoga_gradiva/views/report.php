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
          <td class="print-name" colspan="11">KNJIGA ARHIVSKOGA GRADIVA SNIMLJENOG U SIGURNOSNE I ZAŠTITNE SVRHE</td>
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
            <th class="border_right" width="5%">RB</th>
            <th class="border_right" width="10%">Signatura i naziv izvornika</th>
            <th class="border_right" width="5%">Signatura preslike</th>
            <th class="border_right" width="7%">Cjelovitost snimanja</th>
            <th class="border_right" width="16%">Podloga i tehnika snimanja</th>
            <th class="border_right" width="12%">Vrsta preslike</th>
            <th class="border_right" width="10%">Količina zapisa</th>
            <th class="border_right" width="15%">Odgovornost</th>
            <th class="border_right" width="5%">Topografska oznaka</th>
            <th class="border_right" width="5%">Dostupnost</th>
            <th class="border_right" width="10%">Napomena</th>
          </thead>
        </tr>
        <tbody>
          <?php foreach($data as $data){?>
            <tr class="report">
              <td class="border_right_nobold">
                <?php echo isset($data->rb_upisa)?$data->rb_upisa:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->signatura)?$data->signatura.' '.$data->naziv_izvornika:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->signatura_preslike)?$data->signatura_preslike:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->cjelovitost_snimanja)?$data->cjelovitost_snimanja:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->podloga_snimanja)?$data->podloga_snimanja.', '.$data->tehnika_snimanja.', '.$data->format.', '.$data->oblik_filma:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->vrsta_preslike)?$data->vrsta_preslike.', '.$data->generacija_preslika:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->kolicina_zapisa)?$data->kolicina_zapisa:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->odgovorna_osoba)?$data->odgovorna_osoba.', '.date("d.m.Y.",strtotime($data->datum_izrade)).', '.$data->ustanova:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->topografska_oznaka)?$data->topografska_oznaka:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->dostupnost)?$data->dostupnost:"";?>
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
