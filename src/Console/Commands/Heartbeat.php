<?php

namespace CubeSystems\HealthCheck\Console\Commands;

use CubeSystems\HealthCheck\Model\Heartbeat as HeartbeatModel;
use Illuminate\Console\Command;

class Heartbeat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'healthcheck:heartbeat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update scheduler heartbeat timestamp';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $heartbeat = HeartbeatModel::firstOrNew([
            'type' => HeartbeatModel::TYPE_SCHEDULER
        ]);
        $heartbeat->touch();
        $heartbeat->save();
    }
}
