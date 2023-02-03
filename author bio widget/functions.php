<?php

class author_bio_widget extends WP_Widget{
	
	public function __construct(){
		
		parent:: __construct('author_bio_widget','author bio',array('description'=>'author bio widget here'));
	}
	
	
	
	public function widget($args,$instance){
		
		$title = $instance['title'];
		
	$description = $instance['description'];
	
	$author_bio_bg = $instance['author_bio_bg'];
	$author_bio_bghhhh = $instance['author_bio_bghhhh'];
	$facebook = $instance['facebook'];
	
	
	
	
	$content = $args['before_title'].esc_attr($title).$args['after_title'];
	
	
	$content ='
	
						<div class="author bg">
						 
							<img class="img-responsive" src="'.$author_bio_bg.'">
							
							<div class="author-body text-center">
								<div class="author-img">
								
									<img src="'.$author_bio_bghhhh.'">
									
									
								</div>
								<div class="author-bio">
									<h3>'.$title.'</h3>
									<p>'.$description.'</p>
								</div>
							</div>
							
							
						</div>
						
						
						
                        <div class="social-profiles">Join me: 
						
							<a href="'.$facebook.'" target="_blank">
								<i class="fa fa-facebook"></i>
							</a> 
							<a href="http://twitter.com" target="_blank">
								<i class="fa fa-twitter"></i>
							</a> 
							<a href="http://plus.google.com" target="_blank">
								<i class="fa fa-google-plus"></i>
							</a> 
							<a href="http://pinterest.com" target="_blank">
								<i class="fa fa-pinterest"></i>
							</a> 
							
						
						</div>  
	
	';
	
	
	
	echo $args['before_widget'].$content.$args['after_widget'];
	
	
}
	
	
	public function form($instance){
		
		$title =$instance['title'];
		
		$description = $instance['description']; 
		$author_bio_bg = $instance['author_bio_bg'];
		$author_bio_bghhhh = $instance['author_bio_bghhhh'];
		$facebook = $instance['facebook'];
		
		
	
	?>
	
	<div> 
	<p> 
		<label for="<?php echo $this-> get_field_id('title');?>">Title</label>
		</p>
		<input type="text" id="<?php echo $this-> get_field_id('title');?>" value="<?php echo esc_attr($title) ;?>" name="<?php echo $this-> get_field_name('title');?>" class="widefat"/>
	</div>
	
	
	
	<div> 
		<p>
			<label for="<?php echo $this-> get_field_id('description');?>">Description</label>
		</p>
		
		<textarea class="widefat text " name="<?php echo $this-> get_field_name('description');?>" id="<?php echo $this-> get_field_id('description');?>"  > <?php echo esc_attr($description) ;?> </textarea>
		
		
	</div>
	
	
	
	<div class="widget_field"> 
		<p> 
			<label for="<?php echo $this->get_field_id('author_bio_bg');?>">background image</label>
		</p>
		<p> 
		<button class="button button-secondary"  id="upload_button" >Upload</button>
		</p>
		<input type="hidden" id="<?php echo $this->get_field_id('author_bio_bg');?>" name="<?php echo $this->get_field_name('author_bio_bg');?>" value="<?php echo $author_bio_bg; ?>" class=" upload_img " />
		
		<div class="image_show">
			<img src="<?php echo $author_bio_bg; ?>" alt=""  width="300px" height="auto" />
		</div>
		
		
	</div>
	
	
	
	<div class="widget_fieldddd"> 
		<p>
			<label for="<?php echo $this->get_field_id('author_bio_bghhhh');?>">profile photo</label>
		</p>
		<p> 
			<button class="button button-secondary"  id="upload_button_id" >Upload</button>
		</p>
		<input type="hidden" id="<?php echo $this->get_field_id('author_bio_bghhhh');?>" name="<?php echo $this->get_field_name('author_bio_bghhhh');?>" value="<?php echo $author_bio_bghhhh; ?>" class=" upload_imggggg " />
		
		<div class="image_showwww">
			<img src="<?php echo $author_bio_bghhhh; ?>" alt=""  width="300px" height="auto" />
		</div>
		
		
	</div>
	
	
	
		<div> 
		<p>
			<label for="<?php echo $this-> get_field_id('facebook');?>">facrbook link</label>
		</p>
		
		
		<input type="text" id="<?php echo $this-> get_field_id('facebook');?>" value="<?php echo esc_attr($facebook) ;?>" name="<?php echo $this-> get_field_name('facebook');?>" class="widefat"/>
		
	</div>
	
	
	<?php
		
}	
	
	
	
}



 function author_bio(){
	 
	register_widget('author_bio_widget'); 
 }
 add_action('widgets_init','author_bio');
 
 
 
 function admin_enque(){
	 
	
	wp_enqueue_media();
	
	
	
	wp_enqueue_script( 'blog-uploadimg', get_template_directory_uri() . '/js/uploadimg.js', array('jquery'));
	
	
	
 }
 
 add_action('admin_enqueue_scripts','admin_enque');
 
 
 
 
 
 
 class blog_theme_recent_post_widget extends WP_Widget{
	
	public function __construct(){
		
		parent:: __construct('blog_theme_recent_post_widget','blog recent post',array('description'=>'blog recent post here'));
	}
	
	public function widget($args,$instance){
		$title = $instance['title'];
		
		
			$content = $args['before_title'].esc_attr($title).$args['after_title'];
			
			$args = array(
			'post_type'=>'post',
			'posts_per_page'=>7,
			'orderby'=>'name',
			'order'=>'ASC',
			
			
			);
			$q = new WP_Query($args);
			
			ob_start();
			?>
			
				<?php if($q->have_posts()) : ?>
				<?php while ($q->have_posts()) :$q->the_post(); ?>	
				
				

						<div class="single-wid-post">
                            <a href="<?php the_permalink();?>">
							
							
							
							
							<?php if(has_post_thumbnail()):?>
							
							<?php the_Post_thumbnail('recent-post',array('class'=>'alignleft'));?>
							<?php else:?>
							<img src="http://placehold.it/100x100" alt="" class="alignleft" />
							
							<?php endif;?>
								
                                <h2><?php the_title(); ?></h2>
                            </a>
                            <p><i class="fa fa-clock-o"></i> <?php the_time('jM, Y');?></p>
                        </div>
							   

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

				<?php else : ?>
					<h3><?php _e('404 Error&#58; Not Found', 'bilanti'); ?></h3>
				<?php endif; ?>
			
                       
						
			
			
			<?php
			
			$content .= ob_get_clean();
			
			
			
				echo $args['before_widget'].$content.$args['after_widget'];
		
		
	}
	
	
	public function form($instance){
		
	$title = $instance['title'];

		
		
		?>
		
		<div> 
		<p> 
		<label for="<?php echo $this-> get_field_id('title');?>">Title</label>
		</p>
		<input type="text" id="<?php echo $this-> get_field_id('title');?>" value="<?php echo $title ;?>" name="<?php echo $this-> get_field_name('title');?>" class="widefat"/>
	</div>
	
	
<?php
		
		
	}
	
	
	
	
	
	
	
 
 } 
 
 
 
 
 function blog_theme_register(){
	 
	register_widget('blog_theme_recent_post_widget'); 
 }
 add_action('widgets_init','blog_theme_register');
 
 