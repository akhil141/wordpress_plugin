<?php
function footer_script(){
global $wpdb;
$tablename = $wpdb->prefix.'titletab';
$results = $wpdb->get_results("SELECT * FROM $tablename");
$title1 = $results[0]->title1;
$title2 = $results[0]->title2;
$filepath = plugin_dir_url( __FILE__ ).'emoticons/'.$results[0]->emoji;
if($results[0]->status==1 && !is_admin()){ ?>
<script>
jQuery(document).ready(function($){
 var timer;
 var counter = 0;
 var pageTitle = $("title").text();
 var oldfav = $('link[rel="icon"]').attr('href');
 if(oldfav === 'undefined'){
	 oldfav = '';
 }
  $(window).blur(function() {
	  //1f62b.png
	 var textArr = ['<?php echo $title1; ?>', '<?php echo $title2; ?>'];
		timer = setInterval(function() {
		document.title = textArr[counter]
		counter++;
		if (counter >= textArr.length) {
			counter = 0;
		}
    }, 2000)
	setTimeout(function(){
		$('link[rel="icon"]').attr('href', '<?php echo $filepath; ?>');
	},2000);
  }).focus(function() {
    clearInterval(timer);
    $("title").text(pageTitle);
    $('link[rel="icon"]').attr('href', oldfav);
  });
  /* Favicon */
	$(window).focus(function() {
		$('link[rel="icon"]').attr('href', oldfav);
	});
});
</script>
	<?php }
	
}
add_action('wp_footer', 'footer_script'); 
?>
