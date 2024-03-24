<?php

// Afficher le contenu de $_GET['url']
if(isset($_GET['url'])) {
    echo $_GET['url'];
} else {
    echo "Aucune URL passée en paramètre.";
}
