<?php if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); } ?>
<?php
// Form submitted, check the data
if (isset($_POST['frm_onclickpopup_display']) && $_POST['frm_onclickpopup_display'] == 'yes')
{
	$did = isset($_GET['did']) ? $_GET['did'] : '0';
	
	$onclickpopup_success = '';
	$onclickpopup_success_msg = FALSE;
	
	// First check if ID exist with requested ID
	$sSql = $wpdb->prepare(
		"SELECT COUNT(*) AS `count` FROM ".WP_ONCLICK_PLUGIN."
		WHERE `onclickpopup_id` = %d",
		array($did)
	);
	$result = '0';
	$result = $wpdb->get_var($sSql);
	
	if ($result != '1')
	{
		?><div class="error fade"><p><strong><?php _e('Oops, selected details doesnt exist', 'onclickpopup'); ?></strong></p></div><?php
	}
	else
	{
		// Form submitted, check the action
		if (isset($_GET['ac']) && $_GET['ac'] == 'del' && isset($_GET['did']) && $_GET['did'] != '')
		{
			//	Just security thingy that wordpress offers us
			check_admin_referer('onclickpopup_form_show');
			
			//	Delete selected record from the table
			$sSql = $wpdb->prepare("DELETE FROM `".WP_ONCLICK_PLUGIN."`
					WHERE `onclickpopup_id` = %d
					LIMIT 1", $did);
			$wpdb->query($sSql);
			
			//	Set success message
			$onclickpopup_success_msg = TRUE;
			$onclickpopup_success = __('Selected record was successfully deleted.', 'onclickpopup');
		}
	}
	
	if ($onclickpopup_success_msg == TRUE)
	{
		?><div class="updated fade"><p><strong><?php echo $onclickpopup_success; ?></strong></p></div><?php
	}
}
?>
<div class="wrap">
  <div id="icon-edit" class="icon32 icon32-posts-post"></div>
    <h2><?php _e('Onclick Popup', 'onclickpopup'); ?>
	<a class="add-new-h2" href="<?php echo WP_onclickpopup_ADMIN_URL; ?>&amp;ac=add"><?php _e('Add New', 'onclickpopup'); ?></a></h2>
    <div class="tool-box">
	<?php
		$sSql = "SELECT * FROM `".WP_ONCLICK_PLUGIN."` order by onclickpopup_group, onclickpopup_id";
		$myData = array();
		$myData = $wpdb->get_results($sSql, ARRAY_A);
		?>
		<script language="JavaScript" src="<?php echo WP_onclickpopup_PLUGIN_URL; ?>/pages/setting.js"></script>
		<form name="frm_onclickpopup_display" method="post">
      <table width="100%" class="widefat" id="straymanage">
        <thead>
          <tr>
            <th class="check-column" scope="row"><input type="checkbox" /></th>
			<th scope="col"><?php _e('Popup Title', 'onclickpopup'); ?></th>
			<th scope="col"><?php _e('Popup content', 'onclickpopup'); ?></th>
            <th scope="col"><?php _e('Group', 'onclickpopup'); ?></th>
			<th scope="col"><?php _e('Expiration', 'onclickpopup'); ?></th>
          </tr>
        </thead>
		<tfoot>
          <tr>
            <th class="check-column" scope="row"><input type="checkbox" /></th>
			<th scope="col"><?php _e('Popup Title', 'onclickpopup'); ?></th>
			<th scope="col"><?php _e('Popup content', 'onclickpopup'); ?></th>
            <th scope="col"><?php _e('Group', 'onclickpopup'); ?></th>
			<th scope="col"><?php _e('Expiration', 'onclickpopup'); ?></th>
          </tr>
        </tfoot>
		<tbody>
			<?php 
			$i = 0;
			if(count($myData) > 0 )
			{
				foreach ($myData as $data)
				{
					?>
					<tr class="<?php if ($i&1) { echo'alternate'; } else { echo ''; }?>">
						<td align="left"><input type="checkbox" value="<?php echo $data['onclickpopup_id']; ?>" name="onclickpopup_group_item[]"></td>
						<td><?php echo $data['onclickpopup_title']; ?>
						<div class="row-actions">
						<span class="edit"><a title="Edit" href="<?php echo WP_onclickpopup_ADMIN_URL; ?>&amp;ac=edit&amp;did=<?php echo $data['onclickpopup_id']; ?>"><?php _e('Edit', 'onclickpopup'); ?></a> | </span>
						<span class="trash"><a onClick="javascript:onclickpopup_delete('<?php echo $data['onclickpopup_id']; ?>')" href="javascript:void(0);"><?php _e('Delete', 'onclickpopup'); ?></a></span> 
						</div>
						</td>
						<td><?php echo substr(stripslashes($data['onclickpopup_content']),0,110); ?>...</td>
						<td><?php echo $data['onclickpopup_group']; ?></td>
						<td><?php echo substr($data['onclickpopup_date'],0,10); ?></td>
					</tr>
					<?php 
					$i = $i+1; 
				} 
			}
			else
			{
				?><tr><td colspan="5" align="center"><?php _e('No records available.', 'onclickpopup'); ?></td></tr><?php 
			}
			?>
		</tbody>
        </table>
		<?php wp_nonce_field('onclickpopup_form_show'); ?>
		<input type="hidden" name="frm_onclickpopup_display" value="yes"/>
      </form>	
	  <div class="tablenav">
	  <h2>
	  <a class="button add-new-h2" href="<?php echo WP_onclickpopup_ADMIN_URL; ?>&amp;ac=add"><?php _e('Add New', 'onclickpopup'); ?></a>
	  <a class="button add-new-h2" target="_blank" href="<?php echo WP_onclickpopup_FAV; ?>"><?php _e('Help', 'onclickpopup'); ?></a>
	  </h2>
	  </div>
		<div style="height:5px"></div>
		<h3><?php _e('Plugin configuration option', 'onclickpopup'); ?></h3>
		<ol>
			<li><?php _e('Add the plugin in the posts or pages using short code.', 'onclickpopup'); ?></li>
			<li><?php _e('Add directly in to the theme using PHP code.', 'onclickpopup'); ?></li>
			<li><?php _e('Drag and drop the widget to your sidebar.', 'onclickpopup'); ?></li>
		</ol>
		<p class="description">
			<?php _e('Check official website for more information', 'onclickpopup'); ?>
			<a target="_blank" href="<?php echo WP_onclickpopup_FAV; ?>"><?php _e('click here', 'onclickpopup'); ?></a>
		</p>
	</div>
</div>