<div id="content">
	<?php
	echo form_open('helpers/form_submit');
	echo validation_errors('<p>', '</p>');?>
	<p>
		Username: <?=form_input('username', set_value('username'));?>
	</p>
	<p>
		Password: <?=form_input('password');?>
	</p>
	<p>
		<?=form_submit('submit', 'Create Account');?>
	</p>
	<?=form_close();?>
</div>