<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\Importable;
use App\Imports\MasterDataAll\TableLine;

class MasterDataAll implements WithMultipleSheets, WithProgressBar
{
    use Importable;
    
    public function sheets(): array
    {
        return [
            // 'Vehicle' => (new Vehicle())->withOutput($this->output),
            'TableLine' => (new TableLine())->withOutput($this->output),
            // 'Employee' => (new Employee())->withOutput($this->output),
        ];
    }
}
