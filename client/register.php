<?php 
include '../includes/header.php'; 
include '../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $cin = $_POST['cin'];
    $telephone = $_POST['telephone'];

    try {
        $stmt = $pdo->prepare("INSERT INTO clients (nom, email, password, cin, telephone) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nom, $email, $password, $cin, $telephone]);
        echo '<div class="alert alert-success text-center">Inscription réussie ! <a href="login.php">Connectez-vous ici</a></div>';
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger text-center">Erreur : Email déjà utilisé ou données invalides.</div>';
    }
}
?>

<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card p-4 shadow">
            <h3 class="text-center mb-4">Inscription Client</h3>
            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="nom" class="form-control" placeholder="Nom complet" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="cin" class="form-control" placeholder="CIN (8 chiffres)" maxlength="8">
                </div>
                <div class="mb-3">
                    <input type="text" name="telephone" class="form-control" placeholder="Téléphone" required>
                </div>
                <button type="submit" class="btn btn-success btn-lg w-100">S'inscrire</button>
            </form>
            <p class="text-center mt-3">Déjà un compte ? <a href="login.php">Se connecter</a></p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>