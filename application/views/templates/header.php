<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>CI1</title>
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="<?=base_url()?>styles/style.css" />
</head>
<br>
    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="<?=base_url()?>home">Home</a></li>
                <li><a href="<?=base_url()?>about">About</a></li>
                <li><a href="<?=base_url()?>hello">Hello</a></li>
                <li><a href="<?=base_url()?>divers">Diverse</a></li>
                <li><a href="<?=base_url()?>user">Users</a></li>
                <li><a href="<?=base_url()?>news">News</a></li>
                <li><a href="<?=base_url()?>news/create">Create</a></li>
                <li><a href="<?=base_url()?>contact">Contact</a></li>
                <li><a href="<?=base_url()?>example2/1/2/3">Example2</a></li>
                <?php if($this->session->userdata('is_logged_in')):?>
                    <li><a href="<?=base_url()?>auth/logout">Logout</a></li>
                <?php else:?>
                    <li><a href="<?=base_url()?>auth">Login</a></li>
                <?php endif;?>
              </ul>
        </div>
    </div>
<br>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-5 alert-info"><?=$this->session->flashdata('message');?></div>
    <div class="col-md-3"></div>
</div>
<?php
//6049425679 capota ion //capota mirela steve bochen 108 - 1309 West 14th Avenue, Vancouver, BC  V6H 1R2 v6hira 6047360965 //costel dibluta