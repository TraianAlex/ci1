<?php

$tpl = '<h2>%s</h2>
            %s
        <br><br><a href="javascript:history.go(-1);">Back</a>';

echo sprintf($tpl, $news_item['title'], $news_item['text']);

