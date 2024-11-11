<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Card
 *
 * @property int $id
 * @property string $card_number
 * @property string $cardholder_name
 * @property \Carbon\Carbon $expiration_date
 * @property string $CVV
 * @property decimal $Balance
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Card extends Model
{
    
    static $rules = [
		'card_number' => 'required|min:16|max:16',
		'cardholder_name' => 'required|min:1|max:20',
		'expiration_date' => 'required|date',
		'CVV' => 'required|digits:3|nullable',
		'Balance' => 'nullable|numeric',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['card_number','cardholder_name','expiration_date','CVV','Balance'];


    /**
     * Definir las fechas como instancias de Carbon.
     */
    protected $dates = ['expiration_date'];
}