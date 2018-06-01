<!-- head -->
<?php $this->load->view('admin/comment/head', $this->data)?>

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
			<h6>Danh sách phản hồi sản phẩm</h6>
		 	<div class="num f12">Tổng số: <b><?php echo count($list)?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin')?>/images/icons/tableArrows.png" /></td>
					<td style="width:80px;">Mã số</td>
					<td style="width:80px;">Mã sản phẩm</td>
					<td style="width:80px;">Tên khách hàng</td>
					<td style="width:80px;">Email khách hàng</td>
					<td>Nội dung</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot>
				<tr>
					<td colspan="7">
					     <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('comment/delete_all')?>">
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
                        <td class="textC"><?php echo $row->product_id?></td>
						<td class="textC"><?php echo $row->user_name?></td>
						<td class="textC"><?php echo $row->user_email?></td>
						<td class="textC"><?php echo $row->content?></td>
						<td class="option">
							<a href="<?php echo admin_url('comment/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
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
