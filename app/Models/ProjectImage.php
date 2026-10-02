<?php 
 
namespace App\Models; 
 
use Illuminate\Database\Eloquent\Model; 
 
class ProjectImage extends Model 
{ 
    protected $fillable = [ 
        'project_id', 
        'image', 
        'alt_text', 
        'sort_order', 
    ]; 
 
    protected $casts = [ 
        'sort_order' => 'integer', 
    ]; 
 
    public function project() 
    { 
        return $this->belongsTo( 
            Project::class 
        ); 
    } 
}