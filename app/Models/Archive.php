<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    public function instructors(){
        $this->hasMany(ArchiveInstructor::class);
    }

    public function subjects(){
        $this->hasMany(ArchiveSubject::class);
    }

}
