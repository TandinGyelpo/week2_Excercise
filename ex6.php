<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';

function count_pending(array $requests): int {
    $total = 0;
    for ($i = 0; $i < count($requests); $i++) {
        $status = $requests[$i]['status'];
        if ($status === 'Submitted' || $status === 'Under review') {
            $total++;
        }
    }
    return $total;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 6 - Bug Fixes</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; }
        body { background-color: #f4f6f9; color: #333; display: flex; justify-content: center; padding: 40px 20px; }
        .container { background: #ffffff; width: 100%; max-width: 700px; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h1 { font-size: 1.5rem; color: #1e293b; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e2e8f0; }
        .card { background: #f8fafc; border: 1px solid #e2e8f0; border-left: 4px solid #10b981; padding: 14px 18px; margin-bottom: 12px; border-radius: 6px; display: flex; justify-content: space-between; align-items: center; }
        .card-title { font-weight: 600; color: #0f172a; }
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; background-color: #dcfce7; color: #166534; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercise 6: Find the Bugs</h1>
        
        <div class="card">
            <span class="card-title">Pending Requests Total</span>
            <span class="badge"><?= count_pending($requests) ?> Pending</span>
        </div>
    </div>
</body>
</html>