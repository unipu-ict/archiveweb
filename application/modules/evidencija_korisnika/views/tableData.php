<!-- Evidencija korisnika - lista - 17.03.2017. -->
<?php
$tablename="evidencija_korisnika";
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
					<td><?php echo $value->id_korisnika; ?></td>
					<td><?php echo $value->rb_upisa; ?></td>
					<td><?php echo $value->prezime_i_ime; ?></td>
					<td><?php echo $value->adresa_stalna.', '.$value->postanski_broj.' '.$value->mjesto_sta; ?></td>
					<td>
				<?php
	      if(CheckPermission("evidencija_korisnika", "all_update")){
	      echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
	      }else if(CheckPermission("evidencija_korisnika", "own_update") && (CheckPermission("evidencija_korisnika", "all_update")!=true)){
	        $user_id=getRowByTableColomId("evidencija_korisnika",$value->$tab_id,$tab_id,"user_id");
	        if($user_id==$this->user_id){
	      echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Edit"><i class="fa fa-pencil" data-id=""></i></a>';
	        }
	      }
	      if(CheckPermission("evidencija_korisnika", "all_delete")){
	      echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="delete" onclick="setId('.$value->$tab_id.', \'evidencija_korisnika\')"><i class="fa fa-trash-o" ></i></a>';}
	      else if(CheckPermission("evidencija_korisnika", "own_delete") && (CheckPermission("evidencija_korisnika", "all_delete")!=true)){
	        $user_id=getRowByTableColomId("evidencija_korisnika",$value->$tab_id,$tab_id,"user_id");
	        if($user_id==$this->user_id){
	      echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="delete" onclick="setId('.$value->$tab_id.', \'evidencija_korisnika\')"><i class="fa fa-trash-o" ></i></a>';
	        }
	      }
				if(CheckPermission("evidencija_korisnika", "all_view")){
					echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
				}else if(CheckPermission("evidencija_korisnika", "own_view") && (CheckPermission("evidencija_korisnika", "all_view")!=true)){
					$user_id=getRowByTableColomId("evidencija_korisnika",$value->$tab_id,$tab_id,"user_id");
					if($user_id==$this->user_id){
						echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
					}
				}
				?>
			</td>
		</tr>
<?php } } ?>
