<style type="text/css">label{display: block;}</style>
<div id="content">
	<h2><?php echo empty($id) ? 'Add' : 'Edit';?> user</h2>
	<div id="create_user">
		<?php isset($id) ? print form_open("user/update/$id") : print form_open('user/create');

		$fname_data = [
	              'name'        => 'user_fname',
	              'id'          => 'user_fname',
	              'value'       => isset($user_fname) ? $user_fname : set_value('user_fname')
	            ];
        $lname_data = [
		          'name'        => 'user_lname',
		          'id'          => 'user_lname',
		          'value'       => isset($user_lname) ? $user_lname : set_value('user_lname')
        ];?>
	    <div class="form-group">
		    <?=form_label('First Name ', 'user_fname');
			echo form_input($fname_data);?>
		</div>
		<div class="form-group">
		    <?=form_label('Last Name ', 'user_lname');
			echo form_input($lname_data);?>
		</div>
		<div class="form-group">
			<label for="user_email">Email Address </label>
			<input type="email" name="user_email" id="user_email" value="<?=isset($user_email) ? $user_email : set_value('user_email')?>" />
		</div>
		<p>
			<?=form_submit('submit', 'Submit', 'class="btn btn-primary"');?>
		</p>
		<?=form_close();

		echo validation_errors('<p class="alert alert-info" role="alert">');?>
	</div>
</div>