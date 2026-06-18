<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use SplFileInfo;

class RemoveBOM extends Command
{
    protected $signature = 'fix:remove-bom';
    protected $description = 'Scan entire Laravel project for malicious script injection';

    public function handle()
    {
        $extensions = ['php', 'blade.php', 'js', 'html'];
        $baseDir = base_path();

        // Important: DO NOT exclude public
        $excludedDirs = [
            'vendor',
            'node_modules',
            'storage/framework',
            'bootstrap/cache'
        ];

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($baseDir, RecursiveDirectoryIterator::SKIP_DOTS)
        );

        $searchPatterns = [
            'cd22297f76.js',
            'uploads/author',
            '<script src="https://www.franchiseindia.com/uploads/author'
        ];

        $foundMatches = [];
        $scanned = 0;

        $this->info("🔍 Scanning entire project for malicious script...");

        foreach ($iterator as $file) {
            /** @var SplFileInfo $file */
            $filePath = $file->getRealPath();

            if (!$filePath) {
                continue;
            }

            if ($this->shouldSkip($filePath, $excludedDirs)) {
                continue;
            }

            if (!$this->hasValidExtension($filePath, $extensions)) {
                continue;
            }

            $scanned++;

            $content = @file_get_contents($filePath);
            if ($content === false) {
                continue;
            }

            foreach ($searchPatterns as $pattern) {
                if (strpos($content, $pattern) !== false) {

                    $lines = explode("\n", $content);

                    foreach ($lines as $lineNumber => $line) {
                        if (strpos($line, $pattern) !== false) {
                            $foundMatches[] = [
                                'file' => $filePath,
                                'line' => $lineNumber + 1,
                                'content' => trim($line)
                            ];
                        }
                    }
                }
            }
        }

        $this->info("📂 Files scanned: $scanned");

        if (empty($foundMatches)) {
            $this->info("✅ No malicious script found in project files.");
            return;
        }

        $this->warn("🚨 Suspicious script found in " . count($foundMatches) . " location(s):");

        foreach ($foundMatches as $match) {
            $this->warn("➤ File: {$match['file']}");
            $this->line("   → Line {$match['line']}: {$match['content']}");
        }
    }

    private function hasValidExtension(string $filePath, array $extensions): bool
    {
        foreach ($extensions as $ext) {
            if (str_ends_with($filePath, $ext)) {
                return true;
            }
        }
        return false;
    }

    private function shouldSkip(string $path, array $excludedDirs): bool
    {
        foreach ($excludedDirs as $dir) {
            if (str_contains($path, DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR)) {
                return true;
            }
        }
        return false;
    }
}