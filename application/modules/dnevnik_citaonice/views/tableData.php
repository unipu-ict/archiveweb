<!-- Dnevnik čitaonice - lista - 19.03.2017. -->
<?php
$tablename="dnevnik_citaonice";
$tab_id=$tablename.'_id';
if(isset($view_data) && is_array($view_data) && !empty($view_data)) {
	foreach ($view_data as $key => $value) {?>
		<tr>
			<td>
				<?php
					if(CheckPermission("test_crud", "all_delete")){
						echo '<input type="checkbox" name="selData" value="'.$value->$tab_id.'">';}
						else if(CheckPermission("test_crud", "own_delete") && (CheckPermission("test_crud", "all_delete")!=true)){
							$user_id =getRowByTableColomId("test_crud",$value->$tab_id,$tab_id,"user_id");
							if($user_id==$this->user_id){
								echo '<input type="checkbox" name="selData" value="'.$value->$tab_id.'">';
							}
						}
						?>
					</td>
					<td><?php echo $value->prezime_i_ime.' (ID: '.$value->id_korisnika.')'; ?></td>
					<td><?php echo date("d.m.Y.",strtotime($value->datum_posjeta)); ?></td>
					<td><?php echo $value->vrijeme_ulaska; ?></td>
					<td><?php echo $value->vrijeme_izlaska; ?></td>
					<td><?php
					if(CheckPermission("dnevnik_citaonice", "all_update")){
						echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
					}else if(CheckPermission("dnevnik_citaonice", "own_update") && (CheckPermission("dnevnik_citaonice", "all_update")!=true)){
						$user_id=getRowByTableColomId("dnevnik_citaonice",$value->$tab_id,$tab_id,"user_id");
						if($user_id==$this->user_id){
							echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
						}
					}

					if(CheckPermission("dnevnik_citaonice", "all_delete")){
						echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'dnevnik_citaonice\')"><i class="fa fa-trash-o" ></i></a>';}
						else if(CheckPermission("dnevnik_citaonice", "own_delete") && (CheckPermission("dnevnik_citaonice", "all_delete")!=true)){
							$user_id=getRowByTableColomId("dnevnik_citaonice",$value->$tab_id,$tab_id,"user_id");
							if($user_id==$this->user_id){
								echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'dnevnik_citaonice\')"><i class="fa fa-trash-o" ></i></a>';
							}
						}

						if(CheckPermission("dnevnik_citaonice", "all_view")){
							echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
						}else if(CheckPermission("zahtjevnice", "own_view") && (CheckPermission("dnevnik_citaonice", "all_view")!=true)){
							$user_id=getRowByTableColomId("dnevnik_citaonice",$value->$tab_id,$tab_id,"user_id");
							if($user_id==$this->user_id){
								echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
							}
						}
						?>
					</td>
				</tr>
<?php } } ?>
