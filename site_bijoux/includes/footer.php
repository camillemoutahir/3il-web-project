<footer>
    <p>Contact : 
        <?php
        require_once File::build_path(array("Model", "ModelContact.php"));

        $contactInfo = ModelContact::getContactInfo();

        if ($contactInfo) {
            echo htmlspecialchars($contactInfo['nom']) . " | " . htmlspecialchars($contactInfo['email']);
        } else {
            echo "Informations de contact non disponibles.";
        }
        ?>
    </p>
    <p>
    <a href="?controller=administration&action=administrationLoginRoute">Connexion vers l'espace administrateur</a>
    </p>

</footer>
