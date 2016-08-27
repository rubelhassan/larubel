<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    posts
    <?php foreach ($posts as $post) : ?>
        <li> 
            <p><?= $post->getId(); ?></p>
            <?php if($post->slug == null): ?>
                <strike><?= $post->title; ?></strike>
            <?php else: ?>
                <?= $post->title; ?> <br/>
                <a href="#"><?= $post->slug; ?></a>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</body>
</html>