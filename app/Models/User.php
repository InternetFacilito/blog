<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* Setter y Getter para modificar texto de los campos de BD */
    protected function name(): Attribute
    {
        return new Attribute (

            /*
            // Mutador
            set: function($value){
                return strtolower($value);
            },
            // Accesor
            get: function($value){
                    return ucwords($value) . ' - Modificado';
            
            }
            */
            /* Funciones Flecha de PHP  */
            set: fn($value) => strtolower($value),
            get: fn($value) => ucwords($value)

        );
    }
}
