<?php

use Illuminate\Support\Facades\DB;

$files = array_values(array_filter(
    scandir(__DIR__ . '/storage/app/public/news/images'),
    fn ($file) =>
        $file !== '.' &&
        $file !== '..' &&
        !preg_match('/-\d+x\d+/', $file)
));

$rows = DB::table('news')
    ->select('id', 'image')
    ->whereNotNull('image')
    ->where('image', '<>', '')
    ->orderBy('id')
    ->get();

echo PHP_EOL;
echo "=== NEWS IMAGE MATCH REPORT ===" . PHP_EOL;
echo PHP_EOL;

echo "Realni fajlovi: " . count($files) . PHP_EOL;
echo "DB zapisi:      " . count($rows) . PHP_EOL;
echo PHP_EOL;

foreach ($rows as $row) {

    $dbFileName = basename(str_replace('\\', '/', $row->image));

    if ($dbFileName === '') {
        continue;
    }

    // -------------------------------------------------
    // 1. EXACT MATCH
    // -------------------------------------------------

    $exact = null;

    foreach ($files as $file) {

        if (strcasecmp($file, $dbFileName) === 0) {
            $exact = $file;
            break;
        }
    }

    if ($exact !== null) {

        echo "[OK]       ID={$row->id} | {$dbFileName}" . PHP_EOL;

        continue;
    }

    // -------------------------------------------------
    // 2. MATCH PO IME + ISTA EKSTENZIJA
    // -------------------------------------------------

    $stem = pathinfo($dbFileName, PATHINFO_FILENAME);

    $dbExtension = strtolower(
        pathinfo($dbFileName, PATHINFO_EXTENSION)
    );

    $matches = [];

    foreach ($files as $file) {

        $candidateStem = pathinfo(
            $file,
            PATHINFO_FILENAME
        );

        $candidateExtension = strtolower(
            pathinfo($file, PATHINFO_EXTENSION)
        );

        // Mora da ima ista ekstenzija
        if ($candidateExtension !== $dbExtension) {
            continue;
        }

        // Mora:
        // 1. da ima isto ime
        // ILI
        // 2. da pocnuva so originalnoto ime + "-"
        if (
            strcasecmp($candidateStem, $stem) === 0 ||
            stripos($candidateStem, $stem . '-') === 0
        ) {

            $matches[] = $file;
        }
    }

    // -------------------------------------------------
    // 3. EDEN SIGUREN MATCH
    // -------------------------------------------------

    if (count($matches) === 1) {

        echo PHP_EOL;

        echo "[MATCH]    ID={$row->id}" . PHP_EOL;
        echo "           DB:   {$row->image}" . PHP_EOL;
        echo "           REAL:  news/images/{$matches[0]}" . PHP_EOL;

    }

    // -------------------------------------------------
    // 4. POVEKJE MATCHES
    // -------------------------------------------------

    elseif (count($matches) > 1) {

        echo PHP_EOL;

        echo "[MULTIPLE] ID={$row->id}" . PHP_EOL;
        echo "           DB: {$row->image}" . PHP_EOL;

        foreach ($matches as $match) {

            echo "           -> {$match}" . PHP_EOL;
        }
    }

    // -------------------------------------------------
    // 5. NEMA MATCH
    // -------------------------------------------------

    else {

        echo "[MISSING]  ID={$row->id} | {$row->image}" . PHP_EOL;
    }
}

echo PHP_EOL;
echo "=== GOTOVO ===" . PHP_EOL;