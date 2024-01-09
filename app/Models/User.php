<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'birth_date',
        'phone2',
        'phone1',
        'accession_date',
        'description',
        'registered_by',
        'status_id',
        'role_id',
        'company_id',
        'gender_id'
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
        'password' => 'hashed',
    ];

    protected $with = ['role', 'gender'];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($item) {
            $item->company_id = Auth::user()->company_id;
        });
    }

    public function scopeMyUsers($query)
    {
        $userLogged = Auth::user();
        if(!$userLogged->isMaster()) {    
            $query->where('company_id', $userLogged->company_id);
        }

        return $query;
    }

    public function scopeMyClients($query)
    {
        $userLogged = Auth::user();
        if(!$userLogged->isMaster()) {    
            $query->where('company_id', $userLogged->company_id)
            ->where('role_id', RoleEnum::CLIENTE->value);
        }

        return $query;
    }

    

    public function isMaster(): bool
    {
        return $this->role_id === RoleEnum::MASTER->value;
    }

    public function gender() {
        return $this->hasOne(UserGender::class, 'id', 'gender_id');
    }

    public function company() {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
    public function role() {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function status() {
        return $this->hasOne(UserStatus::class, 'id', 'status_id');
    }
}
