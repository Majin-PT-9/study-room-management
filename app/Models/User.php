<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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

    const ROLE_ROOT     = 0;
    const ROLE_ADMIN    = 1;
    const ROLE_TEACHER  = 2;
    const ROLE_STUDENT  = 3;


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
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function teachers()
    {
        return $this->belongsToMany(User::class, 'teachers_students', 'student_id', 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'teachers_students', 'teacher_id', 'student_id');
    }

    public function isRoot()
    {
        return $this->role_id === self::ROLE_ROOT ? true : false;
    }
    public function isAdmin()
    {
        return $this->role_id === self::ROLE_ADMIN ? true : false;
    }
    public function isTeacher()
    {
        return $this->role_id === self::ROLE_TEACHER ? true : false;
    }
    public function isStudent()
    {
        return $this->role_id === self::ROLE_STUDENT ? true : false;
    }
}
