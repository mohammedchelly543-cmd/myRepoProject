<?php 
include '../includes/header.php'; 
include '../includes/config.php';

if (!isset($_SESSION['client'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    die("Vol non sélectionné.");
}

$stmt = $pdo->prepare("SELECT * FROM vols WHERE id = ?");
$stmt->execute([$_GET['id']]);
$vol = $stmt->fetch();

if (!$vol) {
    die("Vol introuvable.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO reservations (client_id, vol_id) VALUES (?, ?)");
    $stmt->execute([$_SESSION['client']['id'], $vol['id']]);
    $reservation_id = $pdo->lastInsertId();
    header("Location: facture_pdf.php?id=$reservation_id");
    exit;
}
?>

<div class="row justify-content-center mt-5">
    <div class="col-md-7">
        <div class="card p-5 shadow">
            <h4 class="text-center mb-4">Paiement par Carte Bancaire (Simulation)</h4>
            <div class="text-center mb-4 p-3 bg-light rounded">
                <h5>Vol : <strong><?= $vol['numero_vol'] ?></strong></h5>
                <p><?= $vol['depart'] ?> → <?= $vol['arrivee'] ?> | <?= date('d/m/Y', strtotime($vol['date_depart'])) ?> à <?= substr($vol['heure_depart'], 0, 5) ?></p>
                <h3 class="text-success">Prix Total : <?= $vol['prix'] ?> DT</h3>
            </div>

            <form method="POST">
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Nom sur la carte" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Numéro de carte (ex: 1234 5678 9012 3456)" required>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control mb-3" placeholder="MM/AA" required>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control mb-3" placeholder="CVV (3 chiffres)" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-lg w-100">Payer <?= $vol['prix'] ?> DT</button>
            </form>
            <small class="text-muted text-center d-block mt-3">Paiement sécurisé - Simulation uniquement</small>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>