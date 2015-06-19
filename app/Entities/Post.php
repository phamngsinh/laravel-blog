<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Post extends Model implements Transformable {

    use TransformableTrait;

    protected $fillable = [];
    protected $dates = ['published_at'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (! $this->exists) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }
}