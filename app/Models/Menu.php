<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'menu_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'menu_name',
        'menu_url',
        'menu_parent',
        'menu_type',
        'menu_order',
        'menu_icon',
        'menu_description',
        'status',
    ];

    /**
     * Get the menu roles for the menu.
     */
    public function menuRoles(): HasMany
    {
        return $this->hasMany(MenuRole::class, 'menu_id', 'menu_id');
    }

    /**
     * Get the child menus.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Menu::class, 'menu_parent', 'menu_id');
    }
}