<!-- Mjesta - lista - 14.03.2017. -->
<?php
$tablename="mjesta";
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
			<td><?php echo $value->mjesto; ?></td>
			<td><?php echo $value->postanski_broj; ?></td>
			<td><?php echo $value->drzava; ?></td>
			<td>
				<?php
	      if(CheckPermission("mjesta", "all_update")){
	      echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
	      }else if(CheckPermission("mjesta", "own_update") && (CheckPermission("mjesta", "all_update")!=true)){
	        $user_id=getRowByTableColomId("mjesta",$value->$tab_id,$tab_id,"user_id");
	        if($user_id==$this->user_id){
						echo '<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
					}
	      }

	      if(CheckPermission("mjesta", "all_delete")){
	      echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'mjesta\')"><i class="fa fa-trash-o"></i></a>';}
	      else if(CheckPermission("mjesta", "own_delete") && (CheckPermission("mjesta", "all_delete")!=true)){
	        $user_id=getRowByTableColomId("mjesta",$value->$tab_id,$tab_id,"user_id");
	        if($user_id==$this->user_id){
	      echo '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$value->$tab_id.', \'mjesta\')"><i class="fa fa-trash-o"></i></a>';
	        }
	      }

				if(CheckPermission("mjesta", "all_view")){
					echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
				}else if(CheckPermission("mjesta", "own_view") && (CheckPermission("mjesta", "all_view")!=true)){
					$user_id=getRowByTableColomId("mjesta",$value->$tab_id,$tab_id,"user_id");
					if($user_id==$this->user_id){
						echo '<a sty id="btnViewRow" class="modalButton2 mClass" href="javascript:;" type="button" data-src="'.$value->$tab_id.'" title="Pregledaj"><i class="fa fa-search" data-id=""></i></a>';
					}
				}
			?>
		</td>
	</tr>
<?php } } ?>
