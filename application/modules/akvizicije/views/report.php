<!DOCTYPE html>
<!-- Autor: Sebastijan Legović, 27.03.2017. -->
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
          <td class="print-name" colspan="12">KNJIGA PRIMLJENOGA ARHIVSKOG GRADIVA (KNJIGA AKVIZICIJA)</td>
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
            <th class="border_right" width="3%">RB</th>
            <th class="border_right" width="5%">Preuzeto</th>
            <th class="border_right" width="10%">Predavatelj</th>
            <th class="border_right" width="5%">Osnova predaje</th>
            <th class="border_right" width="15%">Dokument</th>
            <th class="border_right" width="10%">Stvaratelj</th>
            <th class="border_right" width="17%">Sadržaj</th>
            <th class="border_right" width="5%">Vremenski raspon</th>
            <th class="border_right" width="5%">Količina</th>
            <th class="border_right" width="10%">Fond/zbirka</th>
            <th class="border_right" width="5%">Smještaj</th>
            <th class="border_right" width="10%">Napomena</th>
          </thead>
        </tr>
        <tbody>
          <?php foreach($data as $data){?>
            <tr class="report">
              <td class="border_right_nobold">
                <?php echo isset($data->rb_u_godini)?$data->rb_u_godini:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo date("d.m.Y.",strtotime($data->datum_preuzimanja));?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->predavatelj)?$data->predavatelj.', '.$data->postanski_broj.' '.$data->mjesto:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->pravna_osnova_predaje)?$data->pravna_osnova_predaje:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->dokument)?$data->dokument.', klasa: '.$data->klasa.', urbroj: '.$data->urbroj.' od '.date("d.m.Y.",strtotime($data->datum)):"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->naziv_stvaratelja)?$data->naziv_stvaratelja:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->sadrzaj_gradiva)?$data->sadrzaj_gradiva:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->vremenski_raspon)?$data->vremenski_raspon:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->kolicina)?$data->kolicina:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->oznaka_fonda)?$data->signatura.', '.$data->naziv:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->smjestaj_gradiva)?$data->smjestaj_gradiva:"";?>
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
