<?php
declare(strict_types=1);
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

$today = '2026-10-07';
$overdue = 0;
$follow_up = 0;
$on_time = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 4 - Waiting-time Alert</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; }
        body { background-color: #f4f6f9; color: #333; display: flex; justify-content: center; padding: 40px 20px; }
        .container { background: #ffffff; width: 100%; max-width: 700px; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h1 { font-size: 1.5rem; color: #1e293b; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e2e8f0; }
        .card { background: #f8fafc; border: 1px solid #e2e8f0; border-left: 4px solid #94a3b8; padding: 14px 18px; margin-bottom: 12px; border-radius: 6px; display: flex; justify-content: space-between; align-items: center; }
        .card-title { font-weight: 600; color: #0f172a; }
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; }
        .badge-overdue { background-color: #fee2e2; color: #991b1b; }
        .badge-followup { background-color: #fef3c7; color: #92400e; }
        .badge-ontime { background-color: #dcfce7; color: #166534; }
        .summary { margin-top: 20px; padding: 15px; background: #0f172a; color: #fff; border-radius: 8px; font-weight: bold; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercise 4: Waiting-time Alert</h1>

        <?php foreach ($requests as $r): ?>
            <?php 
            if ($r['status'] !== 'Submitted' && $r['status'] !== 'Under review') continue;

            $days = intdiv(strtotime($today) - strtotime($r['submitted']), 86400);
            $band = wait_band($days);

            $badge_class = 'badge-ontime';
            if ($band === 'Overdue') { $overdue++; $badge_class = 'badge-overdue'; }
            elseif ($band === 'Follow up') { $follow_up++; $badge_class = 'badge-followup'; }
            else { $on_time++; }
            ?>

            <div class="card">
                <span class="card-title">
                    #<?= $r['id'] ?> <?= full_name($r['first'], $r['last']) ?> — <?= $days ?> days
                </span>
                <span class="badge <?= $badge_class ?>"><?= $band ?></span>
            </div>
        <?php endforeach; ?>

        <div class="summary">
            <?= $overdue ?> overdue · <?= $follow_up ?> follow up · <?= $on_time ?> on time
        </div>
    </div>
</body>
</html>