<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Bảng điều khiển</h5>
			<span>Trang quản lý hệ thống</span>
		</div>
		
		<div class="clear"></div>
	</div>
</div>

<div class="line"></div>

<div class="wrapper">
	
	<div class="widgets">
	     <!-- Stats -->
		
<!-- Amount -->
<div class="oneTwo">
	<div class="widget">
		<div class="title">
			<img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/money.png">
			<h6>Doanh sách</h6>
		</div>
		
		<table width="100%" cellspacing="0" cellpadding="0" class="sTable myTable">
			<tbody>
				
					<tr>
							<td class="fontB blue f13">Tổng doanh số</td>
							<td style="width:120px;" class="textR webStatsLink red">44,000,000 đ</td>
					</tr>
				    
				    <tr>
							<td class="fontB blue f13">Doanh số hôm nay</td>
							<td style="width:120px;" class="textR webStatsLink red">0 đ</td>
					</tr>
					
				    <tr>
							<td class="fontB blue f13">Doanh số theo tháng</td>
							<td style="width:120px;" class="textR webStatsLink red">
							0 đ
							</td>
					</tr>
				    
			</tbody>
		</table>
	</div>
</div>


<!-- User -->
<div class="oneTwo">
	<div class="widget">
		<div class="title">
			<img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/users.png">
			<h6>Thống kê dữ liệu</h6>
		</div>
		
		<table width="100%" cellspacing="0" cellpadding="0" class="sTable myTable">
			<tbody>
				
				<tr>
					<td>
						<div class="left">Tổng số giao dịch</div>
						<div class="right f11"><a href="admin/tran.html">Chi tiết</a></div>
					</td>
					
					<td class="textC webStatsLink">
						15					</td>
				</tr>
				
				<tr>
					<td>
						<div class="left">Tổng số sản phẩm</div>
						<div class="right f11"><a href="admin/product.html">Chi tiết</a></div>
					</td>
					
					<td class="textC webStatsLink">
						8					</td>
				</tr>
				
				<tr>
					<td>
						<div class="left">Tổng số bài viết</div>
						<div class="right f11"><a href="admin/news.html">Chi tiết</a></div>
					</td>
					
					<td class="textC webStatsLink">
						4					</td>
				</tr>
				
				<tr>
					<td>
						<div class="left">Tổng số thành viên</div>
						<div class="right f11"><a href="admin/user.html">Chi tiết</a></div>
					</td>
					
					<td class="textC webStatsLink">
						2					</td>
				</tr>
				<tr>
					<td>
						<div class="left">Tổng số liên hệ</div>
						<div class="right f11"><a href="admin/contact.html">Chi tiết</a></div>
					</td>
					
					<td class="textC webStatsLink">
						0					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

		<div class="clear"></div>
		
		<!-- Giao dich thanh cong gan day nhat -->
		
	<div class="widget">
		<div class="title">
			<span class="titleIcon"><div class="checker" id="uniform-titleCheck"><span><input type="checkbox" name="titleCheck" id="titleCheck" style="opacity: 0;"></span></div></span>
			<h6>Danh sách giao dịch</h6>
		</div>
		
		<table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
			
			
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin')?>/images/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã số</td>
					<td style="width:75px;">Thành viên</td>
					<td style="width:90px;">Số tiền</td>
					<td>Hình thức</td>
					<td style="width:100px;">Giao dịch</td>
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:55px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="8">
						 <div class="list_action itemActions">
								<a url="admin/tran/del_all.html" class="button blueB" id="submit" href="#submit">
									<span style="color:white;">Xóa hết</span>
								</a>
						 </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
							<tr>
					<td><div class="checker" id="uniform-undefined"><span><input type="checkbox" value="21" name="id[]" style="opacity: 0;"></span></div></td>
					
					<td class="textC">21</td>
					
					<td>
						Nguyễn Thanh Luật				</td>
					
					<td class="textR red">20,000,000</td>
					
					<td>
					Đặt hàng					</td>
					
					
					<td class="status textC">
						<span class="pending">
						Chờ xử lý						</span>
					</td>
					
					<td class="textC">20-04-2018</td>
					
					<td class="textC">
							<a class="lightbox cboxElement" href="admin/tran/view/21.html">
								<img src="<?php echo public_url('admin')?>/images/icons/color/view.png">
							</a>
							
						   <a class="tipS verify_action" href="admin/tran/del/21.html" original-title="Xóa">
						    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png">
						   </a>
					</td>
				</tr>
							
						</tbody>
			
		</table>
	</div>

        	</div>
	
</div>


<div class="clear mt30"></div>

