<div id="content">
	<h2>Create/Edit</h2>
	<div id="create_user">
		<?php isset($user_id) ? print form_open("user/update/$user_id") : print form_open('user/create');

		$fname_data = [
	              'name'        => 'fname',
	              'id'          => 'fname',
	              'value'       => isset($user_fname) ? $user_fname : set_value('fname')
	            ];
        $lname_data = [
		          'name'        => 'lname',
		          'id'          => 'lname',
		          'value'       => isset($user_lname) ? $user_lname : set_value('lname')
        ];?>
	    <div class="form-group">
		    <?=form_label('First Name: ', 'fname');
			echo form_input($fname_data);?>
		</div>
		<div class="form-group">
		    <?=form_label('Last Name: ', 'lname');
			echo form_input($lname_data);?>
		</div>
		<div class="form-group">
			<label for="email">Email Address: </label>
			<input type="email" name="email" id="email" value="<?=isset($user_email) ? $user_email : set_value('email')?>" />
		</div>
		<p>
			<?=form_submit('submit', 'Submit', 'class="btn btn-primary"');?>
		</p>
		<?=form_close();

		echo validation_errors('<p class="alert alert-info" role="alert">');?>
	</div>
</div>