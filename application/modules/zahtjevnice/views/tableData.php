<!-- Zahtjevnice - lista - 21.03.2017. -->
<?php
$tablename="zahtjevnice";
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
							<td><?php echo $value->prezime_i_ime; ?></td>
							<td><?php echo date("d.m.Y.",strtotime($value->datum_zahtjeva)); ?></td>
							<td><a href="<?php echo site_url("zahtjevnice_fond"); ?>">Dodaj/izmjeni</a></td>
							<td>
							<?php
							if(CheckPermission("zahtjevnice", "all_update")){
								echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
							}else if(CheckPermission("zahtjevnice", "own_update") && (CheckPermission("zahtjevnice", "all_update")!=true)){
								$user_id=getRowByTableColomId("zahtjevnice",$value->$tab_id,$tab_id,"user_id");
								if($user_id==$this->user_id){
									echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
								}
							}
							if(CheckPermission("zahtjevnice", "all_delete")){
								echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'zahtjevnice\')"><i class="fa fa-trash-o" ></i></a>';}
								else if(CheckPermission("zahtjevnice", "own_delete") && (CheckPermission("zahtjevnice", "all_delete")!=true)){
									$user_id=getRowByTableColomId("zahtjevnice",$value->$tab_id,$tab_id,"user_id");
									if($user_id==$this->user_id){
										echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'zahtjevnice\')"><i class="fa fa-trash-o" ></i></a>';
									}
								}
								if(CheckPermission("zahtjevnice", "all_view")){
									echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
								}else if(CheckPermission("zahtjevnice", "own_view") && (CheckPermission("zahtjevnice", "all_view")!=true)){
									$user_id=getRowByTableColomId("zahtjevnice",$value->$tab_id,$tab_id,"user_id");
									if($user_id==$this->user_id){
										echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
									}
								}
								?>
							</td>
						</tr>
<?php } } ?>
