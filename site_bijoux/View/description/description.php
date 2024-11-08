<section id="descriptions">
    <h2>Nos Bijoux</h2>
    <button onclick="window.location.href='index.php?controller=contact&action=contactRoute'">
        Interessé par un bijou ? Contactez-nous !
    </button>

    <form class = "description-form" method="GET" action="index.php">
        <input type="hidden" name="controller" value="description">
        <input type="hidden" name="action" value="descriptionRoute">

        <?php
        // Arrondir le prix min (à l'inférieur) et max (au supérieur)
        $rounded_min_price = floor($min_price);
        $rounded_max_price = ceil($max_price);

        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $price_min = isset($_GET['price_min']) ? (float) $_GET['price_min'] : $rounded_min_price;
        $price_max = isset($_GET['price_max']) ? (float) $_GET['price_max'] : $rounded_max_price;
        ?>

        <label for="jewels-select">Choisir le type de bijoux:</label>
        <select name="category" id="jewels-select">
            <option value="" <?= $category === '' ? 'selected' : '' ?>>--Tous les bijoux--</option>
            <option value="bague" <?= $category === 'bague' ? 'selected' : '' ?>>bague</option>
            <option value="boucles d'oreilles" <?= $category === 'boucles d\'oreilles' ? 'selected' : '' ?>>boucles d'oreilles</option>
            <option value="collier" <?= $category === 'collier' ? 'selected' : '' ?>>collier</option>
            <option value="bracelet" <?= $category === 'bracelet' ? 'selected' : '' ?>>bracelet</option>
        </select>

        <label for="price-min">Prix Min:</label>
        <input type="number" name="price_min" id="price-min" min="0" value="<?= $price_min ?>">

        <label for="price-max">Prix Max:</label>
        <input type="number" name="price_max" id="price-max" min="0" value="<?= $price_max ?>">

        <button type="submit">Filtrer</button>
    </form>

    <div class="jewelry-gallery">
        <?php if (!empty($descriptions)) : ?>
            <?php foreach ($descriptions as $description) : ?>
                <div class="jewelry-item">
                    <img src="img/<?= htmlspecialchars($description->getImageUrl()) ?>" alt="Image du Bijou">
                    <div class="jewelry-description">
                        <p><?= htmlspecialchars($description->getDescriptionText()) ?></p>
                        <p>Prix : <?= htmlspecialchars($description->getPrix()) ?> €</p>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Aucun bijou trouvé pour les critères sélectionnés.</p>
        <?php endif; ?>
    </div>
</section>
