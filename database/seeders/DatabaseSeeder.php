<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Store;
use App\Models\Tenant;
use App\Scopes\TenantScope;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Tenant::factory(10)
                    ->hasStores(1)
                    ->create();

        //remover o escopo para
        //desligue o BelongsTenantScope, comente a linha 17 e rode sua seed
        foreach(Store::withoutGlobalScope(TenantScope::class)->get() as $store) {

            $tenantAndStoreIds = ['store_id' => $store->id, 'tenant_id' => $store->tenant_id];

            Product::factory(20, $tenantAndStoreIds)
                ->create();
        }
            }
}
