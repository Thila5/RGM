<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProjectMilestone extends Model
{
    use HasFactory;

    // Explicitly telling Laravel to not manage the default timestamps
    public $timestamps = false;

    protected $fillable = [
        'research_grant_id',
        'milestone_name',
        'target_completion_date',
        'deliverable',
        'status',
        'remark',
        'date_updated',
    ];

    // You can manually update the 'date_updated' field during updates
    protected static function booted()
    {
        static::updating(function ($milestone) {
            // Update 'date_updated' when the model is updated
            $milestone->date_updated = now();
        });
    }

    public function researchGrant()
    {
        return $this->belongsTo(ResearchGrant::class);
    }
}


