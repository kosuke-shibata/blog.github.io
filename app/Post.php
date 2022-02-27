<?php
//MVCモデルのMの部分

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public function getByLimit(int $limit_count = 10)
    // {
    //     // updated_atで降順に並べたあと、limitで件数制限をかける
    //     return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    // }
    protected $fillable = ['title', 'body','category_id'];
    
    public function getPaginateByLimit(int $limit_count)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}