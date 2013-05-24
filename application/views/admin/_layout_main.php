<?php $this->load->view('admin/components/page_head'); ?>
<body>

    <div class="navbar navbar-static-top navbar-inverse">
	    <div class="navbar-inner">
            <div class='container'>
		    <a class="brand" href="<?php echo site_url('admin/dashboard'); ?>"><?php echo $meta_title; ?></a>
		    <ul class="nav admin-nav">
			    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Dashboard</a></li>
			    <li><?php echo anchor('admin/page', 'Pages'); ?></li>
			    <li><?php echo anchor('admin/page/order', 'Order Pages'); ?></li>
			    <li><?php echo anchor('admin/article', 'Blog Posts'); ?></li>
			    <li><?php echo anchor('admin/user', 'Users'); ?></li>    
                <li><a href='<?php echo site_url(); ?>'>Site Home</a></li>
		    </ul>
            </div>
	    </div>
    </div>

	<div class="container">
        
		<div class="row">
            
			<!-- Main column -->
			<div class="span9">
                <?php $this->load->view($subview); ?>
			</div>
            
			<!-- Sidebar -->
			<div class="span3 admin-sidebar">
				<section>
					<?php echo mailto('tylerb.media@gmail.com', '<i class="icon-user"></i> tylerb.media@gmail.com'); ?><br>
					<?php echo anchor('admin/user/logout', '<i class="icon-off"></i> logout'); ?>
				</section>
			</div>
            
		</div>
        
	</div>

<?php $this->load->view('admin/components/page_tail'); ?>