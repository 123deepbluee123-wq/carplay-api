<?php
header('Content-Type: application/json');

echo json_encode([
    "status" => "success",
    "license_active" => true, // Bunu true yaptık
    "trial_active" => false,  // Bunu false yaptık
    "message" => "Sınırsız Lisans Aktif",
    "remaining_hours" => 9999,
    "remaining_minutes" => 59
]);
?>
