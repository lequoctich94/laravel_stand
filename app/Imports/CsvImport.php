<?php

namespace App\Imports;

use App\Models\Csv;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CsvImport implements ToModel, WithStartRow
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
}
