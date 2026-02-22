<?php
require_once __DIR__ . '/../includes/fpdf/fpdf.php';
include '../includes/config.php';

if (!isset($_GET['id'])) {
    die("ID réservation manquant.");
}

$id = $_GET['id'];

$stmt = $pdo->prepare("
    SELECT c.nom, c.email, v.numero_vol, v.depart, v.arrivee, 
           v.date_depart, v.heure_depart, v.prix, r.date_reservation
    FROM reservations r
    JOIN clients c ON r.client_id = c.id
    JOIN vols v ON r.vol_id = v.id
    WHERE r.id = ?
");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Réservation non trouvée.");
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Courier', 'B', 18);
$pdf->Cell(0, 20, 'FACTURE DE RESERVATION', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Courier', '', 12);
$pdf->Cell(0, 10, 'Client : ' . $data['nom'], 0, 1);
$pdf->Cell(0, 10, 'Email : ' . $data['email'], 0, 1);
$pdf->Ln(5);
$pdf->Cell(0, 10, 'Vol : ' . $data['numero_vol'] . ' (' . $data['depart'] . ' -> ' . $data['arrivee'] . ')', 0, 1);
$pdf->Cell(0, 10, 'Date depart : ' . date('d/m/Y', strtotime($data['date_depart'])) . ' a ' . substr($data['heure_depart'], 0, 5), 0, 1);
$pdf->Cell(0, 10, 'Date reservation : ' . date('d/m/Y H:i', strtotime($data['date_reservation'])), 0, 1);
$pdf->Ln(10);

$pdf->SetFont('Courier', 'B', 16);
$pdf->Cell(0, 15, 'TOTAL : ' . $data['prix'] . ' DT', 0, 1, 'R');

// Forcer téléchargement
$pdf->Output('D', 'Facture_' . $data['numero_vol'] . '.pdf');
exit;
?>
