<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama_buku', 'kategori', 'deskripsi', 'kategori', 'tanggal_terbit', 'id_penulis', 'cover'];
    public $timestamps = true;

    public function penulis()
    {
        return $this->BelongsTo(Penulis::class, 'id_penulis');
    }

    //menghapus img
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/buku' . $this->cover))) {
            return unlink(public_path('images/buku' . $this->cover));
        }
    }
}
