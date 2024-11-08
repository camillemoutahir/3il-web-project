<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
?>

<section id="admin-dashboard">
    <h2>Gestion du contenu</h2>
    <div class="admin-section">
        <h3>Modifier les descriptions des bijoux</h3>
        <p>Gérez les descriptions des produits affichés sur le site.</p>
        <a href="?controller=administration&action=adminManageDescriptionRoute" class="admin-button">Gérer les descriptions</a>
    </div>

    <div class="admin-section">
        <h3>Modifier les informations de contact</h3>
        <p>Gérez les informations de contact de Jewels Company.</p>
        <a href="?controller=administration&action=adminManageContactRoute" class="admin-button">Gérer les informations de contact</a>
    </div>
</section>


