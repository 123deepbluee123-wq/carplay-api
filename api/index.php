<?php
header('Content-Type: application/json');

echo json_encode([
    "status" => "success",
    "license_active" => true,
    "trial_active" => false,
    "message" => "Sınırsız Lisans Aktif",
    "remaining_hours" => 9999,
    "remaining_minutes" => 59
]);
?>
