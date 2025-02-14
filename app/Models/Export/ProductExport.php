<?php

namespace App\Models\Export;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Appp\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollevtion,WithHeadings
{
    use HasFactory;
    public function collection()
    {
        return Product::all();
    }
    public function headings():array
    {
        return [
            'ID',
            'SKU',
            'Name',
            'Price',
            'Weight',
            'Description',
            'thumbnail',
            'Image',
            'Category',
            'Create Date',
            'Stock'
        ];
    }
}
