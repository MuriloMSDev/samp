<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::firstOrCreate(['email' => 'admin@admin.com'], [
            'name'     => 'Admin',
            'password' => 'abc12345'
        ]);
    }
}
