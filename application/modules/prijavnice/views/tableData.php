<!-- Prijavnice - lista - 20.03.2017. -->
<?php
$tablename="prijavnice";
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
				</td>
				<td><?php echo $value->rb_prijave; ?></td>
				<td><?php echo $value->prezime_i_ime.' (ID: '.$value->id_korisnika.')'; ?></td>
				<td><?php echo $value->svrha_koristenja; ?></td>
				<td><a href="<?php echo site_url("prijavnice_fond"); ?>">Dodaj/izmjeni</a></td>
				<td>
					<?php
					if(CheckPermission("prijavnice", "all_update")){
						echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
					}else if(CheckPermission("prijavnice", "own_update") && (CheckPermission("prijavnice", "all_update")!=true)){
						$user_id=getRowByTableColomId("prijavnice",$value->$tab_id,$tab_id,"user_id");
						if($user_id==$this->user_id){
							echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
						}
					}
					if(CheckPermission("prijavnice", "all_delete")){
						echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'prijavnice\')"><i class="fa fa-trash-o" ></i></a>';}
						else if(CheckPermission("prijavnice", "own_delete") && (CheckPermission("prijavnice", "all_delete")!=true)){
							$user_id=getRowByTableColomId("prijavnice",$value->$tab_id,$tab_id,"user_id");
							if($user_id==$this->user_id){
								echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'prijavnice\')"><i class="fa fa-trash-o" ></i></a>';
							}
						}
						if(CheckPermission("prijavnice", "all_view")){
							echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
						}else if(CheckPermission("prijavnice", "own_view") && (CheckPermission("prijavnice", "all_view")!=true)){
							$user_id=getRowByTableColomId("prijavnice_fond",$value->$tab_id,$tab_id,"user_id");
							if($user_id==$this->user_id){
								echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
							}
						}
						?>
					</td>
				</tr>
<?php } } ?>
