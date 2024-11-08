<section id="contact" style="min-height: 74vh;">
    <h2>Nos coordonnées</h2>
    <form class = "contact-form">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($contact['nom']) ?>" readonly>

        <label for="email">Email :</label>
        <input type="text" id="email" name="email" value="<?= htmlspecialchars($contact['email']) ?>" readonly>

        <label for="telephone">Téléphone :</label>
        <input type="text" id="telephone" name="telephone" value="<?= htmlspecialchars($contact['telephone']) ?>" readonly>

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" value="<?= htmlspecialchars($contact['adresse']) ?>" readonly>
    </form>
</section>
