<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriModel extends Model
{
    public $table = "galeri";
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gambar1',
        'gambar2',
        'gambar3',
    ];

    public function pelatihan()
    {

        return $this->belongsTo(PelatihanModel::class);
    }
}
