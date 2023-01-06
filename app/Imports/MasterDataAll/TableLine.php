<?php

namespace App\Imports\MasterDataAll;

use App\Models\TableLine as TableLineM;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Carbon;

class TableLine implements ToModel, WithStartRow, WithProgressBar
{
    use Importable;
    public function model(array $row)
    {
        $table_code = $row[2];
        $id = (int)$row[0];
        if($table_code == '{{$self}}')
        {
            $table_code = $id;
        }
        return  TableLineM::updateOrCreate([
            'table_line_id' => $id,
        ],
        [
            'table_id' => trim($row[1]),
            'table_code' => trim($table_code),
            'table_desc' => trim($row[4]),
            'table_parent_id' => $row[3],
            'long_text_1' => $row[5],
            'long_text_2' => $row[6],
            'long_text_3' => $row[7],
            'long_text_4' => $row[8],
            'logic_1' => $row[9],
            'logic_2' => $row[10],
            'logic_3' => $row[11],
            'logic_4' => $row[12],
            'logic_5' => $row[13],
            'num_1' => $row[14] ? $row[14] : 0,
            'num_2' => $row[15] ? $row[15] : 0,
            'num_3' => $row[16] ? $row[16] : 0,
            'num_4' => $row[17] ? $row[17] : 0,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
