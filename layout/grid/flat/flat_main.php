<div class="pure-u-1-2 pure-u-md-1-<?php echo $perrow; ?>" id="upg_<?php echo get_the_ID(); ?>">
<div class="margin-box" >
<figure class="cap-left">
<center>
<?php
if($post_status=="draft")
		$permalink=0;
	
			if($permalink=="0")
			{
			echo '<img src="'.$image.'" class="pure-img" ><figcaption> '.$thetitle.' </figcaption> ';
			}
		else
		{
			if($popup=="on")
			{
			
			echo '<a href="'.$preview_large.'" title="'.$thetitle.'" class="'.$preview_type.'" border=0><img src="'.$image.'" class="pure-img"><figcaption> '.$thetitle.' </figcaption> </a>';
			}
			else
			{
			echo '<a href="'.$permalink.'" border=0><img src="'.$image.'" class="pure-img"><figcaption> '.$thetitle.' </figcaption> </a>';
			}
		}

			?>
			<?php echo upg_show_icon_grid(); ?>
				<?php 
		if($post_status=="draft")
		echo '<div class="upg_tooltip"><i class="fas fa-eye-slash"></i><span class="upg_tooltiptext">'. __("Under review","wp-upg").'</span></div>'; 
	?>
	
			</center>
			</figure>
			</div>
  
  </div>