<div id="stepTwoWrapper" style="margin-left:-20px; margin-top:2px;"></div>
<?php
$adminUrl = '//adminwp.24liveblog.com'; 
?>
<iframe id="liveblog-remote-window" src="<?php echo $adminUrl;?>" style="width:100%;"></iframe>

<script>
jQuery(function(){
var $ = jQuery,
	iframe = $('#liveblog-remote-window'),
	resetIframeHeight = function(){
		iframe.height($(window).height() - iframe.offset().top - 30);
	};
resetIframeHeight();
$(window).resize(resetIframeHeight);
});
</script>