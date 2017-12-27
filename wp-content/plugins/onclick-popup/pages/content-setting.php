<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<div class="wrap">
  <div class="form-wrap">
    <div id="icon-edit" class="icon32 icon32-posts-post"><br>
    </div>
    <h2><?php _e('Onclick Popup', 'onclickpopup'); ?></h2>
    <?php

	$onclickpopup_title = get_option('onclickpopup_title');
	$onclickpopup_setting1 = get_option('onclickpopup_setting1');
	$onclickpopup_setting1_left = get_option('onclickpopup_setting1_left');
	$onclickpopup_setting1_top = get_option('onclickpopup_setting1_top');
	
	$onclickpopup_setting2 = get_option('onclickpopup_setting2');
	$onclickpopup_setting2_left = get_option('onclickpopup_setting2_left');
	$onclickpopup_setting2_top = get_option('onclickpopup_setting2_top');
	
	$onclickpopup_setting3 = get_option('onclickpopup_setting3');
	$onclickpopup_setting3_left = get_option('onclickpopup_setting3_left');
	$onclickpopup_setting3_top = get_option('onclickpopup_setting3_top');
	
	$onclickpopup_setting4 = get_option('onclickpopup_setting4');
	$onclickpopup_setting4_left = get_option('onclickpopup_setting4_left');
	$onclickpopup_setting4_top = get_option('onclickpopup_setting4_top');
	
	$onclickpopup_setting5 = get_option('onclickpopup_setting5');
	$onclickpopup_setting5_left = get_option('onclickpopup_setting5_left');
	$onclickpopup_setting5_top = get_option('onclickpopup_setting5_top');
	
	if (isset($_POST['onclickpopup_form_submit']) && $_POST['onclickpopup_form_submit'] == 'yes')
	{
		//	Just security thingy that wordpress offers us
		check_admin_referer('onclickpopup_form_setting');
			
		$onclickpopup_title = stripslashes($_POST['onclickpopup_title']);
		$onclickpopup_setting1 = stripslashes($_POST['onclickpopup_setting1']);
		$onclickpopup_setting1_left = stripslashes($_POST['onclickpopup_setting1_left']);
		$onclickpopup_setting1_top = stripslashes($_POST['onclickpopup_setting1_top']);
		
		$onclickpopup_setting2 = stripslashes($_POST['onclickpopup_setting2']);
		$onclickpopup_setting2_left = stripslashes($_POST['onclickpopup_setting2_left']);
		$onclickpopup_setting2_top = stripslashes($_POST['onclickpopup_setting2_top']);
		
		$onclickpopup_setting3 = stripslashes($_POST['onclickpopup_setting3']);
		$onclickpopup_setting3_left = stripslashes($_POST['onclickpopup_setting3_left']);
		$onclickpopup_setting3_top = stripslashes($_POST['onclickpopup_setting3_top']);
		
		$onclickpopup_setting4 = stripslashes($_POST['onclickpopup_setting4']);
		$onclickpopup_setting4_left = stripslashes($_POST['onclickpopup_setting4_left']);
		$onclickpopup_setting4_top = stripslashes($_POST['onclickpopup_setting4_top']);
		
		$onclickpopup_setting5 = stripslashes($_POST['onclickpopup_setting5']);
		$onclickpopup_setting5_left = stripslashes($_POST['onclickpopup_setting5_left']);
		$onclickpopup_setting5_top = stripslashes($_POST['onclickpopup_setting5_top']);

		update_option('onclickpopup_title', $onclickpopup_title );
		update_option('onclickpopup_setting1', $onclickpopup_setting1 );
		update_option('onclickpopup_setting1_left', $onclickpopup_setting1_left );
		update_option('onclickpopup_setting1_top', $onclickpopup_setting1_top );
		
		update_option('onclickpopup_setting2', $onclickpopup_setting2 );
		update_option('onclickpopup_setting2_left', $onclickpopup_setting2_left );
		update_option('onclickpopup_setting2_top', $onclickpopup_setting2_top );
		
		update_option('onclickpopup_setting3', $onclickpopup_setting3 );
		update_option('onclickpopup_setting3_left', $onclickpopup_setting3_left );
		update_option('onclickpopup_setting3_top', $onclickpopup_setting3_top );
		
		update_option('onclickpopup_setting4', $onclickpopup_setting4 );
		update_option('onclickpopup_setting4_left', $onclickpopup_setting4_left );
		update_option('onclickpopup_setting4_top', $onclickpopup_setting4_top );
		
		update_option('onclickpopup_setting5', $onclickpopup_setting5 );
		update_option('onclickpopup_setting5_left', $onclickpopup_setting5_left );
		update_option('onclickpopup_setting5_top', $onclickpopup_setting5_top );
		
		?>
		<div class="updated fade">
			<p><strong><?php _e('Details successfully updated.', 'onclickpopup'); ?></strong></p>
		</div>
		<?php
	}
	?>
	<script language="JavaScript" src="<?php echo WP_onclickpopup_PLUGIN_URL; ?>/pages/setting.js"></script>
	<form name="onclickpopup_form" method="post" action="">
		<h3><?php _e('Widget setting', 'onclickpopup'); ?></h3>
		
		<label for="tag-title"><?php _e('Widget title', 'onclickpopup'); ?></label>
		<input name="onclickpopup_title" type="text" id="onclickpopup_title" size="50" value="<?php echo $onclickpopup_title; ?>" />
		<p><?php _e('Please enter widget title.', 'onclickpopup'); ?></p>
		
		<div style="height:10px;"></div>
		<h3><?php _e('Setting 1', 'onclickpopup'); ?></h3>
		<label for="tag-title"><?php _e('CSS setting 1', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting1" type="text" id="onclickpopup_setting1" size="110" value="<?php echo $onclickpopup_setting1; ?>" />
		<p>Example: width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>
		<label for="tag-title"><?php _e('Left position', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting1_left" type="text" id="onclickpopup_setting1_left" size="10" maxlength="4" value="<?php echo $onclickpopup_setting1_left; ?>" />
		<p><?php _e('Please enter your popup window LEFT position for setting 1', 'onclickpopup'); ?></p>
		<label for="tag-title"><?php _e('Top position', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting1_top" type="text" id="onclickpopup_setting1_top" size="10" maxlength="4" value="<?php echo $onclickpopup_setting1_top; ?>" />
		<p><?php _e('Please enter your popup window TOP position for setting 1', 'onclickpopup'); ?></p>
		<div style="height:10px;"></div>
		
		<div style="height:10px;"></div>
		<h3><?php _e('Setting 2', 'onclickpopup'); ?></h3>
		<label for="tag-title"><?php _e('CSS setting 2', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting2" type="text" id="onclickpopup_setting2" size="110" value="<?php echo $onclickpopup_setting2; ?>" />
		<p>Example: width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>
		<label for="tag-title"><?php _e('Left position', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting2_left" type="text" id="onclickpopup_setting2_left" size="10" maxlength="4" value="<?php echo $onclickpopup_setting2_left; ?>" />
		<p><?php _e('Please enter your popup window LEFT position for setting 2', 'onclickpopup'); ?></p>
		<label for="tag-title"><?php _e('Top position', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting2_top" type="text" id="onclickpopup_setting2_top" size="10" maxlength="4" value="<?php echo $onclickpopup_setting2_top; ?>" />
		<p><?php _e('Please enter your popup window TOP position for setting 2', 'onclickpopup'); ?></p>
		<div style="height:10px;"></div>
		
		<div style="height:10px;"></div>
		<h3><?php _e('Setting 3', 'onclickpopup'); ?></h3>
		<label for="tag-title"><?php _e('CSS setting 3', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting3" type="text" id="onclickpopup_setting3" size="110" value="<?php echo $onclickpopup_setting3; ?>" />
		<p>Example: width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>
		<label for="tag-title"><?php _e('Left position', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting3_left" type="text" id="onclickpopup_setting3_left" size="10" maxlength="4" value="<?php echo $onclickpopup_setting3_left; ?>" />
		<p><?php _e('Please enter your popup window LEFT position for setting 3', 'onclickpopup'); ?></p>
		<label for="tag-title"><?php _e('Top position', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting3_top" type="text" id="onclickpopup_setting3_top" size="10" maxlength="4" value="<?php echo $onclickpopup_setting3_top; ?>" />
		<p><?php _e('Please enter your popup window TOP position for setting 3', 'onclickpopup'); ?></p>
		<div style="height:10px;"></div>
		
		<div style="height:10px;"></div>
		<h3><?php _e('Setting 4', 'onclickpopup'); ?></h3>
		<label for="tag-title"><?php _e('CSS setting 4', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting4" type="text" id="onclickpopup_setting4" size="110" value="<?php echo $onclickpopup_setting4; ?>" />
		<p>Example: width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>
		<label for="tag-title"><?php _e('Left position', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting4_left" type="text" id="onclickpopup_setting4_left" size="10" maxlength="4" value="<?php echo $onclickpopup_setting4_left; ?>" />
		<p><?php _e('Please enter your popup window LEFT position for setting 4', 'onclickpopup'); ?></p>
		<label for="tag-title"><?php _e('Top position', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting4_top" type="text" id="onclickpopup_setting4_top" size="10" maxlength="4" value="<?php echo $onclickpopup_setting4_top; ?>" />
		<p><?php _e('Please enter your popup window TOP position for setting 4', 'onclickpopup'); ?></p>
		<div style="height:10px;"></div>
		
		<div style="height:10px;"></div>
		<h3><?php _e('Setting 5', 'onclickpopup'); ?></h3>
		<label for="tag-title"><?php _e('CSS setting 5', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting5" type="text" id="onclickpopup_setting5" size="110" value="<?php echo $onclickpopup_setting5; ?>" />
		<p>Example: width: 320px; background: #FFF; text-align: center; font-family: Arial,sans-serif; padding: 10px; border: 2px solid #666;</p>
		<label for="tag-title"><?php _e('Left position', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting5_left" type="text" id="onclickpopup_setting5_left" size="10" maxlength="4" value="<?php echo $onclickpopup_setting5_left; ?>" />
		<p><?php _e('Please enter your popup window LEFT position for setting 5', 'onclickpopup'); ?></p>
		<label for="tag-title"><?php _e('Top position', 'onclickpopup'); ?></label>
		<input name="onclickpopup_setting5_top" type="text" id="onclickpopup_setting5_top" size="10" maxlength="4" value="<?php echo $onclickpopup_setting5_top; ?>" />
		<p><?php _e('Please enter your popup window TOP position for setting 5', 'onclickpopup'); ?></p>
		<div style="height:10px;"></div>
		
		<div style="height:10px;"></div>
		<input type="hidden" name="onclickpopup_form_submit" value="yes"/>
		<input name="onclickpopup_submit" id="onclickpopup_submit" class="button add-new-h2" value="<?php _e('Submit', 'onclickpopup'); ?>" type="submit" />
		<input name="Help" lang="publish" class="button add-new-h2" onclick="onclickpopup_help()" value="<?php _e('Help', 'onclickpopup'); ?>" type="button" />
		<?php wp_nonce_field('onclickpopup_form_setting'); ?>
	</form>
  </div>
  <br />
<p class="description">
	<?php _e('Check official website for more information', 'onclickpopup'); ?>
	<a target="_blank" href="<?php echo WP_onclickpopup_FAV; ?>"><?php _e('click here', 'onclickpopup'); ?></a>
</p>
</div>