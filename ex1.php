<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1 - Output Predictions</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; }
        body { background-color: #f4f6f9; color: #333; display: flex; justify-content: center; padding: 40px 20px; }
        .container { background: #ffffff; width: 100%; max-width: 700px; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h1 { font-size: 1.5rem; color: #1e293b; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #e2e8f0; }
        .card { background: #f8fafc; border: 1px solid #e2e8f0; border-left: 4px solid #3b82f6; padding: 14px 18px; margin-bottom: 12px; border-radius: 6px; display: flex; justify-content: space-between; align-items: center; }
        .card-title { font-weight: 600; color: #0f172a; }
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; background-color: #e0f2fe; color: #075985; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercise 1: Predict the Output</h1>
        
        <div class="card">
            <span class="card-title">Snippet A ($x ?: 'none' | $x ?? 'none')</span>
            <span class="badge">
                <?php
                $x = 0;
                $label = $x ?: 'none';
                $size = $x ?? 'none';
                echo "$label | $size";
                ?>
            </span>
        </div>

        <div class="card">
            <span class="card-title">Snippet B (Loop & Break/Continue)</span>
            <span class="badge">
                <?php
                $total = 0;
                for ($i = 1; $i <= 10; $i++) {
                    if ($i % 3 === 0) continue;
                    if ($i > 7) break;
                    $total += $i;
                }
                echo "Total: $total";
                ?>
            </span>
        </div>

        <div class="card">
            <span class="card-title">Snippet C (Array Uppercase Check)</span>
            <span class="badge">
                <?php
                $m = ['b' => 2, 'a' => 1, 'c' => 3];
                $out = '';
                foreach ($m as $k => $v) {
                    $out .= ($v > 1) ? strtoupper($k) : $k;
                }
                echo "Output: $out";
                ?>
            </span>
        </div>

        <div class="card">
            <span class="card-title">Snippet D (Trim & Substr)</span>
            <span class="badge">
                <?php
                $n = strlen(trim('  Paro  '));
                echo $n . substr('Paro', -2);
                ?>
            </span>
        </div>
    </div>
</body>
</html>