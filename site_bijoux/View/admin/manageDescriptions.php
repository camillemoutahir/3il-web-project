<?php

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ?controller=administration&action=administrationLoginRoute');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['edit_description'])) {
        // Mise à jour d'une description
        $edit_id = $_POST['edit_id'];
        $edit_description_text = $_POST['edit_description_text'];
        ModelDescription::updateDescription($edit_id, $edit_description_text);
    } elseif (isset($_POST['delete_description'])) {
        // Suppression d'une description
        $delete_id = $_POST['delete_id'];
        ModelDescription::deleteDescription($delete_id);
    } elseif (isset($_POST['insert_description'])) {
        // Insertion d'une nouvelle description
        $new_image_file = $_FILES['new_image_file']['name'];
        $new_description_text = $_POST['new_description_text'];
        $new_price = $_POST['new_price'];
        $new_category = $_POST['new_category'];

        // Sauvegarde de l'image dans le dossier approprié
        move_uploaded_file($_FILES['new_image_file']['tmp_name'], 'C:/xampp/htdocs/site_bijoux/img/' . $new_image_file); // Correction du chemin pour l'enregistrement
        
        ModelDescription::insertDescription($new_image_file, $new_description_text, $new_price, $new_category);
    }
}


$descriptions_info = ModelDescription::getAllDescriptions();
?>

<section id="descriptions-management">
    <h2>Descriptions actuelles des Bijoux</h2>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Image</th>
            <th>Nom de l'image</th>
            <th>Texte de description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($descriptions_info as $row): ?>
            <tr>
                <td>                
                    <img src="<?php echo 'http://localhost/site_bijoux/img/' . htmlspecialchars($row->getImageUrl()); ?>" alt="Bijou" width="100">
                                        
                </td>
                <td><?php echo htmlspecialchars($row->getImageUrl()); ?></td>
                <td>
                    <?php echo htmlspecialchars($row->getDescriptionText()); ?>
                    <form method="post" action="" class="edit-form" style="display:none;">
                        <input type="hidden" name="edit_id" value="<?php echo $row->getId(); ?>">
                        <input type="text" name="edit_description_text" value="<?php echo htmlspecialchars($row->getDescriptionText()); ?>" required>
                        <button type="submit" name="edit_description">Enregistrer</button>
                    </form>
                </td>
                <td>
                    <!-- Bouton pour modifier le texte de description -->
                    <button type="button" onclick="toggleEditForm(this)">Modifier</button>

                    <!-- Bouton pour supprimer l'image -->
                    <form method="post" action="" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?php echo $row->getId(); ?>">
                        <input type="hidden" name="delete_image" value="<?php echo htmlspecialchars($row->getImageUrl()); ?>">
                        <button type="submit" name="delete_description">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Ajouter une nouvelle photo de bijoux</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="new_image_file">Choisissez l'image :</label></td>
                <td><input type="file" id="new_image_file" name="new_image_file" accept="image/*" required></td>
            </tr>
            <tr>
                <td><label for="new_description_text">Texte de description :</label></td>
                <td><input type="text" id="new_description_text" name="new_description_text" required></td>
            </tr>
            <tr>
                <td><label for="new_price">Prix :</label></td>
                <td><input type="number" step="0.01" id="new_price" name="new_price" required></td>
            </tr>
            <tr>
                <td><label for="new_category">Catégorie :</label></td>
                <td>
                    <select id="new_category" name="new_category" required>
                        <option value="">Sélectionnez une catégorie</option>
                        <option value="bague">Bague</option>
                        <option value="collier">Collier</option>
                        <option value="bracelet">Bracelet</option>
                        <option value="boucles d'oreilles">Boucles d'oreilles</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="insert_description">Ajouter</button></td>
            </tr>
        </table>
    </form>
</section>

<script>
    // Fonction pour afficher/masquer le formulaire de modification
    function toggleEditForm(button) {
        const form = button.parentElement.previousElementSibling.querySelector('.edit-form');
        form.style.display = form.style.display === 'none' ? 'block' : 'none'; 
}
</script>
