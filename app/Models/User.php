<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {

  use HasApiTokens, HasFactory, Notifiable;

  protected $fillable = [
    'name',
    'lastname',
    'email',
    'phone',
    'password',
  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  // ---------------------------------------------------------------------------------------
  public function chats() {
    return $this->belongsToMany(Chat::class);
  }

  // ---------------------------------------------------------------------------------------
  public function messages() {
    return $this->hasMany(Message::class);
  }
}
