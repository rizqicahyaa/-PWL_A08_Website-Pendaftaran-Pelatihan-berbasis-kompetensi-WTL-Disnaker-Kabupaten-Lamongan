<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranModel extends Model
{
    public $table = "riwayatpelatihan";
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'pelatihan_id',
        'datapeserta_id',
        'tglpendaftaran',
        'nopendaftaran',
        'status',
    ];

    public function pelatihan()
    {

        return $this->hasMany(PelatihanModel::class);
    }
    public function datapeserta()
    {

        return $this->hasMany(datapeserta::class);
    }
    public function user()
    {

        return $this->hasMany(User::class);
    }
}
