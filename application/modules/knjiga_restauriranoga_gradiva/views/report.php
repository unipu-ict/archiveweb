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
          <td class="print-name" colspan="13">KNJIGA RESTAURIRANOGA I KONZERVIRANOGA ARHIVSKOGA GRADIVA</td>
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
            <th class="border_right" width="15%">Imatelj</th>
            <th class="border_right" width="10%">Fond/zbirka</th>
            <th class="border_right" width="5%">Signatura izvornika</th>
            <th class="border_right" width="5%">Vrsta i podloga</th>
            <th class="border_right" width="5%">Količina i dimenzije</th>
            <th class="border_right" width="10%">Sažeti opis oštećenja</th>
            <th class="border_right" width="10%">Sažeti opis postupka</th>
            <th class="border_right" width="10%">Datum preuzimanja</th>
            <th class="border_right" width="5%">Datum restauriranja</th>
            <th class="border_right" width="5%">Datum povrata</th>
            <th class="border_right" width="5%">Restaurator</th>
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
                <?php echo isset($data->imatelj)?$data->imatelj:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->signatura_fonda)?$data->signatura_fonda:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->signatura_izvornika)?$data->signatura_izvornika:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->vrsta_i_podloga)?$data->vrsta_i_podloga:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->kolicina)?$data->kolicina:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->sazeti_opis_ostecenja)?$data->sazeti_opis_ostecenja:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->sazeti_opis_postupka)?$data->sazeti_opis_postupka:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo date("d.m.Y.",strtotime($data->datum_preuzimanja))?>
              </td>
              <td class="border_right_nobold">
                <?php echo date("d.m.Y.",strtotime($data->datum_restauriranja))?>
              </td>
              <td class="border_right_nobold">
                <?php echo date("d.m.Y.",strtotime($data->datum_povrata))?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->restaurator)?$data->restaurator:"";?>
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
