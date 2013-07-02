<?php 

$this->load->view('components/page_head');


//get the current page name
$currentPage = $_SERVER["PHP_SELF"];
$parts = explode('/', $currentPage);

//page url
$page = $parts[count($parts) - 1];
?>


<body>


    <header>
		<div class="container">
			<section>

				<h1><?php echo anchor('', strtoupper(config_item('site_name'))); ?></h1>

				<div class="navbar pull-right">
					<div class="container">
						<?php echo get_menu($menu); ?>
					</div>
				</div>
			</section>
		</div>
    </header>

 
	<div class="container">
		<?php $this->load->view('templates/' . $subview); ?>
	</div>
    
	<div class='container'>
		<?php $this->load->view('components/page_tail');?>
	</div>