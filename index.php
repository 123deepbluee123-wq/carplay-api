<?php
header('Content-Type: application/json');

// Kim bağlanırsa bağlansın direkt "FULL LİSANS" cevabı gönderiyoruz
echo json_encode([
    "status" => "success",
    "license_active" => true,    // Lisans aktif
    "trial_active" => false,     // Deneme süresi değil (trial kapatıldı)
    "message" => "Sınırsız Lisans Aktif", 
    "remaining_hours" => 9999,   // Göstergelik yüksek saat
    "remaining_minutes" => 59
]);
?>
