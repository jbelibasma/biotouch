<h1>article </h1>

<?php foreach($params['articles'] as $produit):?>
    <span><?=$produit->title?></span>
    <div>
        <?php foreach($produit->getTages() as $tag):?>
            <span>  <?=$tag->category ?></span>
        <?php endforeach ?>
    </div> 
    <br>  
    <span><?=$produit->getCreatedAt() ?></span>
    <br>    
    <span><?=$produit->getExcerpt() ?></span><br>
    <?=$produit->getButton() ?>
    <!-- <a href="site-oop/detail/<?=$produit->id ?>">detail</a> -->
<?php endforeach ?>
 