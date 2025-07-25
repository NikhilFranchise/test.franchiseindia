<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use SplFileInfo;

class RemoveBOM extends Command
{
    protected $signature = 'fix:remove-bom';
    protected $description = 'Scan and optionally remove BOM (Byte Order Mark) from PHP, Blade, JS, and CSS files';

    public function handle()
    {
        $extensions = ['php', 'blade.php', 'js', 'css'];
        $baseDir = base_path();
        $excludedDirs = ['vendor','public','app/Console/Commands/RemoveBOM.php','node_modules', 'storage/framework', 'bootstrap/cache']; // ← exclude more if needed

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($baseDir, RecursiveDirectoryIterator::SKIP_DOTS)
        );

        $filesWithBOM = [];
        $scanned = 0;

        $this->info("🔍 Scanning for BOM (U+FEFF) in: " . implode(', ', $extensions));

        foreach ($iterator as $file) {
            /** @var SplFileInfo $file */
            $filePath = $file->getRealPath();

            // ❌ Skip directories like vendor, node_modules etc.
            if ($this->shouldSkip($filePath, $excludedDirs)) {
                continue;
            }

            if (!$this->hasValidExtension($filePath, $extensions)) {
                continue;
            }

            $scanned++;
            $content = file_get_contents($filePath);
            $lines = explode("\n", $content);
            $found = [];

            foreach ($lines as $lineNumber => $line) {
                // Unicode BOM (U+FEFF)
                $unicodeColumn = mb_strpos($line, "\u{FEFF}");
                if ($unicodeColumn !== false) {
                    $found[] = "Unicode BOM (U+FEFF) found at Line: " . ($lineNumber + 1) . ", Column: " . ($unicodeColumn + 1);
                }

                // Byte BOM (EF BB BF)
                $byteColumn = mb_strpos($line, "\xEF\xBB\xBF", 0, 'UTF-8');
                if ($byteColumn !== false) {
                    $found[] = "Byte BOM (EF BB BF) found at Line: " . ($lineNumber + 1) . ", Column: " . ($byteColumn + 1);
                }

                // HTML Entities
                if (strpos($line, '&#65279;') !== false || strpos($line, '&#xFEFF;') !== false) {
                    $found[] = "HTML Entity BOM found at Line: " . ($lineNumber + 1);
                }
            }

            if (!empty($found)) {
                $filesWithBOM[$filePath] = $found;
            }
        }

        $this->info("🔎 Scanned: $scanned file(s)");

        if (empty($filesWithBOM)) {
            $this->info("✅ No BOM found. You're all good!");
            return;
        }

        $this->warn("❗ Files containing BOM: " . count($filesWithBOM));

        foreach ($filesWithBOM as $file => $details) {
            $this->warn("➤ File: $file");
            foreach ($details as $detail) {
                $this->line("   → $detail");
            }
        }

        if ($this->confirm('❓ Remove BOM and create .bak backups?', false)) {
            foreach ($filesWithBOM as $file => $_) {
                $original = file_get_contents($file);
                file_put_contents($file . '.bak', $original);

                $cleaned = preg_replace("/\xEF\xBB\xBF|\u{FEFF}|&#65279;|&#xFEFF;/u", '', $original);
                file_put_contents($file, $cleaned);

                $this->info("✅ BOM removed from: $file (backup created: {$file}.bak)");
            }
            $this->info("🎉 Done! BOM removed from " . count($filesWithBOM) . " file(s).");
        } else {
            $this->warn("❌ BOM removal cancelled. No files were modified.");
        }
    }

    private function hasValidExtension(string $filePath, array $extensions): bool
    {
        foreach ($extensions as $ext) {
            if (str_ends_with($filePath, $ext)) return true;
        }
        return false;
    }

    // private function shouldSkip(string $path, array $excludedDirs): bool
    // {
    //     foreach ($excludedDirs as $dir) {
    //         if (str_contains($path, DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR)) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }
    private function shouldSkip(string $path, array $excludedPaths): bool
{
    $normalizedPath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $path);

    foreach ($excludedPaths as $excluded) {
        $normalizedExcluded = base_path(str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $excluded));

        // Skip if it's a directory match
        if (is_dir($normalizedExcluded) && str_starts_with($normalizedPath, $normalizedExcluded)) {
            return true;
        }

        // Skip if it's an exact file match
        if (realpath($normalizedPath) === realpath($normalizedExcluded)) {
            return true;
        }
    }

    return false;
}

}
