<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

$cid_groups = [];
$invalids = [];

foreach ($requests as $r) {
    $cid = $r['cid'];
    if (!is_valid_cid($cid)) {
        $invalids[] = "Invalid CID in request {$r['id']}: $cid";
    }
    $cid_groups[$cid][] = $r['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 7 - Duplicate CIDs</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; }
        body { background-color: #f4f6f9; color: #333; display: flex; justify-content: center; padding: 40px 20px; }
        .container { background: #ffffff; width: 100%; max-width: 700px; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h1 { font-size: 1.5rem; color: #1e293b; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e2e8f0; }
        .card { background: #f8fafc; border: 1px solid #e2e8f0; border-left: 4px solid #ef4444; padding: 14px 18px; margin-bottom: 12px; border-radius: 6px; display: flex; justify-content: space-between; align-items: center; }
        .card-title { font-weight: 600; color: #0f172a; }
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; background-color: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercise 7: Duplicate & Invalid CIDs</h1>

        <?php foreach ($cid_groups as $cid => $ids): ?>
            <?php if (count($ids) > 1): ?>
                <div class="card">
                    <span class="card-title">Duplicate <?= $cid ?></span>
                    <span class="badge">Requests <?= implode(', ', $ids) ?></span>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach ($invalids as $msg): ?>
            <div class="card">
                <span class="card-title"><?= $msg ?></span>
                <span class="badge">Invalid CID</span>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>