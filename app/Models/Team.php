<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';

    protected $fillable = [
        'team_name',
        'team_title',
        'team_image',
        'team_facebook',
        'team_twitter',
        'team_linkedin',
        'team_instagram',
    ];
}
