<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'name',
        'front_degree',
        'back_degree',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'number_handphone',
        'address',
        'number_handphone',
        'rt',
        'rw',
        'village',
        'subdistrict',
        'city',
        'province',
        'postal_code'
    ];
    public function Show()
    {
        return $this->latest()->get();
    }
    public function Store($data)
    {
        return $this->create($data);
    }
    public function Edit($id, $data)
    {
        return $this->find($id)->update($data);
    }
}
