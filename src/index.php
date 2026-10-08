<?php
header('Content-Type: text/html; charset=UTF-8');
$message = 'Hello World!';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World - PHP & Docker</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            background: #f1f5f9;
            color: #0f172a;
            font-family: system-ui, sans-serif;
        }
        main {
            width: 100%;
            max-width: 560px;
            padding: 40px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
        }
        .label { color: #0369a1; font-weight: 700; }
        h1 { margin: 16px 0; font-size: clamp(2rem, 8vw, 3rem); }
        p { line-height: 1.6; }
    </style>
</head>
<body>
    <main>
        <span class="label">GSLC · PHP & Docker</span>
        <h1><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></h1>
        <p>Aplikasi PHP sederhana untuk tugas GSLC, dijalankan dengan Docker Compose.</p>
    </main>
</body>
</html>
