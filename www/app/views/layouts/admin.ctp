<?php echo $html->docType(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('Uamuzi Bora | '); ?>
		<?php echo $title_for_layout; ?>
	</title>

	<?php
		echo $html->meta('icon');
		// Set up which CSS files we're calling for our layout
		// We're not including print.css from Blueprint in this array as we want it to override the others if media=print
		$css = array('ub1', 'blueprint/screen', 'blueprint/plugins/tabs/screen', 'blueprint/plugins/buttons/screen');
		// Echo our print.css first so it takes precedence if media=print
		echo $html->css('blueprint/print', 'stylesheet', 'media="print"');
		// Echo our array of CSS sheets we set up above
		echo $html->css($css, 'stylesheet', 'media="screen, projection"');
		//echo $html->css('cake.generic');
		echo $javascript->link('prototype');
		echo $scripts_for_layout;
	?>
		


</head>
<body>
	<div id="container">
		<!-- Header -->
		<div id="headerbar" class="span-24 last">
			<!-- Title -->
			<div class="text-left prepend-1 span-7 append-8 headerbar" onclick="location.href='/';" style="cursor: pointer;">
				<h1 class="hide">Uamuzi Bora</h1>
			</div>
			<!-- User box -->
			<div  id="userbox" class="prepend-16 span-8 last"></div>
			
			<div class="breadcrumb span-24 last">
			
			</div>
		</div>
		<!-- Spinner is used for AJAX index views -->
		<div id="spinner" class="spinning">
			<?php echo $html->image('spinner.gif'); ?>
		</div>
		<!-- Content -->
		<div id="content" class="prepend-1 prepend-top span-22 append-1">
			<div class="prepend-3 span-16 append-3 last">
				<?php $session->flash(); ?>
				<?php $session->flash('auth'); ?>
			</div>
			<?php echo $content_for_layout; ?>

		</div>
		<!-- Footer -->
		<div id="footer" class="prepend-top prepend-1 span-22 append-1 last">
		<hr/>
			<p>&copy; 2010 The Uamuzi Bora Project. 	
					<?php if($session->check('Auth.User.id'))
					{
						
						echo $html->link('Logout', array('controller' => 'Users', 'action' => 'logout'));
					}
					?>
			</p>
				</div>
		</div>
	</div>
	<!-- Debug Stuff - REMEMBER TO REMOVE BEFORE DEPLOYING!!! -->
	<?php echo $cakeDebug; ?>
</body>
</html>
