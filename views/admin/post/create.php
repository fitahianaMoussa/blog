<div class="container mt-2">
    <h1>Ajouter un article</h1>
    <form action="<?= SCRIPTs ?>../admin/posts/create" method="post">
        <div class="form-group mb-2">
            <label for="title">Titre de l'article</label>
            <input type="text" name="title" class="form-control" id="title">
        </div>
        <div class="form-group mb-2">
            <label for="content">Contenu de l'article</label>
            <textarea   class="form-control" name="content" id="content"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="tags">Tags de l'article</label>
            <select multiple class="form-control" name="tags[]" id="tags">
                <?php foreach($params['tags'] as $tag): ?>
                    <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <button class="btn btn-primary" type="submit">Créer un article</button>
    </form>
</div>