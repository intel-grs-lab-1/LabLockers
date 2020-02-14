<?php

namespace App\Exports;

use App\CsvData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CsvExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return CsvData::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'Manufacture',
            'Model',
            'Colour',
            'Type',
            'Battery capacity',
            'Power supply',
            'Power supply details',
            'OS',
            'CPU brand name',
            'CPU power limit 1',
            'CPU power limit 2',
            'Memory size',
            'Type',
            'Speed',
            'Channels',
            'Screen size',
            'Resolution',
            'Panel tech',
            'Touchscreen',
            'Drive capacity',
            'Serial number',
            'Video card',
            'Network',
            'Thunderbolt ports',
            'Accessories',
            'Owner',
            'Location',
            'Comments',
			'Created at',
            'Updated at',
        ];
    }
}
