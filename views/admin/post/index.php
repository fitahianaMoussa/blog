<div class="container">
    <?php if (isset($_GET['success'])) :?>
        <div class="alert alert-success">
            Vous etes connecté!
        </div>
    <?php endif ?>
    <h1 class="mt-2">Administration des articles</h1>
        <a href="<?= SCRIPTs ?>../admin/posts/create" class="btn btn-primary my-3">Ajouter un article</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Publié le</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($params['posts'] as $post) : ?>
                <tr>
                    <td scope='row'><?= $post->id ?></td>
                    <td><?= $post->title ?></td>
                    <td><?= $post->getCreatedAt() ?></td>
                    <td>
                        <a href="<?= SCRIPTs ?>../admin/posts/edit/<?= $post->id ?>" class="btn btn-warning">Modifier</a>
                        <a href="<?= SCRIPTs ?>../admin/posts/delete/<?= $post->id ?>" class="btn btn-danger" onclick="return confirmDelete()">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<script>
    function confirmDelete() {
        return confirm("Êtes-vous sûr de vouloir supprimer cet article ?");
    }
</script>
