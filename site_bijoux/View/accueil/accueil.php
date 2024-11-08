<section id="presentation">
    <h2>Présentation</h2>
    <?php
    $presentation = ModelPresentation::getPresentations();
    if (!empty($presentation)) {
        foreach ($presentation as $p) {
            echo "<p>" . htmlspecialchars($p->getContenu()) . "</p>";
        }
    } else {
        echo "<p>Aucune présentation disponible.</p>";
    }
    ?>
    <div class="btn-container">
        <a href="?controller=description&action=descriptionRoute" class="btn">Voir la collection complète</a>
    </div>
</section>

<section id="viewer">
    <h2>Galerie de Bijoux</h2>
    <div class="image-slider">
        <button id="prevBtn"> &#8249;</button>
        <div class="carousel-wrapper">
            <img id="slider-image" src="" alt="Image du Bijou">
        </div>
        <button id="nextBtn"> &#8250;</button>
    </div>
    <p id="slider-description"></p>
</section>
<script src="js/ajax.js"></script> 