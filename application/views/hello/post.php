<div id="content">
	<div>
		<?=html_escape($post->postID);?>
	</div>
	<div>
		<?=html_escape($post->title);?>
	</div>
	<div>
		<?=html_escape($post->post);?>
	</div>
	<div>
		<?=html_escape($post->date_added);?>
	</div>
	<div>
		<?=html_escape($post->userID);?>
	</div>
	<div>
		<?=html_escape($post->active);?>
	</div>
	<div>
		<?=anchor('hello/edit/'.$post->postID, 'Edit');?>
	</div>
</div>