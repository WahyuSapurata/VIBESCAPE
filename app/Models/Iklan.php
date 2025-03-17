<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Iklan extends Model
{
    use HasFactory;

    protected $table = 'iklans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'uuid',
        'judul_iklan',
        'thumbnail',
        'link',
    ];

    protected static function boot()
    {
        parent::boot();

        // Event listener untuk membuat UUID sebelum menyimpan
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }
}
