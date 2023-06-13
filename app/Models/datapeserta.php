<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datapeserta extends Model
{
    public $table = "datapeserta";
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nik',
        'nohp',
        'umur',
        'alamatktp',
        'alamatdomisili',
        'pasfoto',
        'ijazah',
        'ktp',
        'skd',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pendaftaran()
    {

        return $this->hasMany(PendaftaranModel::class, 'datapeserta_id', 'id');
    }
}
