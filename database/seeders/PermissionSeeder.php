<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermissionArray = [
       'Access Dashbord',
       ];
       $rolePermissionArray = [
        'Index Role',
        'Create Role',
        'Edit Role',
        'Delete Role',
       ];
       $userPermissionArray = [
        'Index User',
        'Create User',
        'Edit User',
        'Delete User',
       ];

       //admin Dashboard Permission
       $adminDashboardModule = Module::where('module_name','Admin Dashboard')->select('id')->first();

       Permission::updateOrCreate([
      'module_id'=>$adminDashboardModule->id,
      'permission_name'=>$adminPermissionArray[0],
      'permission_slug'=>Str::slug($adminPermissionArray[0]),
       ]);

       //role Management Permission
       $roleManagementModule = Module::where('module_name','Role Management')->select('id')->first();

     for($i=0; $i<count($rolePermissionArray); $i++){
        Permission::updateOrCreate([
            'module_id'=>$roleManagementModule->id,
            'permission_name'=>$rolePermissionArray[$i],
            'permission_slug'=>Str::slug($rolePermissionArray[$i]),
             ]);
     }
       //user Management Permission
       $userManagementModule = Module::where('module_name','Role Management')->select('id')->first();

     for($i=0; $i<count($userPermissionArray); $i++){
        Permission::updateOrCreate([
            'module_id'=>$userManagementModule->id,
            'permission_name'=>$userPermissionArray[$i],
            'permission_slug'=>Str::slug($userPermissionArray[$i]),
             ]);
     }
    }
}
