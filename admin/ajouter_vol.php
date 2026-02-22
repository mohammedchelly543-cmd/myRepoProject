<?php 
include '../includes/header.php'; 
include '../includes/config.php';
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO vols (numero_vol, depart, arrivee, date_depart, heure_depart, prix, places) VALUES (?, 'Sfax', ?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['numero'], $_POST['arrivee'], $_POST['date'], $_POST['heure'], $_POST['prix'], $_POST['places']]);
    header("Location: dashboard.php");
}
?>

<div class="card p-4">
    <h3>Ajouter un Nouveau Vol</h3>
    <form method="POST">
        <div class="row">
            <div class="col-md-3"><input name="numero" class="form-control mb-3" placeholder="Numéro vol (ex: SF501)" required></div>
            <div class="col-md-3"><input name="arrivee" class="form-control mb-3" placeholder="Destination" required></div>
            <div class="col-md-2"><input type="date" name="date" class="form-control mb-3" required></div>
            <div class="col-md-2"><input type="time" name="heure" class="form-control mb-3" required></div>
            <div class="col-md-1"><input type="number" name="prix" class="form-control mb-3" placeholder="Prix" required></div>
            <div class="col-md-1"><input type="number" name="places" class="form-control mb-3" value="20"></div>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>