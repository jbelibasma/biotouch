<h1>Administration des articles</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
            <th scope="col">created_at</th>
            <th scope="col">modifier</th>
            <th scope="col">supprimer</th>

        </tr>
    </thead>
    <tbody>
            <?php foreach($params['posts'] as $post):?>
                    <tr>
                        <td><?=$post->id;?></td>
                        <td><?=$post->title;?></td>
                        <td><?=$post->content;?></td>
                        <td><?=$post->getCreatedAt();?></td>
  

                        <td><a href="/test-oop/admin/posts/edit/<?=$post->id;?>">modifier</a></td> 
                  

                        <form action="/test-oop/admin/posts/delete/<?=$post->id;?>" method="POST">

                            <td><input type="submit" value="supprimer"></td> 
                        </form>  
                    </tr>
               
            <?php endforeach ?>
    </tbody>
</table>
