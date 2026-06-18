<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SanitizeJS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sanitize-j-s';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
    $this->info("🚀 Starting JS Sanitization...");

    $basePath = base_path();
    $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($basePath));
    $cleanedCount = 0;

    foreach ($files as $file) {
        if ($file->isDir() || strtolower($file->getExtension()) !== 'js') continue;
        
        // Skip vendors to avoid breaking external packages
        if (str_contains($file->getPathname(), 'vendor')) continue;

        $filePath = $file->getRealPath();
        $content = file_get_contents($filePath);
        $originalContent = $content;

        // 1. FIX: Search Logic (Replace window.open with location.href)
        // This targets: window.open(url, "_blank");
        $content = preg_replace(
            '/window\.open\((url|\$url|url\s*\+\s*["\'].*["\']),\s*["\']_blank["\']\);/i',
            'window.location.href = $1;',
            $content
        );

        // 2. CLEAN: Remove appended eval() blocks (Common at end of minified files)
        // Malware often appends eval(function(p,a,c,k,e,d)... at the very end.
        $content = preg_replace('/eval\s*\(function\(p,a,c,k,e,d\).*/i', '', $content);

        // 3. CLEAN: Remove invisible BOM characters
        $content = preg_replace("/\xEF\xBB\xBF|\u{FEFF}/u", '', $content);

        if ($content !== $originalContent) {
            file_put_contents($filePath, $content);
            $this->warn("✅ Sanitized: " . str_replace($basePath, '', $filePath));
            $cleanedCount++;
        }
    }

    $this->info("🎉 Done! $cleanedCount JS files have been patched and cleaned.");
}
}
