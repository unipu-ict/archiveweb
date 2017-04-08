<!-- Zahtjevnice - lista - 21.03.2017. -->
<?php
$tablename="zahtjevnice_fond";
$tab_id = $tablename.'_id';
if(isset($view_data) && is_array($view_data) && !empty($view_data)) {
	foreach ($view_data as $key => $value) {?>
		<tr>
			<td>
				<?php
					if(CheckPermission("test_crud", "all_delete")){
					      echo '<input type="checkbox" name="selData" value="'.$value->$tab_id.'">';}
					      else if(CheckPermission("test_crud", "own_delete") && (CheckPermission("test_crud", "all_delete")!=true)){
									$user_id=getRowByTableColomId("test_crud",$value->$tab_id,$tab_id,"user_id");
					        if($user_id==$this->user_id){
										echo '<input type="checkbox" name="selData" value="'.$value->$tab_id.'">';
									}
								}
								?>
							</td>
							<td><?php echo $value->rb_zahtjeva; ?></td>
							<td><?php echo $value->signatura.', '.$value->naziv; ?></td>
							<td><?php echo $value->oznaka.'. '.$value->naziv_jedinice; ?></td>
							<td>
							<?php
							if(CheckPermission("zahtjevnice_fond", "all_update")){
								echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
							}else if(CheckPermission("zahtjevnice_fond", "own_update") && (CheckPermission("zahtjevnice_fond", "all_update")!=true)){
								$user_id=getRowByTableColomId("zahtjevnice_fond",$value->$tab_id,$tab_id,"user_id");
								if($user_id==$this->user_id){
									echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
								}
							}
							if(CheckPermission("zahtjevnice_fond", "all_delete")){
								echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'zahtjevnice_fond\')"><i class="fa fa-trash-o" ></i></a>';}
								else if(CheckPermission("zahtjevnice_fond", "own_delete") && (CheckPermission("zahtjevnice_fond", "all_delete")!=true)){
									$user_id=getRowByTableColomId("zahtjevnice_fond",$value->$tab_id,$tab_id,"user_id");
									if($user_id==$this->user_id){
										echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'zahtjevnice_fond\')"><i class="fa fa-trash-o" ></i></a>';
									}
								}
								?>
							</td>
						</tr>
<?php } } ?>
