<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];


    //cara seperti ini bisa dibukan untuk menyembunyikan beberapa response
    //akan tetapi tidak bisa di gunakan untuk API karena jika model ini
    //akan digunakan selain di API maka akan jadi problem tersendiri
    //untuk ini kita butuh untuk menggunakan php artisan sersource

    protected $hidden = ['created_at','updated_at'];
    protected $appends = ['tanggal'];
    public function getTanggalAttribute()
    {
    	return $this->created_at->diffForHumans();
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
