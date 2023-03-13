<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsTo;
use App\Models\Post as Post;

class PostImage extends Model {

    protected $table = "post_images";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function __construct() {}

    public function post(): BelongsTo {
        
        return $this->belongsTo(Post::class, 'post_id', 'id');

    }

}
