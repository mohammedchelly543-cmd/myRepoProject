<?php
include '../includes/config.php';

if (!isset($_GET['id'])) {
    die("Réservation invalide");
}

$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Paiement réussi</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<style>
body {
    background: #f2f2f2;
}
.card-success {
    max-width: 420px;
    margin: 100px auto;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,.2);
}
.check {
    font-size: 60px;
    color: green;
}
</style>
</head>
<body>

<div class="card card-success text-center p-4">
    <div class="check">✔</div>
    <h3 class="mt-2">Paiement effectué</h3>
    <p class="text-muted">Votre réservation a été payée avec succès</p>

    <a href="facture_pdf.php?id=<?= $id ?>" class="btn btn-primary mt-3">
        Télécharger la facture (PDF)
    </a>

    <a href="dashboard.php" class="btn btn-outline-secondary mt-2">
        Retour
    </a>
</div>

</body>
</html>
