<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $picture
 * @property $title
 * @property $price
 * @property $description
 * @property $category_id
 * @property $autor_id
 * @property $promotion_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Autor $autor
 * @property Category $category
 * @property Comment[] $comments
 * @property Promotion $promotion
 * @property UserProduct[] $userProducts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    static $rules = [
		'picture' => 'required|image',
		'title' => 'required',
		'price' => 'required',
		'description' => 'required',
		'category_id' => 'required',
		'autor_id' => 'required',
		'promotion_id' => 'nullable',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['picture','title','price','description','category_id','autor_id','promotion_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function autor()
    {
        return $this->hasOne('App\Models\Autor', 'id', 'autor_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'product_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function promotion()
    {
        return $this->hasOne('App\Models\Promotion', 'id', 'promotion_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userProducts()
    {
        return $this->hasMany('App\Models\UserProduct', 'product_id', 'id');
    }
    
}
