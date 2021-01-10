<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductImages extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'path',
    ];

    public static function getFirstItemPath($productId) {
        $image = DB::select('select * from product_images where product_id = ?', [$productId])->first();
        return $image->path;
    }
}
