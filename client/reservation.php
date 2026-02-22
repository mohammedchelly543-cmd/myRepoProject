<?php 
include '../includes/header.php'; 
include '../includes/config.php';

// حماية الصفحة: إذا ما مسجلش دخول يرجع للـ login
if (!isset($_SESSION['client'])) {
    header("Location: login.php");
    exit;
}

$vols = $pdo->query("SELECT * FROM vols ORDER BY date_depart ASC")->fetchAll();
?>

<div class="card p-4 shadow mt-4">
    <h3 class="text-center mb-4">Liste des Vols Disponibles</h3>
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Numéro Vol</th>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vols as $vol): ?>
                <tr>
                    <td><strong><?= htmlspecialchars($vol['numero_vol']) ?></strong></td>
                    <td><?= htmlspecialchars($vol['depart']) ?></td>
                    <td><?= htmlspecialchars($vol['arrivee']) ?></td>
                    <td><?= date('d/m/Y', strtotime($vol['date_depart'])) ?></td>
                    <td><?= substr($vol['heure_depart'], 0, 5) ?></td>
                    <td><strong><?= $vol['prix'] ?> DT</strong></td>
                    <td>
                        <a href="paiement.php?id=<?= $vol['id'] ?>" class="btn btn-success btn-sm">
                            Réserver
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>