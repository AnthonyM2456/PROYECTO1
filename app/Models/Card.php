<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Card
 *
 * @property $id
 * @property $card_number
 * @property $cardholder_name
 * @property $expiration_date
 * @property $CVV
 * @property $Balance
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Card extends Model
{
    
    static $rules = [
		'card_number' => 'required|min:16|max:16',
		'cardholder_name' => 'required|min:1|max:20',
		'expiration_date' => 'required',
		'CVV' => 'required',
		'Balance' => 'nullable',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['card_number','cardholder_name','expiration_date','CVV','Balance'];



}
