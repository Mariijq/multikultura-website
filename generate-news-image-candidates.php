<?php

use Illuminate\Support\Facades\DB;

$folder = base_path('storage/app/public/news/images');

$files = collect(scandir($folder))
    ->filter(function ($file) use ($folder) {
        return $file !== '.'
            && $file !== '..'
            && is_file($folder . DIRECTORY_SEPARATOR . $file);
    })
    ->values();

$rows = DB::table('news')
    ->select('id', 'image')
    ->whereNotNull('image')
    ->where('image', '<>', '')
    ->orderBy('id')
    ->get();

echo PHP_EOL;
echo "==============================================" . PHP_EOL;
echo " NEWS IMAGE CANDIDATES" . PHP_EOL;
echo "==============================================" . PHP_EOL;

foreach ($rows as $row) {

    $dbFile = basename(str_replace('\\', '/', $row->image));
    $dbStem = pathinfo($dbFile, PATHINFO_FILENAME);

    /*
     * Zemame pocetok od imeto.
     *
     * Primer:
     * 25102018
     * 14092022
     * IMG
     * Povik
     */

    if (preg_match('/^([0-9]+)/', $dbStem, $m)) {

        $prefix = $m[1];

        $candidates = $files->filter(function ($file) use ($prefix) {

            $name = pathinfo($file, PATHINFO_FILENAME);

            return preg_match(
                '/^' . preg_quote($prefix, '/') . '(?:[-_. ]|$)/i',
                $name
            );
        })->values();

    } else {

        /*
         * Ako ne pocnuva so brojki,
         * probuvame so prvite 10 karakteri.
         */

        $prefix = mb_substr($dbStem, 0, 10);

        $candidates = $files->filter(function ($file) use ($prefix) {

            return stripos(
                pathinfo($file, PATHINFO_FILENAME),
                $prefix
            ) === 0;

        })->values();
    }

    /*
     * Isfrli dokumenti i drugi ne-image fajlovi.
     */

    $candidates = $candidates->filter(function ($file) {

        return in_array(
            strtolower(pathinfo($file, PATHINFO_EXTENSION)),
            [
                'jpg',
                'jpeg',
                'png',
                'webp',
                'gif',
                'bmp'
            ]
        );

    })->values();

    /*
     * Isfrli WordPress thumbnails.
     */

    $candidates = $candidates->filter(function ($file) {

        return !preg_match(
            '/-\d+x\d+/i',
            pathinfo($file, PATHINFO_FILENAME)
        );

    })->values();

    /*
     * Isfrli Copy ako ima original.
     */

    $withoutCopy = $candidates->filter(function ($file) {

        return !preg_match(
            '/-copy(?:-copy)*$/i',
            pathinfo($file, PATHINFO_FILENAME)
        );

    })->values();

    if ($withoutCopy->isNotEmpty()) {
        $candidates = $withoutCopy;
    }

    echo PHP_EOL;

    if ($candidates->isEmpty()) {

        echo "[NO CANDIDATE] ID={$row->id}" . PHP_EOL;
        echo "DB: {$row->image}" . PHP_EOL;

        continue;
    }

    echo "[ID={$row->id}] {$row->image}" . PHP_EOL;

    foreach ($candidates as $candidate) {
        echo "    -> {$candidate}" . PHP_EOL;
    }
}

echo PHP_EOL;
echo "==============================================" . PHP_EOL;
echo " GOTOVO" . PHP_EOL;
echo "==============================================" . PHP_EOL;