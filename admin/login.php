<?php include '../includes/header.php'; include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['email'] == 'admin@oaca.tn' && $_POST['password'] == 'admin123') {
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        echo '<div class="alert alert-danger">Identifiants incorrects</div>';
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card p-4">
            <h3 class="text-center text-danger mb-4">Connexion Admin</h3>
            <form method="POST">
                <input type="email" name="email" class="form-control mb-3" value="admin@oaca.tn" required>
                <input type="password" name="password" class="form-control mb-4" placeholder="Mot de passe" required>
                <button type="submit" class="btn btn-danger w-100">Connexion</button>
            </form>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>