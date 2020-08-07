<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Post extends Model
{
    //Applying soft deletes to keep the data into the database after delete
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = ['title','description','publication_date','user_id'];
    protected $appends = [
        'published_date'
    ];
    
    public function user(){

        return $this->belongsTo(User::class);
    }   
    
    public function setPublicationDateAttribute($value){
        
        $this->attributes['publication_date'] = !is_null($value) ? $value : $this->attributes['publication_date'] = Carbon::now()->format('Y-m-d H:i:s');
    }

    public function setUserIdAttribute($value)
    {   
        $this->attributes['user_id'] = !is_null($value) ? $value : auth()->id();
    }

    public function getPublishedDateAttribute(){

        return Carbon::parse($this->publication_date)->format('m/d/Y');
    }
}
