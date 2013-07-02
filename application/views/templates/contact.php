    	<!-- Main content -->
	<div class='row'>
 		<div class="span12">
 			<article>
 				<h2><?php echo e($page->title); ?></h2>
 				
                <div class="contact-container">
                    <?php echo form_open();?>

                    <div class='form-input'>                    
                        <label>Full Name</label>

                        <?php echo form_input(array('name' => 'name', 'placeholder' => 'Please enter your full name')); ?> <?php echo form_error('name'); ?>
                    </div>

                    <div class='form-input'>                    
                        <label>Email</label>

                        <?php echo form_input(array('name' => 'email', 'placeholder' => 'Please enter your email address')); ?> <?php echo form_error('email'); ?>
                    </div>

                    <div class='form-input'>                  
                        <label>Subject</label>

                        <?php echo form_input(array('name' => 'subject', 'placeholder' => 'Please enter a subject')); ?> <?php echo form_error('subject'); ?>
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
	</div>
