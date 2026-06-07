// app/Models/Advertisement.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'url',
        'location', // e.g., 'popup', 'sidebar', etc.
        'status',   // boolean active/inactive
        'clicks',
        'impressions',
    ];
}
?>
