<!-- Dnevnik čitaonice - lista - 19.03.2017. -->
<div class="content-wrapper">
	<section class="content">
		<?php if($this->session->flashdata("message")){?><div class="alert alert-info" id="successMessage"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo $this->session->flashdata("message")?></div><?php }?>
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Dnevnik čitaonice</h3>
						<div class="box-tools pull-right">
							<?php if(CheckPermission("dnevnik_citaonice", "own_create")){ ?>
								<button type="button" class="btn-sm btn btn-success amDisable modalButton" data-toggle="modal" data-src="" data-width="555" data-target="#nameModal_dnevnik_citaonice"><i class="glyphicon glyphicon-plus"></i> Dodaj novi</button>
								<?php }?>
								<?php if(CheckPermission("dnevnik_citaonice", "all_view")){ ?>
								<a type="button" class="btn-sm btn btn-success" href="<?php echo site_url('dnevnik_citaonice/report');?>" target="_blank"><i class="glyphicon glyphicon-print"></i> Ispiši evidenciju</a>
								<?php }?>
							</div>
						</div>
						<div class="box-body">
							<table id="example_dnevnik_citaonice" class="cell-border example_dnevnik_citaonice table table-striped table1 table-bordered table-hover dataTable">
								<thead>
									<tr>
										<th><input type="checkbox" class="selAll"></th>
										<th width="40%">Prezime, ime i identifikacijski broj korisnika</th>
										<th width="20%">Datum posjeta</th>
										<th width="15%">Vrijeme ulaska</th>
										<th width="15%">Vrijeme izlaska</th>
										<th width="10%"></th>
									</tr>
								</thead>
								<tbody>
									<?php $this->load->view('tableData'); ?></tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
<div class="modal fade" id="nameModal_dnevnik_citaonice"  role="dialog">
	<div class="modal-dialog">
		<div class="box box-primary popup">
			<div class="box-header with-border formsize">
				<h3 class="box-title">Dnevnik citaonice</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body" style="padding: 0px 0px 0px 0px;">
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
	var url="<?php echo base_url();?>";
	var table=$("#example_dnevnik_citaonice").DataTable({
		"dom": 'lfBrtip',
		"buttons": [],
        "processing": true,
        "serverSide": false,
				"sPaginationType": "full_numbers",
				"language": {
					"url": "<?php echo base_url()."assets/js/Croatian.json";?>",
					"search": "_INPUT_",
					"searchPlaceholder": "Pretraži",
					"paginate": {
						"next": '<i class="fa fa-angle-right"></i>',
						"previous": '<i class="fa fa-angle-left"></i>',
						"first": '<i class="fa fa-angle-double-left"></i>',
						"last": '<i class="fa fa-angle-double-right"></i>'
					}
				},
				"iDisplayLength": 10,
				"aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"Svi"]],
				"columnDefs": [
					{
						"orderable": false,
						"targets": [0]
					}<?php if(!CheckPermission("dnevnik_citaonice", "all_delete") && !CheckPermission("dnevnik_citaonice", "own_delete")){ ?>
					,{
            "targets": [0],
            "visible": false,
            "searchable": false
          }
          <?php } ?>
				],
				"order": [[2, 'asc']],
    });
		$(".daterange-filter").on("change", function() {
		  var dateRange=$(this).val();
		  var colName="datum_posjeta";
		  $.ajax({
		    url: '<?php echo base_url().'dnevnik_citaonice/getFilterdata'; ?>',
		    method: 'post',
		    data:{
					dateRange: dateRange,
		      colName : colName
		    }
		  }).done(function(data) {
		    table.destroy();
		    $('tbody').html(data);
		    table=$("#example_dnevnik_citaonice").DataTable({
		    	"dom": 'lfBrtip',
					"buttons": [],
	        "processing": true,
	        "serverSide": false,
					"sPaginationType": "full_numbers",
					"language": {
						"url": "<?php echo base_url()."assets/js/Croatian.json";?>",
						"search": "_INPUT_",
						"searchPlaceholder": "Pretraži",
						"paginate": {
							"next": '<i class="fa fa-angle-right"></i>',
							"previous": '<i class="fa fa-angle-left"></i>',
							"first": '<i class="fa fa-angle-double-left"></i>',
							"last": '<i class="fa fa-angle-double-right"></i>'
						}
					},
					"iDisplayLength": 10,
					"aLengthMenu": [[10, 25, 50, 100,500,-1], [10, 25, 50,100,500,"Svi"]],
					"columnDefs" : [
						{
							"orderable": false,
							"targets": [0]
						}<?php if(!CheckPermission("dnevnik_citaonice", "all_delete") && !CheckPermission("dnevnik_citaonice", "own_delete")){ ?>
					,{
            "targets": [0],
            "visible": false,
            "searchable": false
          }
          <?php } ?>
					],
					"order": [[2, 'asc']],
	    	});
		  });
		});
} );

( function($) {
$(document).ready(function(){
	var cjhk=0;
	<?php if(CheckPermission("dnevnik_citaonice", "all_delete") || CheckPermission("dnevnik_citaonice", "own_delete")){ ?>
		cjhk=1;
	<?php } ?>
	setTimeout(function() {
		var add_width=$('.dataTables_filter').width()+$('.box-body .dt-buttons').width()+10;
		$('.table-date-range').css('right',add_width+'px');
		if(cjhk==1) {
			$('.dataTables_info').before('<button data-del-url="<?php echo base_url() ?>dnevnik_citaonice/delete/" class="btn btn-default btn-sm btn-blk-del pull-left"> <i class="fa fa-trash"></i> </button><br><br>');
		}
	}, 300);

	$('.box-body').on('click','.btn-blk-del', function() {
		$obj=$(this);
		$ids='';
		$('[name="selData"]').each(function(){
			if($(this).is(':checked')){
				$ids+=$(this).val()+'-';
			}
		})
		if($ids!=''){
			$ids=$ids.slice(0, -1);
			$('#cnfrm_delete').find('.yes-btn').attr('href', $obj.attr('data-del-url')+$ids)
			$('#cnfrm_delete').modal('show');
		} else {
			alert('Odaberite zapis koji želite izbrisati!');
		}
	});

	$(".content-wrapper").on("click",".modalButton", function(e) {
		$.ajax({
			url: "<?php echo base_url()."dnevnik_citaonice/get_modal";?>",
			method: "post",
			data: {
			id: $(this).attr("data-src")
			}
			}).done(function(data) {
			$("#nameModal_dnevnik_citaonice").find(".modal-body").html(data);
			$("#nameModal_dnevnik_citaonice").modal("show");
			$(".form_check").each(function() {
		      $p_obj=$(this);
		      $res=1;
		      if($p_obj.find(".check_box").hasClass("required")) {
		      	if($p_obj.find(".check_box").is(":checked")) {
		      		$res="0";
		      	}
		      }
		      if($res==0) {
		      	$(".check_box").prop("required", false);
					}
 			 })
 		 })
 	 });
 	 $(".content-wrapper").on("click",".modalButton2", function(e) {
 		 $.ajax({
 			 url: "<?php echo base_url()."dnevnik_citaonice/get_modal2";?>",
 			 method: "post",
 			 data : {
 				 id: $(this).attr("data-src")
 			 }
 		 }).done(function(data) {
 			 $("#nameModal_dnevnik_citaonice").find(".modal-body").html(data);
 			 $("#nameModal_dnevnik_citaonice").modal("show");
 			 $(".form_check").each(function() {
 				 $p_obj=$(this);
 				 $res=1;
 				 if($p_obj.find(".check_box").hasClass("required")) {
 					 if($p_obj.find(".check_box").is(":checked")) {
 						 $res="0";
 					 }
 				 }
 				 if($res==0) {
 					 $(".check_box").prop("required", false);
 				 }
 			 })
 		 })
 	 });
 	 });
 	 } ) ( jQuery );
 </script>
