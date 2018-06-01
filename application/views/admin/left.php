
		<div id="leftSide" style="padding-top:30px;">
		
		    <!-- Account panel -->
			
<div class="sideProfile">
	<a href="#" title="" class="profileFace"><img src="<?php echo public_url('admin')?>/images/user.png" width="40"></a>
	<span>Xin chào: <strong>admin!</strong></span>
	<span>Nguyễn Thanh Luật</span>
	<div class="clear"></div>
</div>
<div class="sidebarSep"></div>		    
		    <!-- Left navigation -->
			
<ul id="menu" class="nav">

			<li class="home">
		
			<a href="<?php echo admin_url()?>" class="active" id="current">
				<span>Bảng điều khiển</span>
				<strong></strong>
			</a>
			
						
		</li>
			<li class="tran">
		
			<a href="admin/tran.html" class="exp inactive">
				<span>Quản lý bán hàng</span>
				<strong>2</strong>
			</a>
			
							<ul style="display: none;" class="sub">
											<li>
							<a href="<?php echo admin_url('transaction')?>">
								Giao dịch							</a>
						</li>
											<li>
							<a href="<?php echo admin_url('order')?>">
								Đơn hàng sản phẩm							</a>
						</li>
									</ul>
						
		</li>
			<li class="product">
		
			<a href="admin/product.html" class="exp inactive">
				<span>Sản phẩm</span>
				<strong>3</strong>
			</a>
			    <ul style="display: none;" class="sub">
						<li>
							<a href="<?php echo admin_url('product')?>">
								Sản phẩm							
							</a>
						</li>
						<li>
							<a href="<?php echo admin_url('catalog')?>">
								Danh mục							
							</a>
						</li>
											<li>
							<a href="<?php echo admin_url('comment')?>">
								Phản hồi							</a>
						</li>
									</ul>
						
		</li>
			<li class="account">
		
			<a href="admin/account.html" class="exp inactive">
				<span>Tài khoản</span>
				<strong>3</strong>
			</a>
			
						<ul style="display: none;" class="sub">
							<li>
							<a href="<?php echo admin_url('admin')?>">
								Ban quản trị							
							</a>
						</li>
											<li>
							<a href="admin/admin_group.html">
								Nhóm quản trị							</a>
						</li>
											<li>
							<a href="admin/user.html">
								Thành viên							</a>
						</li>
									</ul>
						
		</li>
			<li class="support">
		
			<a href="admin/support.html" class="exp inactive">
				<span>Hỗ trợ</span>
				<strong>1</strong>
			</a>
			
							<ul style="display: none;" class="sub">
											<li>
							<a href="<?php echo admin_url('support')?>">
								Hỗ trợ							</a>
						</li>
											
									</ul>
						
		</li>
			<li class="content">
		
			<a href="admin/content.html" class="exp inactive">
				<span>Nội dung</span>
				<strong>3</strong>
			</a>
			
							<ul style="display: none;" class="sub">
											<li>
							<a href="<?php echo admin_url('slide')?>">
								Slide
								</a>
						</li>
						
						<li>
							<a href="<?php echo admin_url('news')?>">
								Tin tức	
								</a>
						</li>
											<li>
							<a href="<?php echo admin_url('video')?>">
								Video							</a>
						</li>
									</ul>
						
		</li>
	
</ul>
			
		</div>
		<div class="clear"></div>
	