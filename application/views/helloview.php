<style type="text/css">
	label{display: block;}
</style>
<div id="content"><?php
    $this->table->set_heading('ID', 'Title', 'Text', 'Date');
	echo $this->table->generate($posts);
	$this->load->view('templates/template', 'main' => 'hello/add-edit');?>
</div>