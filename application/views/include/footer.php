<!-- Autor: Sebastijan Legović, 02.03.2017. -->
<footer class="main-footer">Copyright © 2017 ArchiveWeb. Sva prava pridržana. Autor aplikacije: Sebastijan Legović (diplomski rad)</footer>
<div class="control-sidebar-bg"></div>
</div>
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js');?>"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="//cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/moment.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/datepicker-hr.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.form-validator.min.js');?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/js/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/app.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/js/icheck.min.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
<script src="<?php echo base_url('assets/ckeditor/adapters/jquery.js');?>"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url('assets/js/demo.js');?>"></script>
<script src="<?php echo base_url('assets/js/custom.js');?>"></script>
<script>
function validate_fileType(fileName,Nameid,arrayValu)
{
  var string=arrayValu;
  var tempArray=new Array();
  var tempArray=string.split(',');
  var allowed_extensions=tempArray;
  var file_extension=fileName.split(".").pop();
  for(var i=0; i <= allowed_extensions.length; i++)
  {
    if(allowed_extensions[i]==file_extension)
    {
      $("#error_"+Nameid).html("");
      return true;
    }
  }
  $("#"+Nameid).val("");
  $("#error_"+Nameid).css("color","red").html("Format nije podržan!");
  return false;
}
</script>
<script>
//za meni da pokaže samo aktivni link, ostali zatvoreni
var url = window.location;
$('ul.sidebar-menu a').filter(function() {
  return this.href==url;
}).parent().addClass('active');
$('ul.treeview-menu a').filter(function() {
  return this.href==url;
}).closest('.treeview').addClass('active');
</script>
</body>
</html>
<div id="cnfrm_delete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content col-md-6">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Brisanje zapisa</h4>
      </div>
      <div class="modal-body">
        <p>Želite li izbrisati zapis?</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-small yes-btn btn-danger" href="">Izbriši</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Poništi</button>
      </div>
    </div>
  </div>
</div>
