<?php
// filepath: c:\laragon\www\Lavalust\app\views\Login.php

$baseUrl = rtrim($_SERVER['SCRIPT_NAME'], '/');
$error = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);
?>

<h2>Login</h2>

<?php if ($error): ?>
    <p style="color: red;">
        <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
    </p>
<?php endif; ?>

<form method="POST" action="<?= htmlspecialchars($baseUrl . '/login', ENT_QUOTES, 'UTF-8') ?>">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>