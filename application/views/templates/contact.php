    	<!-- Main content -->
 		<div class="span9">
 			<article>
 				<h2><?php echo e($page->title); ?></h2>
 				
                <div class="contact-container">
                    <?php echo form_open();?>

                    <div class='form-input'>                    
                        <label>Full Name</label>

                        <?php echo form_input('name'); ?> <?php echo form_error('name'); ?>
                    </div>

                    <div class='form-input'>                    
                        <label>Email</label>

                        <?php echo form_input('email'); ?> <?php echo form_error('email'); ?>
                    </div>

                    <div class='form-input'>                  
                        <label>Subject</label>

                        <?php echo form_input('subject'); ?> <?php echo form_error('subject'); ?>
                    </div>   

                    <div class='form-input'>                    
                        <label>Message</label>

                        <?php echo form_textarea('message'); ?> <?php echo form_error('message'); ?>
                    </div>

                    <div class='form-input'>
                        <?php echo form_submit('submit', 'Send', 'class="btn btn-primary"'); ?>
                    </div>

                    <?php echo form_close();?>
                </div>
                
                <div class='contact-content'>
                    <?php echo $page->body; ?>
                </div>
                
 			</article>
           
 		</div>
 		
 		<!-- Sidebar -->
 		<div class="span3 sidebar">
 			<h2>Recent Posts</h2>
            <?php $this->load->view('sidebar'); ?>
 		</div>