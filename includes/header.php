<?php
// تشغيل session مرة واحدة فقط

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aéroport de Sfax</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personnalisé -->
    <link href="/stage dsi oaca22/assets/css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-4" href="/stage dsi oaca22/index.php">
            Aéroport de Sfax
        </a>

        <div class="ms-auto d-flex align-items-center gap-3">

            <!-- 🔴 Espace Admin يظهر كان في الصفحة الرئيسية -->
            <?php if (basename($_SERVER['PHP_SELF']) === 'index.php'): ?>
                <a href="/stage dsi oaca22/admin/login.php"
                   class="btn btn-outline-danger btn-sm">
                    Espace Admin
                </a>
            <?php endif; ?>

            <!-- 🟢 Admin connecté -->
            <?php if (isset($_SESSION['admin'])): ?>
                <span class="text-light">Admin connecté</span>
                <a href="/stage dsi oaca22/admin/logout.php"
                   class="btn btn-outline-light btn-sm">
                    Déconnexion Admin
                </a>

            <!-- 🔵 Client connecté -->
            <?php elseif (isset($_SESSION['client'])): ?>
                <span class="text-light">
                    Bonjour <?= htmlspecialchars($_SESSION['client']['nom']) ?>
                </span>
                <a href="/stage dsi oaca22/client/logout.php"
                   class="btn btn-outline-light btn-sm">
                    Déconnexion
                </a>
            <?php endif; ?>

        </div>
    </div>
</nav>

<?php if (basename($_SERVER['PHP_SELF']) === 'index.php'): ?>
<header class="hero text-center text-white d-flex align-items-center justify-content-center min-vh-100 bg-primary">
    <div>
        <h1 class="display-3 fw-bold">Bienvenue à l'Aéroport de Sfax</h1>
        <p class="lead mb-5">Réservez votre vol facilement et rapidement</p>

        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="/stage dsi oaca22/client/login.php"
               class="btn btn-light btn-lg px-5">
                Login Client
            </a>

            <a href="/stage dsi oaca22/client/register.php"
               class="btn btn-success btn-lg px-5">
                S'inscrire
            </a>
        </div>
    </div>
</header>
<?php endif; ?>

<!-- Contenu des pages -->
<div class="container mt-5 pt-5">
