<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 3 - Reference Numbers</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; }
        body { background-color: #f4f6f9; color: #333; display: flex; justify-content: center; padding: 40px 20px; }
        .container { background: #ffffff; width: 100%; max-width: 700px; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h1 { font-size: 1.5rem; color: #1e293b; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e2e8f0; }
        .card { background: #f8fafc; border: 1px solid #e2e8f0; border-left: 4px solid #6366f1; padding: 14px 18px; margin-bottom: 12px; border-radius: 6px; display: flex; justify-content: space-between; align-items: center; }
        .card-title { font-weight: 600; color: #0f172a; }
        .badge { padding: 4px 12px; border-radius: 6px; font-family: monospace; font-size: 0.95rem; font-weight: 600; background-color: #e0e7ff; color: #3730a3; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercise 3: Reference Numbers</h1>
        
        <?php foreach ($requests as $r): ?>
            <div class="card">
                <span class="card-title">
                    <?= full_name($r['first'], $r['last']) ?> (ID: <?= $r['id'] ?>)
                </span>
                <span class="badge">
                    <?= make_reference($r['id'], $r['dzongkhag'], $r['submitted']) ?>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>