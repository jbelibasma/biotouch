<form action="/test-oop/admin/posts/edit/<?=$params['post']->id ?>" method="POST">
<h1>modifier un article </h1>
<label for="title"> titre de l'article</label>
<input type="text" name='title' id="title" value="<?=$params['post']->title ?>">
<div>
    <label for="content"> contenu de l'article</label>
    <textarea name="content" id="content" class="form-control"  rows="8"><?=$params['post']->content ?></textarea>
</div>
<input type="submit" class="btn border" value="valider">

</form>
