<div class="contentWrapper" id="contentWrapper">
 <div style="position:absolute; top:240px; left:500px;">
  <img src="../wp-content/plugins/24liveblog/images/uy_loading.gif" />
 </div>
</div>
<?php
define('U24LIVEBLOG_SOURCE','../wp-content/plugins/24liveblog');

wp_enqueue_script('jquery');
?>
<script>
jQuery(document).ready(function($) { 

		var source_src = '<?php echo U24LIVEBLOG_SOURCE;?>';
	
		$(".innerContainer").remove();
		$(".contentWrapper").load(source_src+"/u24liveblog_setting.php"); 
	}
	);
</script>
