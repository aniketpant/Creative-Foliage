    <?php global $foliage_options; $foliage_settings = get_option( 'foliage_options', $foliage_options ); ?>
    <div id="image1" class="bg-image"></div>
    <div id="image2" class="bg-image"></div>
    <footer id="footer" class="grid_12">
	<?php 
		echo ('Creative Foliage by <a href="http://aniketpant.com">Aniket Pant</a>. Powered by <a href="http://wordpress.org">Wordpress</a>');
	?>
	</p>
	</footer> <!-- end footer -->
    
    <div class="clear"></div>

</div> <!-- end wrapper -->
	<?php if ($foliage_settings['back_to_top'] == 1) { ?>
	<?php } ?>
	<?php wp_footer(); ?>
</body>
</html>
