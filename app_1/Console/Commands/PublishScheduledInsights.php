<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\InsightList;
use App\Models\InsightListHindi;
use Exception;

class PublishScheduledInsights extends Command
{
    protected $signature = 'app:publish-scheduled-insights';
    protected $description = 'Publish scheduled insights and create admin notifications';

    public function handle()
    {
        $now = Carbon::now();
        $this->info('PublishScheduledInsights started at: ' . $now->toDateTimeString());

        $models = [
            InsightList::class,
            InsightListHindi::class,
        ];

        foreach ($models as $modelClass) {
            try {
                $items = $modelClass::where('status', 3) // scheduled
                    ->whereNotNull('scheduled_at')
                    ->where('scheduled_at', '<=', $now)
                    ->get();

                if ($items->isEmpty()) {
                    $this->info("No scheduled items found for {$modelClass}.");
                    continue;
                }

                foreach ($items as $insight) {
                    DB::beginTransaction();
                    try {
                        // Update publish status and time
                        $insight->status = 1; // published
                        if (isset($insight->time)) {
                            $insight->time = $now;
                        } else {
                            // optional: keep published_at if you prefer that name
                            $insight->published_at = $now;
                        }
                        $insight->save();

                        // Create admin notification
                        DB::table('admin_notifications')->insert([
                            'title'        => $insight->title ?? 'Untitled',
                            'insight_id'   => $insight->news_id ?? null,
                            'scheduled_at' => $insight->scheduled_at,
                            'published_at' => $now,
                            'created_at'   => now(),
                            'updated_at'   => now(),
                        ]);

                        DB::commit();
                        $this->info("Published insight id: {$insight->news_id} and created notification.");
                    } catch (Exception $e) {
                        DB::rollBack();
                        Log::error("PublishScheduledInsights error for id {$insight->news_id}: " . $e->getMessage());
                        $this->error("Failed publishing insight id: {$insight->news_id}");
                    }
                }
            } catch (Exception $e) {
                Log::error("PublishScheduledInsights model {$modelClass} failed: " . $e->getMessage());
            }
        }

        $this->info('PublishScheduledInsights finished.');
    }
}
