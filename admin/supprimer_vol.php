<?php 
include '../includes/config.php';
if (!isset($_SESSION['admin'])) exit;

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM vols WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}
header("Location: dashboard.php");
?>