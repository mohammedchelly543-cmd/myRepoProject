
<?php 
include '../includes/header.php'; 
include '../includes/config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM clients WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['client'] = $user;
        header("Location: reservation.php");
        exit;
    } else {
        $message = '<div class="alert alert-danger">Email ou mot de passe incorrect !</div>';
    }
}
?>

<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card p-4 shadow">
            <h3 class="text-center mb-4">Connexion Client</h3>
            <?= $message ?>
            <form method="POST">
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg w-100">Se connecter</button>
            </form>
            <p class="text-center mt-3">Pas de compte ? <a href="register.php">S'inscrire</a></p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>