<div class="container mt-2">
    <h2><?= $params['post']->title ?></h2>
    <small class="text-muted"><?= $params['post']->created_at ?></small>
    <div>
        <?php foreach ($params['post']->getTags() as $tag): ?>
            <span class="badge bg-info"><?= $tag->name ?></span>
        <?php endforeach ?>
    </div>
    <p><?= $params['post']->content ?></p>

    <a href="/myapp/posts" class="btn btn-secondary">Retourner en arrière</a>
</div>
