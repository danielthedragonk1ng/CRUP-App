<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
    ];

    /**
     * Relasi ke MataKuliah
     */
    public function mataKuliahs()
    {
        return $this->hasMany(MataKuliah::class);
    }
}