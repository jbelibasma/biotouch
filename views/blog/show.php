
<span><?=$params['article']->title?></span>
<span><?= $params['article']->content ?></span> 

<div>
    <?php foreach($params['article']->getTages() as $tag):?>
        <span>  <?=$tag->category ?></span>
    <?php endforeach ?>
</div>  

<br> 

<?=$params['article']->getCreatedAt() ?>
<br>  

