<?php 
include '../includes/header.php'; 
include '../includes/config.php';
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }

$vols = $pdo->query("SELECT * FROM vols ORDER BY date_depart")->fetchAll();
?>

<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Bienvenue Admin</h3>
        <a href="ajouter_vol.php" class="btn btn-success">+ Ajouter Vol</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Vol</th>
                <th>Départ → Arrivée</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vols as $v): ?>
            <tr>
                <td><strong><?= $v['numero_vol'] ?></strong></td>
                <td><?= $v['depart'] ?> → <?= $v['arrivee'] ?></td>
                <td><?= date('d/m/Y', strtotime($v['date_depart'])) ?></td>
                <td><?= $v['heure_depart'] ?></td>
                <td><?= $v['prix'] ?> DT</td>
                <td>
                    <a href="supprimer_vol.php?id=<?= $v['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>