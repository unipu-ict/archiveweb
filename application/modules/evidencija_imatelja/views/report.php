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
          <td class="print-name" colspan="9">EVIDENCIJA IMATELJA ARHIVSKOGA GRADIVA</td>
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
            <th class="border_right" width="15%">Datum, klasa i urbroj isprave o unosu</th>
            <th class="border_right" width="15%">Datum, klasa i urbroj isprave o brisanju</th>
            <th class="border_right" width="5%">Matični broj</th>
            <th class="border_right" width="15%">Naziv(i)/prezime i ime</th>
            <th class="border_right" width="10%">Sjedište</th>
            <th class="border_right" width="10%">Adresa</th>
            <th class="border_right" width="15%">Stvaratelj</th>
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
                <?php echo isset($data->isprava_o_unosu)?$data->isprava_o_unosu:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->isprava_o_brisanju)?$data->isprava_o_brisanju:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->maticni_broj)?$data->maticni_broj:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->naziv)?$data->naziv:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->mjesto)?$data->mjesto:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->adresa)?$data->adresa:"";?>
              </td>
              <td class="border_right_nobold">
                <?php echo isset($data->naziv_stvaratelja)?$data->naziv_stvaratelja:"";?>
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
