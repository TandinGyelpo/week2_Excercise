<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

$counts = [];
foreach ($requests as $r) {
    if ($r['status'] === 'Submitted' || $r['status'] === 'Under review') {
        $dz = ucfirst(strtolower(trim($r['dzongkhag'])));
        $counts[$dz] = ($counts[$dz] ?? 0) + 1;
    }
}

$max_count = 0;
foreach ($counts as $count) {
    if ($count > $max_count) $max_count = $count;
}

$winners = [];
foreach ($counts as $dz => $count) {
    if ($count === $max_count) {
        $winners[] = "$dz ($count pending)";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2 - Busiest Dzongkhag</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; }
        body { background-color: #f4f6f9; color: #333; display: flex; justify-content: center; padding: 40px 20px; }
        .container { background: #ffffff; width: 100%; max-width: 700px; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h1 { font-size: 1.5rem; color: #1e293b; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e2e8f0; }
        .card { background: #f8fafc; border: 1px solid #e2e8f0; border-left: 4px solid #3b82f6; padding: 14px 18px; margin-bottom: 12px; border-radius: 6px; display: flex; justify-content: space-between; align-items: center; }
        .card-title { font-weight: 600; color: #0f172a; }
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; background-color: #e0f2fe; color: #075985; }
        .summary { margin-top: 20px; padding: 15px; background: #0f172a; color: #fff; border-radius: 8px; font-weight: bold; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercise 2: Busiest Dzongkhag</h1>
        
        <?php foreach ($counts as $dz => $count): ?>
            <div class="card">
                <span class="card-title"><?= $dz ?></span>
                <span class="badge"><?= $count ?> Pending</span>
            </div>
        <?php endforeach; ?>

        <div class="summary">
            Busiest: <?= implode(', ', $winners) ?>
        </div>
    </div>
</body>
</html>