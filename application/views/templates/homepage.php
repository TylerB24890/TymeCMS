			<!--  Carousel -->
	 <div class='home-top'>
		 <div class='container'>
			<div id="slider-carousel" class="carousel slide">
				<div class="carousel-inner">
				
					<div class="item active">
						<a href="<?php echo site_url(); ?>">  
							<img src="<?php echo site_url('img/slider/banner03.jpg'); ?>" alt="" title="" />
						</a>
					
						<div class="carousel-caption">
							<div class='container'>
								<p>
									<h2>A Caption Heading</h2>
									<p>Caption Text</p>
								</p>
							</div>
						</div>
					
					</div>
					
					<div class="item">
						<a href="<?php echo site_url(); ?>"> 
							<img src="<?php echo site_url('img/slider/banner02.jpg'); ?>" alt="" title=""/>
						</a>
						<div class="carousel-caption">
							<div class='container'>
								<p>
									<h2>A Second Caption Heading</h2>
									<p>Caption Text</p>
								</p>
							</div>
						</div>
					</div>
					
					<div class="item">
						<a href="<?php echo site_url(); ?>"> 
							<img src="<?php echo site_url('img/slider/banner01.jpg'); ?>" alt="" title=""/>
						</a>
						<div class="carousel-caption">
							<p>
								<h2>A Third Caption Heading</h2>
								<p>Caption Text</p>
							</p>
						</div>
					</div>
					
				</div><!-- .carousel-inner -->
				
				<a class="carousel-control left" href="#slider-carousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#slider-carousel" data-slide="next">&rsaquo;</a>		  
			</div>
		</div>
	</div>

	<div class='row'>			
		<div class='span12'>
			<?php echo $page->body; ?>
		</div>
	</div>			
	
	<hr />
	
	<div class='row'>
		<div class='span9'>
			
			<?php if(isset($articles[0])) echo get_excerpt($articles[0]); ?>

			<div class="span5" style="margin-left: 0px;"><?php if(isset($articles[1])) echo get_excerpt($articles[1]); ?></div>
			<div class="span4"><?php if(isset($articles[2])) echo get_excerpt($articles[2]); ?></div>
			 		 
 			
		</div>
		 <div class="span3 sidebar">
 				<h2>Recent News</h2>
               	<?php $this->load->view('sidebars/sidebar'); ?>
 			</div>
	</div>
		
</div> <!-- .container -->