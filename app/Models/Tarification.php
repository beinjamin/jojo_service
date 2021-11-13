<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarification extends Model
{
    use HasFactory;
    public function duree_locations()
    {
        return $this->belongsTo(DureeLocation::class, "duree_loction_id", "id");
    }
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
