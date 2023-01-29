<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'text', 'date', 'slug', 'image_original_name', 'category_id'];

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public static function generateSlug($string)
    {
        $slug = Str::slug($string, '-');

        $original_slug = $slug;
        $c = 1;
        $exists = Portfolio::where('slug', $slug)->first();
        while ($exists) {
            $slug = $original_slug . '-' . $c;
            $exists = Portfolio::where('slug', $slug)->first();
            $c++;
        }
        return $slug;
    }
}
