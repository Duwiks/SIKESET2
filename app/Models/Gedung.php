<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gedung extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'gedungs';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kategori_id', 'nama'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}