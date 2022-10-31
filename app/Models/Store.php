<?php

namespace App\Models;


use App\Traits\BelongsTenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //BelongTenantScope pega o tenant_id da session e aplica nesta model (where)
    // para filtrar as store do user logado
    use HasFactory, BelongsTenantScope;

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
