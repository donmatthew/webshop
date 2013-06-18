<article id="post-<?php the_ID(); ?>" <?php post_class('entry clearfix'); ?>>
	<?php 
		$index_postinfo = et_get_option('lucid_postinfo1');
		
		$thumb = '';
		$width = apply_filters('et_blog_image_width',630);
		$height = apply_filters('et_blog_image_height',210);
		$classtext = '';
		$titletext = get_the_title();
		$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Blogimage');
		$thumb = $thumbnail["thumb"];
		
		if ( $index_postinfo ){
			echo '<p class="meta-info">';
			et_postinfo_meta( $index_postinfo, et_get_option('lucid_date_format'), esc_html__('0 comments','Lucid'), esc_html__('1 comment','Lucid'), '% ' . esc_html__('comments','Lucid') );
			echo '</p>';
		}
	?>	
	
	<?php if ( 'on' == et_get_option('lucid_thumbnails_index','on') ){ ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
				<span class="overlay"></span>
			</a>	
		</div> 	<!-- end .post-thumbnail -->
	<?php } ?>
	<div class="post_content clearfix">
		<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php
			if ( 'on' == et_get_option('lucid_blog_style') ) the_content('');
			else echo '<p>' . truncate_post(170,false) . '</p>';
		?>
		<a href="<?php the_permalink(); ?>" class="more"><?php esc_html_e( 'Read More', 'Lucid' ); ?></a>
	</div> <!-- end .post_content -->
</article> <!-- end .entry -->