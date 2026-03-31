<?php
header('Content-Type: application/json');

// Uygulamanın beklediği tüm değerleri "Sınırsız" ve "Aktif" olarak gönderiyoruz
$response = [
    "status" => "success",
    "license_active" => true,
    "trial_active" => false,
    "license_key" => "AACP-1234-5678-9012", // Buraya sahte bir anahtar ekledik
    "message" => "Sınırsız Lisans Aktif",
    "remaining_hours" => 9999,
    "remaining_minutes" => 59
];

echo json_encode($response);
?>
