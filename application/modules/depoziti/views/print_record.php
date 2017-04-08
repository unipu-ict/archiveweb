<!DOCTYPE html>
<!-- Autor: Sebastijan Legović, 24.03.2017. -->
<html>
<head>
  <link rel="icon" type="image/x-icon" href="<?php echo base_url()."assets/images/favicon.ico"?>">
  <title>ArchiveWeb</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style-print.css');?>">
</head>
<body>
  <div class="printing">
    <div>
      <table>
        <tr>
          <td width='51%' colspan="2">
            <?php $logo=(setting_all('logo'))?setting_all('logo'):'logo-print.png'; ?>
            <span class="logo-lg"><img src="<?php echo base_url().'assets/images/'.$logo; ?>" id="logo"></span>
          </td>
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
        <tr>
          <td class="print-name" colspan="2">KNJIGA POHRANJENOGA ARHIVSKOG GRADIVA (KNJIGA DEPOZITA)</td>
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
        <tr>
          <td class="noborder" width='25%'>
            </br>Redni broj upisa tijekom godine:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->rb_u_godini)?$data->rb_u_godini:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Datum pohrane:</br></br>
          </td>
          <td class="border_right">
            <?php echo date("d.m.Y.",strtotime($data->datum_pohrane));?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Naziv i adresa predavatelja:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data->predavatelj)?$data->predavatelj.', '.$data->postanski_broj.' '.$data->mjesto:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Pravna osnova predaje:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->pravna_osnova_predaje)?$data->pravna_osnova_predaje:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Dokument:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->dokument)?$data->dokument.', klasa: '.$data->klasa.', urbroj: '.$data->urbroj.' od '.date("d.m.Y.",strtotime($data->datum)):"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Naziv stvaratelja gradiva:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->naziv_stvaratelja)?$data->naziv_stvaratelja:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Sadržaj gradiva:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->sadrzaj_gradiva)?$data->sadrzaj_gradiva:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Vremenski raspon cjeline gradiva:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->vremenski_raspon)?$data->vremenski_raspon:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Količina cjeline gradiva:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->kolicina)?$data->kolicina:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Smještaj gradiva:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->smjestaj_gradiva)?$data->smjestaj_gradiva:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Napomena:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data->napomena)?$data->napomena:"";?>
          </td>
        </tr>
      </table>
    </div>
  </body>
</div>
<script>
window.print();
setTimeout(function () { window.close(); }, 100);
</script>
