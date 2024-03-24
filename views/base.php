<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon super site</title>
    <link rel="stylesheet" href="<?= SCRIPTs . 'css' . DIRECTORY_SEPARATOR .'bootstrap.min.css' ?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Mon Super Site</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/myapp/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/myapp/posts">Les dernieres posts</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if(isset($_SESSION['auth'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= SCRIPTs ?>../logout">Se deconnecter</a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>

    <?= $content ?>
    
    <script src="<?= SCRIPTs . 'js' . DIRECTORY_SEPARATOR .'bootstrap.bundle.min.js' ?>"></script>
    <script src="<?= SCRIPTs . 'js' . DIRECTORY_SEPARATOR .'bootstrap.min.js' ?>"></script>
</body>
</html>
