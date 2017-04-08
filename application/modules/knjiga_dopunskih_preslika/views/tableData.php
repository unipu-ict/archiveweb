<!-- Knjiga dopunskih preslika - lista - 16.03.2017. -->
<?php
$tablename="knjiga_dopunskih_preslika";
$tab_id=$tablename.'_id';
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
					</td><td><?php echo $value->rb_upisa; ?></td>
					<td><?php echo $value->drzava; ?></td>
					<td><?php echo $value->signatura_izvornika.' '.$value->sadrzaj_preslike. ' ('.$value->vremenski_raspon_gradiva.' )'; ?></td>
					<td>
						<?php
						if(CheckPermission("knjiga_dopunskih_preslika", "all_update")){
							echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
						}else if(CheckPermission("knjiga_dopunskih_preslika", "own_update") && (CheckPermission("knjiga_dopunskih_preslika", "all_update")!=true)){
							$user_id=getRowByTableColomId("knjiga_dopunskih_preslika",$value->$tab_id,$tab_id,"user_id");
							if($user_id==$this->user_id){
								echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
							}
						}

						if(CheckPermission("knjiga_dopunskih_preslika", "all_delete")){
							echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'knjiga_dopunskih_preslika\')"><i class="fa fa-trash-o" ></i></a>';}
							else if(CheckPermission("knjiga_dopunskih_preslika", "own_delete") && (CheckPermission("knjiga_dopunskih_preslika", "all_delete")!=true)){
								$user_id=getRowByTableColomId("knjiga_dopunskih_preslika",$value->$tab_id,$tab_id,"user_id");
								if($user_id==$this->user_id){
									echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'knjiga_dopunskih_preslika\')"><i class="fa fa-trash-o" ></i></a>';
								}
							}

							if(CheckPermission("knjiga_dopunskih_preslika", "all_view")){
								echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
							}else if(CheckPermission("knjiga_dopunskih_preslika", "own_view") && (CheckPermission("knjiga_dopunskih_preslika", "all_view")!=true)){
								$user_id =getRowByTableColomId("depoziti",$value->$tab_id,$tab_id,"user_id");
								if($user_id==$this->user_id){
									echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
								}
							}
							?>
						</td>
					</tr>
<?php } } ?>
