<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanModel extends Model
{
    public $table = "pelatihan";
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pelatihan',
        'tglmulaipelatihan',
        'tglakhirpelatihan',
        'tglmulaipendaftaran',
        'tglakhirpendaftaran',
        'lokasi',
        'deskripsi',
        'fasilitas',
        'gambar',
        'status',
        'ktp',
        'skd',
    ];
    public function galeri()
    {

        return $this->belongsTo(GaleriModel::class);
    }
    public function pendaftaran()
    {

        return $this->belongsTo(PendaftaranModel::class, 'pelatihan_id', 'id');
    }
}
