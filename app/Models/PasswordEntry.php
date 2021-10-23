<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class PasswordEntry extends Model
{
    use HasFactory;
    protected $table = 'password_entries';
    protected $primaryKey = 'id';
    public function getDecryptedValue()
    {
        return Crypt::decryptString($this->getAttribute('saved_password'));
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
