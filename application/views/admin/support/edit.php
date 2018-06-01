<!-- head -->
<?php $this->load->view('admin/support/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
      <div class="widget">
           <div class="title">
			<h6>Chỉnh sửa thông tin hỗ trợ khách hàng</h6>
		</div>

      <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
          <fieldset>
                
		  <div class="formRow">
                	<label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo $info->name ?>" name="name"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('name')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
				<div class="formRow">
                	<label for="param_yahoo" class="formLeft">Yahoo:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_yahoo" value="<?php echo $info->yahoo ?>" name="yahoo"></span>
                		<span class="autocheck" name="yahoo_autocheck"></span>
                		<div class="clear error" name="yahoo_error"><?php echo form_error('yahoo')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
				<div class="formRow">
                	<label for="param_gmail" class="formLeft">Gmail:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_gmail" value="<?php echo $info->gmail ?>" name="gmail"></span>
                		<span class="autocheck" name="gmail_autocheck"></span>
                		<div class="clear error" name="gmail_error"><?php echo form_error('gmail')?></div>
                	</div>
                	<div class="clear"></div>
                </div>

				<div class="formRow">
                	<label for="param_skype" class="formLeft">Skype:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_skype" value="<?php echo $info->skype ?>" name="skype"></span>
                		<span class="autocheck" name="skype_autocheck"></span>
                		<div class="clear error" name="skype_error"><?php echo form_error('skype')?></div>
                	</div>
                	<div class="clear"></div>
                </div>

				<div class="formRow">
                	<label for="param_phone" class="formLeft">Phone:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_phone" value="<?php echo $info->phone ?>" name="phone"></span>
                		<span class="autocheck" name="phone_autocheck"></span>
                		<div class="clear error" name="phone_error"><?php echo form_error('phone')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                <div class="formSubmit">
	           			<input type="submit" class="redB" value="Cập nhật">
	           	</div>
          </fieldset>
      </form>
      
      </div>
</div>
