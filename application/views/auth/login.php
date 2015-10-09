<style type="text/css">label{display: block;}</style>
<div id="content" class="container page-content">
	<?=validation_errors('<p class="alert alert-info" role="alert">');?>
	<?=form_open('auth/login_validation');?>
	<div class="row">
		<div class="col-md-3"></div>
        <div class="col-md-6">
        	<legend>Login</legend>
			<div class="form-group">
				<label for="">Email</label>
				<?php $atr = ['name' => 'email', 'class' => 'form_control', 'placeholder' => 'Email'];
				echo form_input($atr);?>
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<?php $atr = ['name' => 'password', 'class' => 'form_control', 'placeholder' => 'Password'];
				echo form_password($atr);?>
			</div>
			<?=form_submit('login_submit', 'Login', 'class="btn btn-primary"');?>
			or <?=anchor("auth/signup", "Register", 'class="btn btn-default"');
			echo form_close();?>
		</div>
        <div class="col-md-3"></div>
	</div>
</div>