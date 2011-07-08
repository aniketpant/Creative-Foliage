    <?php global $foliage_options; $foliage_settings = get_option( 'foliage_options', $foliage_options ); ?>
    <footer id="footer" class="grid_12">
	<?php 
		echo ('Copyright &copy; <a href="">Aniket Pant</a> 2011');
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
