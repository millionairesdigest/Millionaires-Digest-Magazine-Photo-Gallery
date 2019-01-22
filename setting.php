<?php
function upg_add_admin_menu(  ) 
{ 

	add_submenu_page( 'edit.php?post_type=upg', 'Gallery Settings', 'UPG Settings', 'manage_options', 'wp_upg', 'upg_options_page' );
	add_submenu_page( 'edit.php?post_type=upg', 'Edit Layouts', 'Layout Editor', 'manage_options', 'wp_upg_layout', 'upg_layout_page' );
	add_submenu_page( 'edit.php?post_type=upg', 'Additional Help', 'Help / System Check', 'manage_options', 'wp_upg_help', 'upg_help_page' );
}


function upg_settings_init(  ) 
{ 
	
	
	//Basic Setting
	register_setting( 'ImageSettingPage', 'upg_settings' );
	

	add_settings_section(
		'upg_ImageSettingPage_section', 
		__( 'Settings', 'wp-upg' ), 
		'upg_settings_section_callback', 
		'ImageSettingPage'
	);
	add_settings_field( 
		'upg_select_quick_field', 
		__( 'Quick Settings', 'wp-upg' ), 
		'upg_quick_settings', 
		'ImageSettingPage', 
		'upg_ImageSettingPage_section' 
	);

	add_settings_field( 
		'upg_grid_settings_field', 
		__( 'UPG\'s Grid Layout Settings', 'wp-upg' ), 
		'upg_grid_settings', 
		'ImageSettingPage', 
		'upg_ImageSettingPage_section' 
	);

	add_settings_field( 
		'upg_select_pickup_field', 
		__( 'UPG\'s Submission form Settings', 'wp-upg' ), 
		'upg_form_settings', 
		'ImageSettingPage', 
		'upg_ImageSettingPage_section' 
	);

	
	add_settings_field( 
		'upg_primary_global_field', 
		__( 'UPG\'s Media Layout Settings', 'wp-upg' ), 
		'upg_preview_layout_settings', 
		'ImageSettingPage', 
		'upg_ImageSettingPage_section' 
	);
	

	
	
	//End Basic Setting
	

	
	//Add Primary Images Settings
	register_setting( 'primary_images_setting_page', 'upg_settings' );
	add_settings_section(
		'upg_primary_image_section', 
		__( 'Form Fields & Shortcodes', 'wp-upg' ), 
		'upg_primary_image_section_callback', 
		'primary_images_setting_page'
	);

		
	
	add_settings_field( 
		'upg_primary_extra_field', 
		__( 'Custom Extra Fields', 'wp-upg' ), 
		'upg_primary_custom_field_settings', 
		'primary_images_setting_page', 
		'upg_primary_image_section' 
	);
	
	 add_settings_field( 
		'upg_textarea_shortcode_1', 
		__( 'Shortcode for Position 1st', 'wp-upg' ), 
		'upg_textarea_shortcode_1_render', 
		'primary_images_setting_page', 
		'upg_primary_image_section' 
	); 
	 add_settings_field( 
		'upg_textarea_shortcode_2', 
		__( 'Shortcode for Position 2nd', 'wp-upg' ), 
		'upg_textarea_shortcode_2_render', 
		'primary_images_setting_page', 
		'upg_primary_image_section' 
	); 
			
		
	
	//Ultimate Member Setting Page
	register_setting( 'ImageSetting_ultimatemember_Page', 'upg_settings' );
	
		add_settings_section(
		'upg_ImageSettingPage_ultimatemember_section', 
		__( 'Social Profile Settings', 'wp-upg' ), 
		'upg_settings_section_ultimatemember_callback', 
		'ImageSetting_ultimatemember_Page'
	);
	
	 add_settings_field( 
		'upg_setting_ultimatemember_1', 
		__( 'Member Profile Tab', 'wp-upg' ), 
		'upg_setting_ultimatemember_1_render', 
		'ImageSetting_ultimatemember_Page', 
		'upg_ImageSettingPage_ultimatemember_section' 
	); 
	 


}



 function upg_textarea_shortcode_1_render(  ) 
{ 

	$options = get_option( 'upg_settings' );
	if(isset($options['upg_textarea_shortcode_1']))
		$output=$options['upg_textarea_shortcode_1'];
		else
		$output="";
	?>
	You can include any other plugin shortcode or message. Eg. social share, buttons, notices<br>It will appear at media preview page only only if lightbox is off.<br>
	<textarea cols='60' rows='3' name='upg_settings[upg_textarea_shortcode_1]'><?php echo $output; ?></textarea>
	<?php

} 
 function upg_textarea_shortcode_2_render(  ) 
{ 

	$options = get_option( 'upg_settings' );
	if(isset($options['upg_textarea_shortcode_2']))
		$output=$options['upg_textarea_shortcode_2'];
		else
		$output="";
	?>
	<textarea cols='60' rows='3' name='upg_settings[upg_textarea_shortcode_2]'><?php echo $output; ?></textarea>
	<?php

} 


//Ultimate-Member functions
 function upg_setting_ultimatemember_1_render(  ) 
{ 

	$options = get_option( 'upg_settings' );
	if(isset($options['upg_ultimatemember_tabname']))
		$output=$options['upg_ultimatemember_tabname'];
		else
		$output="Gallery";
	
		if(!isset($options['upg_ultimatemember_enable']))
		{
			$options['upg_ultimatemember_enable']="0";
			
		}
		
			if(!isset($options['upg_buddypress_enable']))
		{
			$options['upg_buddypress_enable']="0";
			
		}
		
		if(isset($options['upg_ultimatemember_icon']))
		$output_icon=$options['upg_ultimatemember_icon'];
		else
		$output_icon="um-faicon-picture-o";
	
	?>
	
	<b>Enable <a href="https://wordpress.org/plugins/ultimate-member/" target="_blank">Ultimate-Member:</a></b> <input type="checkbox" name='upg_settings[upg_ultimatemember_enable]' value='1' <?php if($options['upg_ultimatemember_enable']=='1') echo 'checked="checked"'; ?> ><br>
	Shows tab on user profile page of Ultimate Member plugin.
	<br><br>
	  <b>Enable <a href="https://wordpress.org/plugins/buddypress/" target="_blank">BuddyPress:</a></b> <input type="checkbox" name='upg_settings[upg_buddypress_enable]' value='1' <?php if($options['upg_buddypress_enable']=='1') echo 'checked="checked"'; ?> ><br>
	Shows tab on user profile page of BuddyPress plugin.
	<br><br>
	
	<b>Tab-name</b> at profile page : <input type="text" name='upg_settings[upg_ultimatemember_tabname]' value='<?php echo $output; ?>' maxlength="20" size="20" ><br><br>
	<b>Tab-icon</b> at the Ultimate-Member profile page : <input type="text" name='upg_settings[upg_ultimatemember_icon]' value='<?php echo $output_icon; ?>' maxlength="20" size="20" > Eg. <a href="https://gist.github.com/plusplugins/b504b6851cb3a8a6166585073f3110dd" target="_blank">um-faicon-picture-o </a><br><br>
	
	<?php
	
	

} 
 
function upg_settings_section_ultimatemember_callback(  ) 
{ 

	echo __( 'Ultimate-Member is Wordpress membership plugin
that offers a member profile page.<br>After enabling the UPG plugin, you can cause
the Ultimate-Member profile page to have an extra tab and that tab can show the UPG post of your choice.<br><br>Basic settings applied to UPG-Post tab.', 'wp-upg' );
	
	
}





 function upg_quick_settings()
 {
	 $options = get_option('upg_settings');
		if(!isset($options['publish']))
		$options['publish']="0";
	
		if(!isset($options['guest_user']))
		$options['guest_user']=0;
	
	?>
	<a href="#" title="<?php echo __( 'Unpublished post are saved as draft. Admin must manually mark as published before it is visible to visitors.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a> <b>Automatically publish UPG Post as soon as user upload/submit:</b> <input type="checkbox" name='upg_settings[publish]' value='1' <?php if($options['publish']=='1') echo 'checked="checked"'; ?> >
	<br><br>
	
	<a href="#" title="<?php echo __( 'When not logged in user submit post the post must be assigned with username.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a> 
	<b>Assign user for unregistered or not logged in users: </b><?php upg_droplist_user($options['guest_user']); ?> <br>It's better to <a href="<?php echo admin_url( 'user-new.php' );?>">create GUEST USER</a> with minimum access.
	<br><br>
	
	
	
	<b>Include UPG post into archive page:</b> <input type="checkbox" name='upg_settings[archive]' value='1' <?php if($options['archive']=='1') echo 'checked="checked"'; ?> >
	<br>
	<br>
	

	
	
	
	 
	<?php
	do_action( "upg_setting_tab_basic_quick");
	 
 }

 function upg_grid_settings()
 {
	$options = get_option('upg_settings');
	?>
	<?php
	if(!isset($options['main_page']))
		$options['main_page']="";
?>
<code>This page require [upg-list] as a shortcode. Below settings can overridden by shortcode parameters applies specific to page. </code>
	<hr>

<a href="#" title="<?php echo __( 'Important settings', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/star.png">'; ?></a> 
<?php
	echo "<b>Select USER POST GALLERY main <a href='".admin_url( 'edit.php?post_type=page' )."'>page</a>. It is used for SEO.</b>: ";
    wp_dropdown_pages(
        array(
             'name' => 'upg_settings[main_page]',
             'echo' => 1,
             //'show_option_none' => __( '&mdash; Select &mdash;' ),
             //'option_none_value' => '0',
             'selected' => $options['main_page']
			 
        )
    );
	echo "<br>Page cannot be static front page and it must include [upg-list] shortcode.";
	
	
	//**************
	?>
	<br>
	<br>
	<b>Number of records per row :</b> <input type="text" name='upg_settings[global_perrow]' value='<?php echo $options['global_perrow']; ?>' maxlength="2" size="5" ><br><br>
	
	<b>Number of records per page :</b> <input type="text" name='upg_settings[global_perpage]' value='<?php echo $options['global_perpage']; ?>' maxlength="3" size="5" ><br><br>
	
	<b>Order/Sort By :</b>
	
	<select name="upg_settings[global_order]" id="upg_settings[global_order]">
	<option value="date" <?php if($options['global_order']=="date") echo 'selected="selected"'; ?>>Posted Date</option>
	<option value="modified" <?php if($options['global_order']=="modified") echo 'selected="selected"'; ?>>Modified Date</option>
	<option value="title" <?php if($options['global_order']=="title") echo 'selected="selected"'; ?>>Title</option>
	<option value="rand" <?php if($options['global_order']=="rand") echo 'selected="selected"'; ?>>Random</option>
	<option value="ID" <?php if($options['global_order']=="ID") echo 'selected="selected"'; ?>>Post ID</option>
</select><br><br>
	
	<a href="#" title="<?php echo __( 'wp-pagenavi plugin must be installed and active.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a> 
	
	<b>Enable Page Navigation :</b> <input type="checkbox" name='upg_settings[global_page]' value='on' <?php if($options['global_page']=='on') echo 'checked="checked"'; ?> ><br><br>
	
		<a href="#" title="<?php echo __( 'Image will get enlarged at same page. There is no change in page hence no preview layout is used.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a> 
		
		<b>Enable Lightbox Popup :</b> <input type="checkbox" name='upg_settings[global_popup]' value='on' <?php if($options['global_popup']=='on') echo 'checked="checked"'; ?> ><br><br>
		
		
	<b>Show Default UPG's Post from Album Name: </b> 
<?php 
wp_dropdown_categories( 'show_count=1&hierarchical=1&taxonomy=upg_cate&value_field=slug&name=upg_settings[global_album]&selected='.$options['global_album'].'&hide_empty=0&show_option_none=All Categories&option_none_value=' );
 ?>
 <br>
 <br>
 
 
 
 <table border="0"><tr><td>
 <a href="#" title="<?php echo __( 'Grid layout is where [upg-list] shortcode is used.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a>  
 <b>Default Grid Layout Name </b>:</td><td>

<?php echo upg_grid_layout_list($options['global_layout'],"upg_settings[global_layout]","grid",true); ?>
</td></tr></table>


	<b>Display Image Upload Button :</b> <input type="checkbox" name='upg_settings[primary_show_image_button]' value='1' <?php if($options['primary_show_image_button']=='1') echo 'checked="checked"'; ?> ><br>
	Submit Button will be displayed which is linked to page where [upg-post type=image] shortcode is used. Link page is at Global Settings tab.
	<br><br>
	
	
	<b>Display Post Video URL Button:</b> <input type="checkbox" name='upg_settings[primary_show_youtube_button]' value='1' <?php if($options['primary_show_youtube_button']=='1') echo 'checked="checked"'; ?> ><br>
	Submit Youtube Button will be displayed which is linked to page where [upg-post type=youtube] shortcode is used. Link page is at Global Settings tab.
	<br><br>
	
	  
	<a href="#" title="<?php echo __( 'This will check if the user is logged in or not and display the buttons according to it.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a> 
	<b>Display post buttons only for logged-in users : </b>
	<input type="checkbox" name='upg_settings[button_check_login]' value='1' <?php if($options['button_check_login']=='1') echo 'checked="checked"'; ?> ><br>
	This will hide upload/post button from other users and displayed only in logged-in user gallery.
	<br>
	<br>
  <b>Show trash icon at front-end: </b>
	<input type="checkbox" name='upg_settings[show_trash_icon]' value='1' <?php if($options['show_trash_icon']=='1') echo 'checked="checked"'; ?> ><br>
	This will show trash icon button for logged-in user in gallery & preview page.
	<br>
	<br>
  <b>Show Edit/Update icon at front-end: </b>
	<input type="checkbox" name='upg_settings[show_edit_icon]' value='1' <?php if($options['show_edit_icon']=='1') echo 'checked="checked"'; ?> ><br>
	This will show edit icon at gallery. This will let user to update submitted post.
	<br><br>
  <b>Show user icon at front-end: </b>
	<input type="checkbox" name='upg_settings[show_user_icon]' value='1' <?php if($options['show_user_icon']=='1') echo 'checked="checked"'; ?> ><br>
	This will show user icon button in gallery page which list upg-post submitted by user.

		<hr>
	<div class="update-nag">
	<u><b>Shortcode generated with above configuration to display Primary-Image Gallery</b></u><br><br>
	[upg-list 
	perrow="<?php echo $options['global_perrow']; ?>" 
	perpage="<?php echo $options['global_perpage']; ?>" 
	orderby="<?php echo $options['global_order']; ?>" 
	page="<?php echo $options['global_page']; ?>" 
	layout="<?php echo $options['global_layout']; ?>" 
	popup="<?php echo $options['global_popup']; ?>"
	album="<?php echo $options['global_album']; ?>" 
	<?php
	if(isset($options['primary_show_image_button']) || isset($options['primary_show_youtube_button']))
	{
		echo 'button="on"';
	}
	?>
	
	]
	
	<br><br><b>OR</b><br><br>
	Global settings will only be applied to below shortcode with only missing parameters.<br>
	<br>
	[upg-list] : List post as of default settings of missing parameters.<br>
	[upg-list album="<?php echo $options['global_album']; ?>"] : Displays post in grid layouto of specific alubm/category<br>
  [upg-list tag=""] : Displays post related to tags.<br>
	[upg-list popup="on"] : Lightbox will be enabled. No preview page is used.<br>
	
	</div>

	<?php
 }

 function upg_form_settings() 
 {
$options = get_option('upg_settings');


	if(!isset($options['guest_user']))
		$options['guest_user']="";
	
	if(!isset($options['archive']))
		$options['archive']="0";


		if(!isset($options['editor']))
		$options['editor']="0";

	
	
	
	?>
		<code>If you don't want user submission form, skip the settings below.<br> Submission form must have [upg-post type="image"] or [upg-post type="youtube"] as shortcode. </code><hr>
	
	<?php
	if(!isset($options['post_image_page']))
		$options['post_image_page']="";
?>
<a href="#" title="<?php echo __( 'Important settings', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/star.png">'; ?></a> 
<?php
	echo "<b>Select POST IMAGE <a href='".admin_url( 'edit.php?post_type=page' )."'>page</a>.</b>: ";
    wp_dropdown_pages(
        array(
             'name' => 'upg_settings[post_image_page]',
             'echo' => 1,
             //'show_option_none' => __( '&mdash; Select &mdash;' ),
             //'option_none_value' => '0',
             'selected' => $options['post_image_page']
			 
        )
    );
	echo "<br>It is the page to upload/post image/post. Page must contain [upg-post type=\"image\"] shortcode.";
	
	//**************
	?><br><br>
	
	<?php
	if(!isset($options['post_youtube_page']))
		$options['post_youtube_page']="";

	?>
<a href="#" title="<?php echo __( 'Important settings', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/star.png">'; ?></a> 
	<?php
		echo "<b>Select POST VIDEO URL <a href='".admin_url( 'edit.php?post_type=page' )."'>page</a>.</b>: ";
    wp_dropdown_pages(
        array(
             'name' => 'upg_settings[post_youtube_page]',
             'echo' => 1,
             //'show_option_none' => __( '&mdash; Select &mdash;' ),
             //'option_none_value' => '0',
             'selected' => $options['post_youtube_page']
			 
        )
    );
	echo "<br>It is the page to upload/post image/post. Page must contain [upg-post type=\"youtube\"] shortcode.";
	
	echo "<br><br>";
	
	
 	if(!isset($options['edit_upg_page']))
		$options['edit_upg_page']="";

	?>
<a href="#" title="<?php echo __( 'Important settings', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/star.png">'; ?></a> 
	<?php
		echo "<b>Select UPG Edit <a href='".admin_url( 'edit.php?post_type=page' )."'>page</a>.</b>: ";
    wp_dropdown_pages(
        array(
             'name' => 'upg_settings[edit_upg_page]',
             'echo' => 1,
             //'show_option_none' => __( '&mdash; Select &mdash;' ),
             //'option_none_value' => '0',
             'selected' => $options['edit_upg_page']
			 
        )
    );
	echo "<br>It is the page to edit/modify submitted post by user. Page must contain [upg-edit] shortcode."; 
	
	echo "<br><br>";

	//**************
?>
<a href="#" title="<?php echo __( 'This settings doesn\'t get applied to personal layout.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a> 
	<b>Display description input field at post form:</b> <input type="checkbox" name='upg_settings[primary_show_formshow_desp]' value='1' <?php if($options['primary_show_formshow_desp']=='1') echo 'checked="checked"'; ?> >
	<br><br>
	

	
	<a href="#" title="<?php echo __( 'This settings doesn\'t get applied to personal layout.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a> 
	<b>Enable GUI Editor (Bold,Italic,color) in description input field at post form:</b> <input type="checkbox" name='upg_settings[editor]' value='1' <?php if($options['editor']=='1') echo 'checked="checked"'; ?> >
	<br><br>
	
	<a href="#" title="<?php echo __( 'User at front-end don\'t require to post image compulsory but image upload field will be visible.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a> 
	<b>Make image upload compulsory or required during post submission.:</b> <input type="checkbox" name='upg_settings[image_required]' value='1' <?php if($options['image_required']=='1') echo 'checked="checked"'; ?> >
	<br><br>
	<?php echo '<img src="'.upg_PLUGIN_URL.'/images/new.png"> '; ?> 
	<a href="#" title="<?php echo __( 'Page doesn\'t get changed during form submission.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a> 
	<b>AJAX dynamic form submission:</b> <input type="checkbox" name='upg_settings[ajax_form]' value='1' <?php if(isset($options['ajax_form'])) if($options['ajax_form']=='1') echo 'checked="checked"'; ?> >
	<br>Add parameter ajax="true" in [upg-post] shortcode to enable ajax.<br><br>
	
	<table border="0"><tr><td>
	<?php echo '<img src="'.upg_PLUGIN_URL.'/images/new.png"> '; ?>  <a href="#" title="<?php echo __( 'Form layout is where [upg-post] shortcode is used.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a>  
 <b>Default Form Layout Name </b>:</td><td>

<?php echo upg_grid_layout_list($options['global_form_layout'],"upg_settings[global_form_layout]","form",false); ?>
</td></tr></table>
	
<?php
	do_action( "upg_setting_tab_basic_imp");	
	
}
function upg_primary_custom_field_settings()
{
	$options = get_option('upg_settings');

	
	?>
	<b>Note:</b> Custom Extra Fields values can be displayed in more dynamic way by using your own PHP code at [<b>Layout Editor: personal layout</b>]. Use personal layout for post.  
	<table class="pure-table pure-table-horizontal">
    <thead>
        <tr>
            <th>Type</th>
            <th>Internal Field Name</th>
            <th>Label Field Name</th>
            <th>Display Back end</th>
			<th>Display Front end</th>
        </tr>
    </thead>

    <tbody>
	<?php
	for ($x = 1; $x <= 5; $x++) 
	{
	?>
        <tr>
            <td>
			<select name='upg_settings[upg_custom_field_type_<?php echo $x; ?>]'>
			  <option value="222" <?php if($options['upg_custom_field_type_'.$x]=='text') echo 'selected'; ?>>Text</option>
			  <option value="checkbox" <?php if($options['upg_custom_field_type_'.$x]=='checkbox') echo 'selected'; ?>>Checkbox</option>
			</select>
			
					
			</td>
            <td>upg_custom_field_<?php echo $x; ?></td>
            
			<td><input type="text" name='upg_settings[upg_custom_field_<?php echo $x; ?>]' value='<?php echo $options['upg_custom_field_'.$x]; ?>' maxlength="20" size="20" ></td>
            
			<td><input type="checkbox" name='upg_settings[upg_custom_field_<?php echo $x; ?>_show]' value='on' <?php if($options['upg_custom_field_'.$x.'_show']=='on') echo 'checked="checked"'; ?> ></td>
			
			 <td><input type="checkbox" name='upg_settings[upg_custom_field_<?php echo $x; ?>_show_front]' value='on' <?php if($options['upg_custom_field_'.$x.'_show_front']=='on') echo 'checked="checked"'; ?> ></td>
        </tr>
	<?php
	}
?> 
    </tbody>
</table>
	<?php
	
	
}


 function upg_preview_layout_settings() 
 {
	$options = get_option('upg_settings');

	if(!isset($options['hide_title']))
	$options['hide_title']="0";
		
	?>
	<code>If lightbox or popup are enabled in grid layout. The media/preview page is not visible. Hence below settings are not required. This page doesn't require any shortcode. It is auto generated.</code>
	<hr>
		
<a href="#" title="<?php echo __( 'Sometime due to special theme, UPG will show two titles. You need to enable to make it one.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a>
	<b>Hide one UPG title if found double :</b> <input type="checkbox" name='upg_settings[hide_title]' value='1' <?php if($options['hide_title']=='1') echo 'checked="checked"'; ?> >
	<br>
	<br>

	<table border="0"><tr><td>
	<?php echo '<img src="'.upg_PLUGIN_URL.'/images/new.png"> '; ?>  <a href="#" title="<?php echo __( 'Media layout is UPG system. Preview parameter in [upg-post] shortcode is for media layouts.', 'wp-upg' ); ?>" class="upg_tooltip"><?php echo '<img src="'.upg_PLUGIN_URL.'/images/info.png">'; ?></a>  
 <b>Default Media Layout Name </b>:</td><td>

<?php echo upg_grid_layout_list($options['global_media_layout'],"upg_settings[global_media_layout]","media",false); ?>
</td></tr></table>

	<hr>
	<div class="update-nag">
	<b>To display single UPG post by ID : BETA version</b><br>
	[upg-pick id='00' notice='SALE']<br>
	layout & popup parameters are supported for upg-pick
	
	</div>
	<?php
	
}


function upg_settings_section_callback(  ) 
{ 

	//echo __( 'Update or modify required settings.', 'upg' );
	/**
 * Detect plugin. For use on Front End only.
 */
 //include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	
	
}

function upg_primary_image_section_callback(  ) 
{ 
echo '<b>';
echo __( 'Shortcode to display submission on front page is [upg-post type="image"] & [upg-post type="youtube"]', 'wp-upg' );
echo '</b>';
	
}

function upg_options_page(  ) 
{ 

/**
 * Detect plugin. For use on Front End only.
 */
 //include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$proactive=false;
 
	if ( is_plugin_active( 'wp-upg-pro/odude-ecard-pro.php' ) ) 
	{
		 $proactive=true;
	} 
	
	$propassive="This features required premium support.";




	?>
	
	<script>
jQuery(document).ready(function($){
       $("#tabs").tabs();
});
  </script>
  
<div class="wrap">
	



	<form action='options.php' method='post'>
		
		<h2>User Post Gallery (UPG) Settings</h2>
		<div id="tabs">
	<ul>
		
        <li><a href="#tab-1"><?php echo __("Basic Settings","wp-upg");?></a></li>
       
		
		<li><a href="#tab-3"><?php echo __("Form Fields","wp-upg");?></a></li> 
		
		<li> <a href="#tab-2"><?php echo __("Social Profile","wp-upg");?></a></li> 
		
		<?php
		do_action( "upg_setting_tab_title" , $upg_tab_title_id="", $upg_tab_title_label="" );
		?>
				
	</ul>
	 <div id="tab-1">
     <?php
	 settings_fields( 'ImageSettingPage' );
	do_settings_sections( 'ImageSettingPage' );
	 ?>
    </div>
   
	<div id="tab-3">
      <?php
	  
	  settings_fields( 'primary_images_setting_page' );
	  do_settings_sections( 'primary_images_setting_page' );
	  
	  ?>
    </div>
	
			 <div id="tab-2">
      <?php
	  
	 settings_fields( 'ImageSetting_ultimatemember_Page' );
	  do_settings_sections( 'ImageSetting_ultimatemember_Page' );
	  
	  ?>
    </div>
	
	<?php
		do_action( "upg_setting_tab_body" , $upg_tab_title_id="");
		?>
	
	</div>
		
		<?php
		flush_rewrite_rules();
		submit_button();
		?>
		
	</form>
</div>
	<?php

}
?>
