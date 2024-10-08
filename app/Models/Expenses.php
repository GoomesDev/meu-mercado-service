<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $connection = 'mysql';
    protected $table = 'expenses';
    protected $fillable = [
        'name',
        'price',
        'market'
    ];

    public static function listAll()
    {
	    return self::all();
    }

    public static function listByMarket($market)
    {
	    return self::where('market', $market)->get();
    }

    public static function createExpense($params)
    {
        return self::create([
            'name'=>$params['name'],
            'price'=>$params['price'],
            'market'=>$params['market']
        ]);
    }
}
