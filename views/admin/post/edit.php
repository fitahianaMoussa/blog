<div class="container mt-2">
    <h1>Modifier <?= $params['post']->title ?></h1>
    <form action="<?= SCRIPTs ?>../admin/posts/edit/<?= $params['post']->id ?>" method="post">
        <div class="form-group mb-2">
            <label for="title">Titre de l'article</label>
            <input type="text" name="title" class="form-control" id="title" value="<?= $params['post']->title ?>">
        </div>
        <div class="form-group mb-2">
            <label for="content">Contenu de l'article</label>
            <textarea   class="form-control" name="content" id="content"><?= $params['post']->content ?></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="tags">Tags de l'article</label>
            <select multiple class="form-control" name="tags[]" id="tags">
                <?php foreach($params['tags'] as $tag): ?>
                    <option value="<?= $tag->id ?>"
                        <?php foreach($params['post']->getTags() as $postTag){
                            echo ($tag->id === $postTag->id) ? 'selected' : '';
                        }
                        ?>
                    ><?= $tag->name ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <button class="btn btn-warning" type="submit">Modifier</button>
    </form>
</div>