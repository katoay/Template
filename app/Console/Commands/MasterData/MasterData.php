<?php

namespace App\Console\Commands\MasterData;

use Illuminate\Console\Command;
use App\Imports\MasterDataAll;
use Maatwebsite\Excel\Facades\Excel;

class MasterData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'input:master';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate master data all from excel';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $this->output->title('Starting import');
            $path = 'master/tableline.xlsx';
            $import = new MasterDataAll;
            $import->withOutput($this->output)->import($path);
            // Excel::import(new MasterDataAll, $path);
            $this->output->success('Import successful');
        } catch (\Throwable $th) {
            $this->error($th->getmessage());
            return Command::SUCCESS;
        }
        $this->info('Import master data success');
        return Command::SUCCESS;
    }
}
