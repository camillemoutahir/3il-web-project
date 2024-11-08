<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'password') {
        $_SESSION['loggedin'] = true;
        header('Location: ?controller=administration&action=administrationDashboardRoute');
        exit();
    } else {
        $error_message = "Identifiants incorrects.";
    }
}
?>

<section class="admin-section">
    <h2>Connexion</h2>
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Login :</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Se connecter</button>
    </form>
</section>
