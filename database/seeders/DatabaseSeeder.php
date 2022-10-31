<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Store;
use App\Models\Tenant;
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

        foreach(Store::all() as $store) {

            $tenantAndStoreIds = ['store_id' => $store->id, 'tenant_id' => $store->tenant_id];

            Product::factory(20, $tenantAndStoreIds)
                ->create();
        }
            }
}
