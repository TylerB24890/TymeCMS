		<!-- Main content -->
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