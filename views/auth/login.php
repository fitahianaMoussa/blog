<div class="container mt-2">
    <h1>S'authentifier</h1>
    <form action="<?= SCRIPTs ?>../login" method="post">
        <div class="form-group mb-2">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" class="form-control" id="username">
        </div>
        <div class="form-group mb-2">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>

        <button class="btn btn-primary" type="submit">Se connecter</button>
    </form>
</div>