<?php

namespace App\Traits;

use App\Scopes\TenantScope;

trait BelongsTenantScope
{
    //depois que a model inicializa, rode este comando
    // ao buscar uma loja, a loja achada será a do user que está logado (session)
    protected static function booted()
    {
        static::addGlobalScope(new TenantScope());
    }
}
