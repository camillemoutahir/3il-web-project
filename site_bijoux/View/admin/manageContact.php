<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Vérification si le formulaire de modification a été soumis
if (isset($_POST['update_contact'])) {
    $field = $_POST['field'];
    $new_value = $_POST['new_value'];

    // Utilisation de la classe ModelContact pour mettre à jour les informations de contact
    ModelContact::updateContactInfo($field, $new_value);
}

$contact_info = ModelContact::getContactInfo();
?>

<section id="contact-management">
    <h2>Informations de Contact</h2>
    <table>
        <tr>
            <th>Champ</th>
            <th>Valeur</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Nom</td>
            <td><?php echo htmlspecialchars($contact_info['nom']); ?></td>
            <td>
                <button onclick="showEditForm('nom', '<?php echo $contact_info['nom']; ?>')">Modifier</button>
            </td>
        </tr>
            <tr>
            <td>Email</td>
            <td><?php echo htmlspecialchars($contact_info['email']); ?></td>
            <td>
                <button onclick="showEditForm('email', '<?php echo $contact_info['email']; ?>')">Modifier</button>
            </td>
        </tr>
        <tr>
            <td>Téléphone</td>
            <td><?php echo htmlspecialchars($contact_info['telephone']); ?></td>
            <td>
                <button onclick="showEditForm('telephone', '<?php echo $contact_info['telephone']; ?>')">Modifier</button>
            </td>
        </tr>
        <tr>
            <td>Adresse</td>
            <td><?php echo htmlspecialchars($contact_info['adresse']); ?></td>
            <td>
                <button onclick="showEditForm('adresse', '<?php echo $contact_info['adresse']; ?>')">Modifier</button>
            </td>
        </tr>
    </table>

    <div id="edit-form" style="display: none;">
        <h3>Modifier l'Information de Contact</h3>
        <form method="post">
            <input type="hidden" name="field" id="edit-field">
            <label for="new_value">Nouvelle valeur :</label>
            <input type="text" name="new_value" id="edit-value">
            <button type="submit" name="update_contact">Enregistrer</button>
            <button type="button" onclick="hideEditForm()">Annuler</button>
        </form>
    </div>
</section>

<script>
    function showEditForm(field, value) {
        document.getElementById('edit-form').style.display = 'block';
        document.getElementById('edit-field').value = field;
        document.getElementById('edit-value').value = value;
    }

    function hideEditForm() {
        document.getElementById('edit-form').style.display = 'none';
    }
</script>

