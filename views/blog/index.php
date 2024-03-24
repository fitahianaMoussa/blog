<div class="container mt-2">
    <h1>Les derniers articles</h1>

    <?php foreach ($params['posts'] as $post): ?>
        
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title"><?= $post->title ?></h2>
                <div>
                    <?php foreach ($post->getTags() as $tag): ?>
                        <span class="badge bg-success">
                            <a class="text-white" href="<?= SCRIPTs ?>../tags/<?= $tag->id ?>"><?= $tag->name ?></a>
                        </span>
                    <?php endforeach ?>
                </div>
                <small class="badge badge-primary text-muted">Publié le <?= $post->getCreatedAt() ?></small>
                <p class="card-text"><?= $post->getExcerpt() ?></p>
                <?= $post->getButton() ?>
            </div>
        </div>

    <?php endforeach ?>
</div>
