<style type="text/css">
	label{display: block;}
</style>
<div id="content"><?php
    $this->table->set_heading('ID', 'Title', 'Text', 'Date');
	echo $this->table->generate($posts);?>

	<h3>Add new post</h3>
	<?=validation_errors();
		echo form_open('hello/new_post');
		$data_form = [
				'name' => 'title',
				'size' => 30,
				'style'=> 'border:1px solid black',
				'id' => 'title'];?>
	<p>
		<?=form_label('Title:', 'title');?>	
		<?=form_input($data_form);?>
	</p>
	<p>
		<?=form_label('Description:', 'post');?>
		<?=form_textarea('post', '', 'colls="20" rows="10"');?>
	</p>
	<p>
		<?=form_submit('submit', 'Add Post', 'class="btn btn-primary"');?>
	</p>
	<?=form_close();?>
</div>