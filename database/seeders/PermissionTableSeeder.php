<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete',
           'category-list',
           'category-create',
           'category-edit',
           'category-delete',
           'brand-list',
           'brand-create',
           'brand-edit',
           'brand-delete',
           'sale-list',
           'sale-create',
           'sale-edit',
           'sale-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete'
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
