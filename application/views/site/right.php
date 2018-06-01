
			                  <!-- The Support -->
	     <div class="box-right">
                <div class="title tittle-box-right">
			        <h2> Hỗ trợ trực tuyến </h2>
			    </div>
			    <div class="content-box">
			         <!-- goi ra phuong thuc hien thi danh sach ho tro -->
			         <div class="support">
                    <strong>Nguyễn Thanh Luật </strong>				
          <a rel="nofollow" href="ymsgr:sendIM?tuyenht90">
		  <img style = "width: 100px; height: 120px" src="<?php echo public_url()?>/site/images/profile.jpg">
	      </a>
	      
	      <p>
	         <img style="margin-bottom:-3px" src="<?php echo public_url()?>/site/images/phone.png"> )987936604	      </p>
	      
		  <p>
			<a rel="nofollow" href="mailto:hoangvantuyencnt@gmail.com">
			    <img style="margin-bottom:-3px" src="<?php echo public_url()?>/site/images/email.png"> Email: nguyenthanhluat.it@gmail.com
		    </a>
		  </p>
		  <p>
			<a rel="nofollow" href="skype:tuyencnt90">
			     <img style="margin-bottom:-3px" src="<?php echo public_url()?>/site/images/skype.png"> Skype: boynuce97			</a>
		</p>	

<strong>Nguyễn Đức Long </strong>				
          <a rel="nofollow" href="ymsgr:sendIM?tuyenht90">
		  <img style = "width: 100px; height: 120px" src="<?php echo public_url()?>/site/images/long.jpg">
	      </a>
	      
	      <p>
	         <img style="margin-bottom:-3px" src="<?php echo public_url()?>/site/images/phone.png"> )987936604	      </p>
	      
		  <p>
			<a rel="nofollow" href="mailto:hoangvantuyencnt@gmail.com">
			    <img style="margin-bottom:-3px" src="<?php echo public_url()?>/site/images/email.png"> Email: nguyenduclong@gmail.com
		    </a>
		  </p>
		  <p>
			<a rel="nofollow" href="skype:tuyencnt90">
			     <img style="margin-bottom:-3px" src="<?php echo public_url()?>/site/images/skype.png"> Skype: nguyenduclong			</a>
		</p>

		
		</div>			        </div>
          </div>
       <!-- End Support -->
       
         <!-- The news -->
	          <div class="box-right">
                <div class="title tittle-box-right">
			        <h2> Bài viết mới </h2>
			    </div>
			    <div class="content-box">
			       <ul class="news">
			            <?php foreach ($news_list as $row):?>
			            <li>
			                <a href="" title="<?php echo $row->title?> ">
			                <img src="<?php echo base_url('upload/new/'.$row->image_link)?>" style="width:50px" alt="<?php echo $row->title?> ">
			                <?php echo $row->title?>                        
			                </a>
	                     </li>
	                     <?php endforeach;?>
	                 </ul>
	    </div>
   </div>		<!-- End news -->

		

					  