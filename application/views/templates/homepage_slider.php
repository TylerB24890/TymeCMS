		<!-- Main content -->
        <div class='span12'>
            <div class="slider-wrapper theme-default">
                <div id="slider" class="nivoSlider">
                    <img src="img/toystory.jpg" data-thumb="img/toystory.jpg" alt="" />
                         <a href="http://dev7studios.com"><img src="img/up.jpg" data-thumb="imgs/up.jpg" alt="" title="This is an example of a caption" /></a>
                    <img src="img/walle.jpg" data-thumb="img/walle.jpg" alt="" data-transition="slideInLeft" />
                    <img src="img/nemo.jpg" data-thumb="img/nemo.jpg" alt="" title="#htmlcaption" />
                </div>
                <div id="htmlcaption" class="nivo-html-caption">
                    <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. 
                 </div>
             </div>
        </div>
 		<div class="span9">            
            <div class="row">              
                <div class="span9">
                    <?php echo $page->body; ?>
                </div>
            </div>
 			<div class="row">
 				<div class="span9"><?php if(isset($articles[0])) echo get_excerpt($articles[0]); ?></div>
 			</div>
 			<div class="row">
	 			<div class="span5"><?php if(isset($articles[1])) echo get_excerpt($articles[1]); ?></div>
	 			<div class="span4"><?php if(isset($articles[2])) echo get_excerpt($articles[2]); ?></div>
	 		</div>
 		</div>
 		
 		<!-- Sidebar -->
 		<div class="span3 sidebar">
 			<h2>Recent Posts</h2>
                <?php $this->load->view('sidebar'); ?>
 		</div>