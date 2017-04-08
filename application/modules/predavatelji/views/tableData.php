<!-- Predavatelji - lista - 11.03.2017. -->
<?php
$tablename="predavatelji";
$tab_id=$tablename.'_id';
if(isset($view_data) && is_array($view_data) && !empty($view_data)) {
	foreach ($view_data as $key=>$value) {?>
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
				<td><?php echo $value->predavatelj; ?></td>
				<td><?php echo $value->vrsta; ?></td>
				<td><?php echo $value->postanski_broj.' '.$value->mjesto; ?></td>
				<td><?php
				if(CheckPermission("predavatelji", "all_update")){
					echo '<a sty id="btnEditRow" class="modalButton mClass"  href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
				}else if(CheckPermission("predavatelji", "own_update") && (CheckPermission("predavatelji", "all_update")!=true)){
					$user_id=getRowByTableColomId("predavatelji",$value->$tab_id,$tab_id,"user_id");
					if($user_id==$this->user_id){
						echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
					}
				}
				if(CheckPermission("predavatelji", "all_delete")){
					echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'predavatelji\')"><i class="fa fa-trash-o" ></i></a>';}
					else if(CheckPermission("predavatelji", "own_delete") && (CheckPermission("predavatelji", "all_delete")!=true)){
						$user_id=getRowByTableColomId("predavatelji",$value->$tab_id,$tab_id,"user_id");
						if($user_id==$this->user_id){
							echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'predavatelji\')"><i class="fa fa-trash-o" ></i></a>';
						}
					}
					if(CheckPermission("predavatelji", "all_view")){
						echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
					}else if(CheckPermission("predavatelji", "own_view") && (CheckPermission("predavatelji", "all_view")!=true)){
						$user_id=getRowByTableColomId("predavatelji",$value->$tab_id,$tab_id,"user_id");
						if($user_id==$this->user_id){
							echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
						}
					}
					?>
				</td>
			</tr>
			<?php
		}
	}
?>
