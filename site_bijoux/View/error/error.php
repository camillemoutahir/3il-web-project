<section id="error-section">
    <h2>Erreur - Page non trouvée</h2>
    <?php
    echo "<p>La page que vous avez demandée n'existe pas ou a été déplacée.</p>";
    ?>
    <div class="btn-container">
        <a href="index.php" class="btn">Retour à l'accueil</a>
    </div>
</section>

<section id="suggestions">
    <h2>Nos Suggestions</h2>
    <div class="suggestions-container">
        <p>Vous pourriez consulter nos autres sections :</p>
        <ul>
            <a href="?controller=description&action=descriptionRoute">Voir la collection complète de bijoux</a>
            <a href="?controller=contact&action=contactRoute">Contactez-nous</a>
        </ul>
    </div>
</section>

<script>
    window.onload = function() {
        const errorSection = document.getElementById('error-section');
        errorSection.classList.add('fade-in');
    };
</script>

