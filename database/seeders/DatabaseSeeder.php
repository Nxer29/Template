<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Role::create(['name' => 'admin']);

        $Admin = User::create([
            'name' => 'admin',
            'email' => 'test@example.com',
            'password' => bcrypt('secret'),
        ]);

        $Admin->assignRole('admin');

        // spatie library default admin user after seeding "php artisan migrate:fresh --seed"
        // to get the library you need 3 to 4 executable commands->
        // "composer require spatie/laravel-permission" 2nd command -> "php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
        // 3rd command" php artisan optimize:clear  #or  php artisan config:clear" 1 van de 2 gebruiken na de 2nd command en dan kan je het 4de command uitvoeren
        // 4th command " php artisan migrate" migrating is necessary for the migration that was made when installing the library,
        // then you make a default admin user like here above in the database seeder
        //when you want to use the library you need to do 2 or 3 more things you need to add the following
        // in the database seeder in the use something section you need to place "use Spatie\Permission\Models\Role;" so that de seeder knows what he needs to have to use and make the role
        // then place in you're use something section "use Spatie\Permission\Traits\HasRoles;" in the user model then place in the same model but in the class variable
        // "use HasRoles;" so that the user model can use the library and then you can assign the role to the user like here above in the database seeder "$Admin->assignRole('admin');"
    }
}
