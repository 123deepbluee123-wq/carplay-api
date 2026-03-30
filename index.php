<?php
header('Content-Type: application/json');

// SQLite Veritabanı Ayarı (Süre sınırı yoktur)
$dbFile = 'database.sqlite';
$db = new PDO("sqlite:$dbFile");

// Tablo yoksa oluştur (Otomatik kurulum)
$db->exec("CREATE TABLE IF NOT EXISTS licenses (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    device_id TEXT UNIQUE,
    is_active INTEGER DEFAULT 0
)");

$input = json_decode(file_get_contents('php://input'), true);
$deviceId = $input['device_id'] ?? null;

if (!$deviceId) {
    echo json_encode(["status" => "error", "message" => "Cihaz ID Yok"]);
    exit;
}

// Lisans sorgula
$stmt = $db->prepare("SELECT is_active FROM licenses WHERE device_id = ?");
$stmt->execute([$deviceId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo json_encode([
        "status" => "success",
        "license_active" => (bool)$user['is_active'],
        "trial_active" => false,
        "remaining_hours" => 999,
        "message" => $user['is_active'] ? "Lisans Aktif" : "Onay Bekliyor"
    ]);
} else {
    // Yeni cihazı kaydet
    $ins = $db->prepare("INSERT INTO licenses (device_id, is_active) VALUES (?, 0)");
    $ins->execute([$deviceId]);
    echo json_encode(["status" => "pending", "license_active" => false, "message" => "Cihaz Kaydedildi. Panelden Onaylayın."]);
}
