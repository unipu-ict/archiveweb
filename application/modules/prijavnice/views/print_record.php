<!DOCTYPE html>
<!-- Autor: Sebastijan Legović, 28.03.2017. -->
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
          <td class="print-name" colspan="2">PRIJAVNICE ZA KORIŠTENJE GRADIVA</td>
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
            </br>Redni broj prijave u godini:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data1->rb_prijave)?$data1->rb_prijave:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Prezime, ime i identifikacijski broj korisnika:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data1->prezime_i_ime)?$data1->prezime_i_ime.' (ID: '.$data1->id_korisnika.')':"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Tema ili područje istraživanja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data1->tema_ili_podrucje_istrazivanja)?$data1->tema_ili_podrucje_istrazivanja:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Svrha korištenja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data1->svrha_koristenja)?$data1->svrha_koristenja:"";?>
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
            <?php echo isset($data1->napomena)?$data1->napomena:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="bold" colspan="3">
            <p class="p-title-center">KORISTIO/LA BIH SLIJEDEĆE GRADIVO:</p>
          </td>
        </tr>
        <?php foreach($data2 as $data2){?>
        <tr class="report">
          <td class="border_right_nobold_grey" colspan="3">
            <?php echo isset($data2->signatura)?$data2->signatura.', '.$data2->naziv:"";?>
          </td>
        </tr>
        <?php }?>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td colspan="3">
            <p class="p-title-center">ODOBRENJE KORIŠTENJA:</p>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td colspan="3">
            Dana <?php echo date("d.m.Y.",strtotime($data1->datum_odobrenja));?> <b>odobreno</b> je korištenje arhivskog gradiva.
            Prijavnicu je odobrio/la <i><?php echo isset($data1->odgovorna_osoba)?$data1->odgovorna_osoba:"";?>.</i>
          </td>
        </tr>
        <tr>
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td colspan="3">
            <p class="p-title-center"</p>
            </td>
        </tr>
        <tr>
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
          <td class="noborder">
            Potpis korisnika arhivskog gradiva:
          </td>
        </tr>
        <tr class="signature">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="signature">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td>
            U Pazinu, <?php echo date("d.m.Y.");?>
          </td>
          <td class='signature'>
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
