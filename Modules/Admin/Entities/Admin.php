<?php

namespace Modules\Admin\Entities;

use App\Models\Media;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Admin\Database\factories\AdminFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Morilog\Jalali\CalendarUtils;

/**
 * @property mixed $created_at
 * @property mixed $mobile
 * @property mixed $name
 * @property mixed $last_name
 */
class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = ['uuid', 'name', 'last_name', 'email', 'mobile', 'password', 'national_code'];
    protected $appends = ['jalali_created_at', 'jalali_created_at_forge', 'jalali_updated_at', 'jalali_updated_at_forge'];

    protected $hidden = ['password'];

    protected static function newFactory(): AdminFactory
    {
        return AdminFactory::new();
    }

    //todo move bellow methods to trait
    public function getJalaliCreatedAtAttribute(): mixed
    {
        return CalendarUtils::strftime('Y-m-d', $this->created_at);
    }


    public function getJalaliCreatedAtForgeAttribute(): mixed
    {
        return CalendarUtils::strftime('Y-m-d', $this->created_at);
    }


    public function getJalaliUpdatedAtAttribute(): mixed
    {
        return CalendarUtils::strftime('Y-m-d', $this->created_at);
    }


    public function getJalaliUpdatedAtForgeAttribute(): mixed
    {
        return CalendarUtils::strftime('Y-m-d', $this->created_at);
    }


    public function image(): MorphOne
    {
        return $this->morphOne(Media::class, 'singleMediaFile', 'media_type', 'media_id');
    }
}
