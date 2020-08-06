<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesPermissionSeeder extends Seeder
{   
    private $roles;
    private $permissions;

    public function __construct(){
        $this->setPermission();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPermission();
        $this->adminRole();
        $this->guestRole();
        $this->assignAdminRole();
    }

    public function setPermission(){

        $permissions = [
            ['name' => 'posts.index'],
            ['name' => 'posts.show'],
            ['name' => 'posts.create'],
            ['name' => 'posts.edit'],
            ['name' => 'posts.delete']
        ];

        $this->permissions = $permissions;
    }

    public function createPermission(){

        foreach($this->permissions as $permission){
            Permission::create($permission);
        }
    }

    public function createRole(array $role){
        return Role::create($role);
    }

    public function adminRole(){

        $admin = $this->createRole(['name'=>'admin']);
        $admin->syncPermissions($this->permissions);
    }

    public function guestRole(){
        $guest = $this->createRole(['name'=>'guest']);
        $guest->syncPermissions([
            'posts.index',
            'posts.show',
            'posts.create'
        ]);
    }

    public function assignAdminRole(){
        $user = User::find(1);//get admin user
        $user->assignRole('admin');
    }
    
}
