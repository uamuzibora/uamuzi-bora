<?php $crumb->addThisPage('Reports', 'reset'); ?>
<div id="viewTitle" class="text-left">
	<p><span class="welcome1">Reports</span>&nbsp;&nbsp;&nbsp;<span class="welcome2">Which report do you want to download?</span></p>

<?php echo $form->create(null, array('url' => array('controller' => 'reports', 'action' => 'download'))); ?>
	<fieldset>
 		<legend><?php __('Download report');?></legend>
	<?php
		echo $form->input('Reports',array('options'=>$reports));
		
	?>
	</fieldset>
<?php echo $form->end('Download file');?>
	<p> Please note that it can take some time to generat the report</p>


				
		
		</div>
	</div>
</div>
