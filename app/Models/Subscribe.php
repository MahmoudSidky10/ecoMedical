<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Subscribe
 *
 * @property int $id
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscribe whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Subscribe extends Model
{
    protected $fillable = ["email"];
}
