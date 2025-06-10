<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';
    protected $fillable = [
        'user_id',
        'judul',
        'isi',
        'lampiran',
        'komentar_admin',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
