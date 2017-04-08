<!DOCTYPE html>
<!-- Autor: Sebastijan Legović, 30.03.2017. -->
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
          <td class="print-name" colspan="2">ZAHTJEVNICE ZA KORIŠTENJE GRADIVA</td>
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
            </br>Broj zahtjeva:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data1->rb_zahtjeva)?$data1->rb_zahtjeva:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Prezime i ime korisnika:</br></br>
          </td>
          <td class="border_right">
            <?php echo isset($data1->prezime_i_ime)?$data1->prezime_i_ime:"";?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
          </br>Datum zahtjeva:</br></br>
          </td>
          <td class="border_right">
            <?php echo date("d.m.Y.",strtotime($data1->datum_zahtjeva));?>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="bold" colspan="3">
            <p class="p-title-center">PREDMET KORIŠTENJA:</p>
          </td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <?php foreach($data2 as $data2){?>
        <tr class="report">
          <td class="border_right_nobold_grey" colspan="3">
            <?php echo isset($data2->signatura)?$data2->signatura.', '.$data2->naziv.': '.$data2->oznaka.' '.$data2->naziv_jedinice:"";?>
          </td>
        </tr>
        <?php }?>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder">
            </br>Oblik korištenja:</br></br>
          </td>
          <td class='border_right'>
            <?php echo isset($data1->oblik_koristenja)?$data1->oblik_koristenja:"";?>
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
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr class="noborder">
          <td class="noborder_empty"></td>
        </tr>
        <tr>
          <td class="noborder_empty"></td>
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
