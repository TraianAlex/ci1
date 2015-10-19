<style type="text/css">
	label{display: block;}
</style>
<div id="content">
	<table>
		<tr>
		  <td>ID</td>
		  <td>Name</td>
		  <td>Email</td>
		</tr>
		<?php if(isset($users) && !empty($users)):
				foreach ($users as $user): ?>
		<tr>
		  <td><?=$user->id ?></td>
		  <td><?=$user->user_fname . " " . $user->user_lname; ?></td>
		  <td><?=$user->user_email; ?></td>
		  <td><?=anchor("user/update/$user->id", "Edit");?></td>
		  <td><?=anchor("user/delete/$user->id", 'Delete', [
			'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?')"]);?></td>
		</tr>
		<?php endforeach;?>
		<?php else:?>
			<h2>No users were found</h2>
		<?php endif; ?>
		<tr><td><?=anchor("user/create", "Add new user");?></td></tr>
	</table>
	<?="<pre>";
	print_r ($this->session->all_userdata());
	echo "</pre>";?>
</div>