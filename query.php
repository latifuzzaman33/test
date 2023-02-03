<?php 
/*
custom post query with pagination and generate a div every three loop
*/
get_header();
This is Whole 
?>
			
			<section class="TeamOverall">
				<div class="container"> 
					<div class="contact-text"> 
						<h3>our people</h3>
					</div>
				</div>
			</section>
			
			
	
			<section class="aboutArea"> 
				<div class="container"> 						
					<div class="accordionSection">
					
						<div class="accordon-item"> 
						
						
								<?php 
								  $temp = $wp_query; 
								  $wp_query = null; 
								  
								  $wp_query = new WP_Query(array(
								  'post_type'=>'team',
								  'posts_per_page'=>-1,
								  'paged'=>$paged
								  
								  )); 
								  $count = 2; //if here is value 2 next value is 2+1 = 3;
								 
								  while ($wp_query->have_posts()) : $wp_query->the_post(); 
								   $count ++;
								?>
					
								<?php if( $count % 3 == 0){echo'</div><div class="rowwwww">';}?>
								<div class="accordon ">
								
							
								<div class="accordon-img "> 
								<?php the_post_thumbnail('team-img',array('class'=>'img-responsive','alt'=>''));?>
									<h3><?php the_title();?></h3>
									<span>Global Chief Operating Officer</span>
								</div>
								
								<div class="accordon-content "> 
									<div class="accordon-header"> 
										<h3>Henry Tajer</h3>
									</div>
									<div class="accordon-subtitle"> 
										<div class="accordon-subtitle-1"> 
											<span>Global Chief Operating Officer</span>
										</div>
										<div class="accordon-social-links"> 
											<a href="#"><i class="fa fa-facebook"></i></a>
											<a href="#"><i class="fa fa-twitter"></i></a>
											<a href="#"><i class="fa fa-linkedin"></i></a>
										</div>
									</div>
									<div class="accordon-paragraph"> 
										<?php the_content();?>
									</div>
								</div>
								
							</div>                       
					 
					 
							<?php endwhile; ?>
					 
			
						
						
						
						</div>
						
						<div class="team-pagination">
							<?php
									the_posts_pagination( array(
										'prev_text'          => __( 'Previous page', 'twentysixteen' ),
										'next_text'          => __( 'Next page', 'twentysixteen' ),
									) );

							?>
						
						</div>
					<?php 
					  $wp_query = null; 
					  $wp_query = $temp;  // Reset
					?>
					</div>
				</div>
				
				
					
			</section>
			
			<?php get_footer();?>
