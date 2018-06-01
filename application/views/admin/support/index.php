<!-- head -->
<?php $this->load->view('admin/support/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">

    <?php $this->load->view('admin/message', $this->data);?>
    
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon">
			<div class="checker" id="uniform-titleCheck">
    			<span>
    			   <input type="checkbox" name="titleCheck" id="titleCheck" style="opacity: 0;">
    			</span>
			</div>
			</span>
			<h6>Danh sách hỗ trợ khách hàng</h6>
		 	<div class="num f12">Tổng số: <b><?php echo count($list)?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin')?>/images/icons/tableArrows.png" /></td>
					<td style="width:50px;">Mã số</td>
					<td>Tên nhân viên</td>
					<td style="width:100px;">Yahoo</td>
					<td style="width:100px;">gmail</td>
					<td style="width:100px;">skype</td>
					<td style="width:100px;">phone</td>
					<td style="width:80px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot>
				<tr>
					<td colspan="8">
					     <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('support/delete_all')?>">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
							
					     <div class='pagination'>
			             </div>
					</td>
				</tr>
			</tfoot>
 			
			<tbody>
			<?php foreach ($list as $row):?>
			<tr class="row_<?php echo $row->id?>">
						<td><input type="checkbox" name="id[]" value="<?php echo $row->id?>" /></td>
						
						<td class="textC"><?php echo $row->id?></td>
                        <td class="textC"><?php echo $row->name?></td>
                        <td class="textC"><?php echo $row->yahoo?></td>
                        <td class="textC"><?php echo $row->gmail?></td>
                        <td class="textC"><?php echo $row->skype?></td>
                        <td class="textC"><?php echo $row->phone?></td>
						
						<td class="option">
							<a href="<?php echo admin_url('support/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
							   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
							</a>
							
							<a href="<?php echo admin_url('support/delete/'.$row->id)?>" title="xóa" class="tipS verify_action" >
							    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<?php endforeach;?>
					</tbody>
				</table>
	</div>
</div>

<div class="clear mt30"></div>
