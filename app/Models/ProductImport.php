<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel,WithHeadingRow
{
    use HasFactory;
    public function model(array $row)
    {
        return new Product([
            'sku' => $row['sku'],
            'name' => $row['name'],
            'price' => $row['price'],
            'weight' => $row['weight'] ?? null,
            'descriptions' => $row['descriptions'] ?? null,
            'thumbnail' => $row['thumbnail'] ?? null,
            'image' => $row['image'] ?? null,
            'category' => $row['category'] ?? null,
            'create_date' => $row['create_date'] ?? null,
            'stock' => $row['stock'] ?? 0,
        ]);
    }
}
