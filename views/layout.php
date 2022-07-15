<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test oop</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>">
</head>

<body>
    <nav>
        <ul class="navbar">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="/test-oop/">home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/test-oop/posts">articles</a>
            </li>
        </ul>
    </nav>
   
    <div class="container">
        <?= $content ?>
    </div>
    <!-- function content  -->
</body>

</html>