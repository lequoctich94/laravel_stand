<?php

namespace App\Imports;

use App\Models\Csv;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class QueueImport implements ToModel,WithChunkReading,ShouldQueue,WithStartRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        //$row is array of column in excel
        return new Csv([
           'id'     => $row[0],
           'jancode'    => $row[1],
           'link' => $row[2],
        ]);
    }

    /**
     * @return int
     * Bắt đầu lấy data từ hàng thứ 2
     */
    public function startRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
