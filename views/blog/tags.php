<div class="container mt-2">
    <h1><?= $params['tag']->name ?></h1>

    <?php foreach ($params['tag']->getPosts() as $post): ?>
        
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title"><a class="text-dark" href="<?= SCRIPTs ?>../posts/<?= $post->id ?>"><?= $post->title ?></a></h2>
            </div>
        </div>

    <?php endforeach ?>
</div>
