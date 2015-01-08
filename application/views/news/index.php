<div id="content">
<?php

$tpl = "<h2>%s</h2>
        <div id='main'>%s</div>
        <p><a href='news/%s'>View article</a></p>";

foreach ($news as $news_item):
    echo sprintf($tpl, $news_item['title'], $news_item['text'], $news_item['slug']);
endforeach;?>
</div>