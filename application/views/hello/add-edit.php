<div id="content">
	<h3>Add-edit post</h3>
	<?=validation_errors();
	
		isset($post->postID) ? print form_open("hello/edit/$post->postID") : print form_open('hello/new_post');
		$data_title = [
				'name' => 'title',
				'size' => 30,
				'style'=> 'border:1px solid black',
				'id' => 'title',
				'value' => isset($post->title) ? $post->title : set_value('title')];
		$data_post = [
				'name' => 'post',
				'colls' => 20,
				'rows' => 10,
				'value' => isset($post->post) ? $post->post : set_value('post')];?>
	<p>
		<?=form_label('Title:', 'title');?>	
		<?=form_input($data_title);?>
	</p>
	<p>
		<?=form_label('Description:', 'post');?>
		<?=form_textarea($data_post);?>
	</p>
	<p>
		<?=form_submit('submit', 'Save', 'class="btn btn-primary"');?>
	</p>
	<?=form_close();?>
</div>