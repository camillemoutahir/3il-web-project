<header>
    <div class="logo-container">
        <img src="img/logo.png" alt="Logo Jewels Company" class="logo">
    </div>
    <h1>Bienvenue sur notre site de Bijoux</h1>
    <nav class="nav-container">
        <div id="burger-menu" class="burger-menu">
            <span class="burger-icon">&#9776;</span>
        </div>
        <ul class="nav-list">
            <?php if (isset($_SESSION['loggedin'])): ?>
                <a href="?controller=administration&action=administrationDashboardRoute">Tableau de bord Admin</a>
                <a href="?controller=administration&action=logout">Déconnexion</a>
            <?php else: ?>
                <a href="index.php">Accueil</a>
                <a href="?controller=description&action=descriptionRoute">Descriptions</a>
                <a href="?controller=contact&action=contactRoute">Contact</a>
                <a href="?controller=administration&action=administrationLoginRoute">Administration</a>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<script src="js/burger-menu.js"></script>