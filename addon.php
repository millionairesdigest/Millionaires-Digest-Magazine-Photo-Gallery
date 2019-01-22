<?php
function upg_addon_page()
{
	?>
	<div class="wrap">
	<h2>UPG (User Post Gallery) Free & Premium Extensions</h2>
	
<style>
.module {
  background: #eee;
}
.module h2 {
  line-height: 2;
  padding: 0 0 0 10px;
  background: #ccc;
  font-size: 16px;
}
.module h2 a {
  float: right;
  position: relative;
  text-decoration: none;
  color: #333;
  padding: 0 10px;
  border-left: 5px solid white;
  transition: padding 0.1s linear;
}
.module h2 a:hover, .module h2 a:focus {
  padding: 0 21px 0 14px;
}
.module h2 a:active {
  padding: 0 16px;
}
.module h2 a:before, .module h2 a:after {
  content: "";
  position: absolute;
  top: 50%;
  width: 0;
  height: 0;
}
.module h2 a:before {
  left: -12px;
  border-top: 8px solid transparent;
  border-bottom: 8px solid transparent;
  border-right: 8px solid white;
  margin-top: -8px;
}

.blue h2 a {
  background: #a2d6eb;
}
.blue h2 a:hover {
  background: #c5f0ff;
}
.blue h2 a:after {
  left: -5px;
  border-top: 6px solid transparent;
  border-bottom: 6px solid transparent;
  border-right: 6px solid #a2d6eb;
  margin-top: -6px;
}
.blue h2 a:hover:after, .blue h2 a:focus:after {
  border-right-color: #c5f0ff;
}

.red h2 a {
  background: #f0a5b5;
}
.red h2 a:hover {
  background: #ffc7d2;
}
.red h2 a:after {
  left: -5px;
  border-top: 6px solid transparent;
  border-bottom: 6px solid transparent;
  border-right: 6px solid #f0a5b5;
  margin-top: -6px;
}
.red h2 a:hover:after, .red h2 a:focus:after {
  border-right-color: #ffc7d2;
}

.green h2 a {
  background: #9cf1a4;
}
.green h2 a:hover {
  background: #bbffcf;
}
.green h2 a:after {
  left: -5px;
  border-top: 6px solid transparent;
  border-bottom: 6px solid transparent;
  border-right: 6px solid #9cf1a4;
  margin-top: -6px;
}
.green h2 a:hover:after, .green h2 a:focus:after {
  border-right-color: #bbffcf;
}

.module {
  width: 600px;
  margin: 0 0 20px 0;
}
.module .cnt {
  padding: 0 10px 10px 10px;
}
.module ul {
  margin-left: 10px;
  padding-left: 10px;
}

</style>


<script>
jQuery(document).ready(function($){
       $("#tabs").tabs();
});
  </script>
  	<div id="tabs">
	<ul>
		
       
		
		<li><a href="#tab-1"><?php echo __("UPG Plugins","wp-upg");?></a></li>
		 <li><a href="#tab-2"><?php echo __("UPG Layouts","wp-upg");?></a></li>
	       </ul>
	 <div id="tab-1">
 

<div class="module red">
  <h2> <?php _e('Search', 'wp-upg'); ?>  <a href="http://odude.com/product/wp-upg-pro/">UPG PRO </a></h2>
  <div class="cnt">
    <p>You can include search bar above gallery using shortcode. <br>Use shortcode as [upg-search] at widgets or anywhere.<br>It will serach and search bar will automatically appear above gallery.<br>
	<img src="http://odude.com/wp-content/uploads/2018/05/search.png">
	<br>
	<a href="http://odude.com/product/wp-upg-pro/" target="_blank" class="install-now button">View Details</a>
	</p>
  </div>
</div>

<div class="module green">
  <h2>Popup Form Button <a href="<?php echo admin_url("plugin-install.php?tab=plugin-information&plugin=listpress"); ?>">ListPress</a></h2>
  <div class="cnt">
    <p>Dynamically place popup form button at preview page. <br>It can be used for several proposes. Eg. Report Spam, Make Inquiry, Send Feedback buttons.<br>
	It also has option to send message to post's author. 
	<br>
	<br>
	<a href="https://wordpress.org/plugins/listpress/" target="_blank" class="install-now button">View Details</a>
	</p>
  </div>
</div>


<div class="module red">
  <h2>Page Redirect <a href="http://odude.com/product/wp-upg-pro/">UPG PRO </a></h2>
  <div class="cnt">
    <p>Page can be redirect to the desired page after the form is submitted by user. 
	<br> <br>

	<img src="http://odude.com/demo/faq/wp-content/uploads/sites/2/2018/03/redirect.png" width="500">
	
	<br>
	<a href="http://odude.com/product/wp-upg-pro/" target="_blank" class="install-now button">View Details</a>
	
	</p>
  </div>
</div>

<div class="module red">
  <h2>  Bulk Image Post <a href="http://odude.com/product/wp-upg-pro/">UPG PRO </a></h2>
  <div class="cnt">
    <p>Multiple images can be submitted at same time from the front end. <br> It can also restrict number of images to be uploaded at once.  
	<br> <br>
	<br>
	<a href="http://odude.com/product/wp-upg-pro/" target="_blank" class="install-now button">View Details</a>
	</p>
  </div>
</div>

<div class="module blue">
  <h2>UPG Album List <a href="<?php echo admin_url("widgets.php"); ?>">Widgets Installed </a></h2>
  <div class="cnt">
    <p>This will list Album/categories of UPG (User Post Gallery).<br>
The album marked hidden will not be listed.	
	<br> <br>
	</p>
  </div>
</div>

<div class="module green">
  <h2>Page Navigation <a href="<?php echo admin_url("plugin-install.php?tab=plugin-information&plugin=wp-pagenavi"); ?>">WP-PageNavi</a></h2>
  <div class="cnt">
    <p>Page navigation for Image, Youtube, Vimeo, Post Gallery. It is displayed if the number of images per-page is exceeded. 
	<br> <br>
	<img src="https://ps.w.org/wp-pagenavi/assets/screenshot-1.png?rev=1206758" width="500">
	<br><br>
	<a href="<?php echo "https://wordpress.org/plugins/wp-pagenavi/"; ?>" target="_blank" class="install-now button">View Details</a></p>
  </div>
</div>
<hr>
<div class="module red">
  <h2>Captcha security <a href="http://odude.com/product/wp-upg-pro/">UPG PRO</a></h2>
  <div class="cnt">
  <p>
  
    Captcha: <b>Google reCaptcha V2 </b> so that spammers need to pass security check before posting images & Videos to wp-upg plugins. 
	<br> <br>
	<img src="http://odude.com/wp-content/uploads/2017/04/wp-upg-pro-captcha-300x274.png" width="300">
	
	<br><br>
	<a href="http://odude.com/product/wp-upg-pro/" target="_blank" class="install-now button">View Details</a></p>
  </div>
</div>
<hr>
<div class="module red">
  <h2>Email notification <a href="http://odude.com/product/wp-upg-pro/">UPG PRO</a></h2>
  <div class="cnt">
  <p>
  Enables Email notification when content,image,youtube,vimeo video is uploaded
 
<br>
		<img src="http://odude.com/wp-content/uploads/2017/04/email_notify.png" width="400">
	<br><br>
	<a href="http://odude.com/product/wp-upg-pro/" target="_blank" class="install-now button">View Details</a></p>
  </div>
</div>
<hr>
<div class="module green">
  <h2>Page Restrict <a href="<?php echo admin_url("plugin-install.php?tab=plugin-information&plugin=pagerestrict"); ?>">FREE Plugin</a></h2>
  <div class="cnt">
    <p><b>Restrict certain pages or posts to logged in users.</b>
	<br><ul>
	<li>
	* Stop unknown, unregistered users from posting images from your frontend.</li>
	<li>* Restrict your gallery page to be shown only for logged-in users.</li>
	</ul>
	<br>
	
	<br><br>
	<a href="https://wordpress.org/plugins/pagerestrict/" target="_blank" class="install-now button">View Details</a></p>
  </div>
</div>

	
</div>
   <div id="tab-2">
   
   
   <div class="module green">
  <h2>Photo Layout <a href="http://odude.com/demo/faq/upg/theme-photo-layout/">Details</a></h2>
  <div class="cnt">
    <p>Best suited for photographers. Masonry grid view and preview page with uploaded picture auto extracted exif information.  
	<br>
  <img src="https://odude.com/wp-content/uploads/2018/12/masonry-thumbnail-e1546252318265.png" width="200px">
	<br>
	<a href="https://odude.com/demo/photo/users-post-gallery/" target="_blank" class="install-now button">Demo</a>
  <a href="https://odude.com/product/upg-layout-upg-pro/" target="_blank" class="install-now button">Buy all Layout</a>
	</p>
  </div>
</div>

<div class="module green">
  <h2>Shop Layout <a href="http://odude.com/demo/faq/upg/shop-layout/">Details</a></h2>
  <div class="cnt">
    <p>UPG can be customized for the product catalog and can be used as a framework of ecommerce site.  
	<br>
  <img src="https://odude.com/wp-content/uploads/2018/12/shop_layout-300x183.png" width="200px">
	<br>
	<a href="http://softprincess.com/" target="_blank" class="install-now button">Demo</a>
  <a href="https://odude.com/product/upg-layout-upg-pro/" target="_blank" class="install-now button">Buy all Layout</a>
	</p>
  </div>
</div>

<div class="module green">
  <h2>FAQ Layout <a href="http://odude.com/demo/faq/upg/theme-faq-layout/">Details</a></h2>
  <div class="cnt">
    <p>UPG Post contents with tabular format.
	<br>
  <img src="https://odude.com/wp-content/uploads/2018/12/faq_layout_gallery.png" width="200px">
	<br>
	<a href="http://odude.com/demo/faq/users-post-gallery/gallery/" target="_blank" class="install-now button">Demo</a>
  <a href="https://odude.com/product/upg-layout-upg-pro/" target="_blank" class="install-now button">Buy all Layout</a>
	</p>
  </div>
</div>

   </div>
   </div>
	
	
	
	</div>
	
	<?php
}
?>