<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'description', 'published_at', 'image', 'category_id'
    ];

    public function deleteImage(){
        Storage::delete($this->image);

    }

    

    /**
    * Get the Post that the category belongs to
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function category(){

        return $this->belongsTo(Category::class );

    }

    /**
     * The post that belong to many tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Checks if the posts has associated tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    
    public function hasTags($tagId){
       return in_array($tagId, $this->tags->pluck('id')->toArray()) ;
    }

}
