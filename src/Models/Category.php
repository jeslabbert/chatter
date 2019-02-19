<?php

namespace DevDojo\Chatter\Models;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use UsesTenantConnection;
    protected $table = 'chatter_categories';
    public $timestamps = true;
    public $with = 'parents';

    public function discussions()
    {
        return $this->hasMany(Models::className(Discussion::class),'chatter_category_id');
    }

    public function parents()
    {
        return $this->hasMany(Models::classname(self::class), 'parent_id')->orderBy('order', 'asc');
    }
}
