<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'user';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
                    ->select('user.*', 'kelas.nama_kelas as nama_kelas')
                    ->get();
    }

    public function getUser()
    {
        return DB::table('user')
            ->join('kelas', 'kelas.id', '=', 'user.kelas_id')
            ->select(
                'user.id',
                'user.nama',
                'user.nim',
                'kelas.nama_kelas'
            )
            ->get();
    }
}