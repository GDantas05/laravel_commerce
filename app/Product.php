<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'featured', 'recommend', 'category_id'];
    
    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }
    
    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }
    
    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }
    
    //UTILIZANDO O GET NO INICIO E O ATTRIBUTE NO FINAL O LARAVEL "TRANSFORMA" O MÉTODO EM UM ATRIBUTO
    //PODE SER CHAMADO: $product->nameDescription ou $product->name_description
    public function getNameDescriptionAttribute()
    {
        return $this->name.' - '.$this->description;
    }
    
    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name');
        
        return implode(',', $tags);
    }
    
    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1);
    }
    
    public function scopeRecommend($query)
    {
        return $query->where('recommend', '=', 1);
    }
}
