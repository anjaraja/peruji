<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\UserProfile;
use App\Models\Menu;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        $userprofile = UserProfile::where('userid', $this->id)->first();
        $menu = Menu::select("menu.menuname","menu.icon","menu.route")
            ->join("hakakses","hakakses.idmenu","=","menu.id")
            ->where('hakakses.iduser', $this->id)
            ->where('hakakses.activestatus', 1)
            ->where('menu.activestatus', 1)
            ->orderBy("menu.position")
            ->get();
        return [
            'name' => $this->email,
            'userprofile' => $userprofile ?? [],
            'menu' => $menu ?? [],
        ];
    }
}
