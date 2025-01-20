<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'instructors' => 'array',
            'subjects' => 'array',
        ];
    }

    public function instructors(){
        $this->hasMany(ArchiveInstructor::class);
    }

    public function subjects(){
        $this->hasMany(ArchiveSubject::class);
    }

}
