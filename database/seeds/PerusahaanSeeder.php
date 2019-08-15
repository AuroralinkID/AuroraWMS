<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Truncating User, Role and Permission tables');
        $this->truncateLaratrustTables();

        $config = config('laratrust_seeder.role_structure');
        $userPermission = config('laratrust_seeder.permission_structure');
        $mapPermission = collect(config('laratrust_seeder.permissions_map'));

        foreach ($config as $key => $modules) {

            // Create a new role
            $kategori = \App\Kategori::create([
                'name' => $key,
                'warna' => $key,
                'description' => $key
            ]);


            $this->command->info('Creating Role '. strtoupper($key));

            // Reading role permission modules
            foreach ($modules as $module => $value) {

                foreach (explode(',', $value) as $p => $perm) {

                    $permissionValue = $mapPermission->get($perm);

                    $perusahaan = \App\Perusahaan::firstOrCreate([
                        'name'  => 'Auroralink Indonesia',
                        'alamat' => 'Jl Kertopaten no 45',
                        'telepon'  => '085656768',
                        'email' => 'auau@co.co',
                        'website'  => 'auroralink.id',
                        'npwp' => '082921892',
                        'logo'  => 'enak',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ])->id;


                }
            }

            // Attach all permissions to the role
            $kategori->perusahaan()->sync($perusahaan);

            $this->command->info("Creating '{$key}' user");

            // Create default user for each role
            $perusahaan = \App\Perusahaan::create([
                'name'  => 'Auroralink Indonesia',
                'alamat' => 'Jl Kertopaten no 45',
                'telepon'  => '085656768',
                'email' => 'auau@co.co',
                'website'  => 'auroralink.id',
                'npwp' => '082921892',
                'logo'  => 'enak',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $perusahaan->attachRole($kategori);
        }
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return    void
     */
    public function truncateLaratrustTables()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('jperusahaan')->truncate();
        DB::table('cat_perusahaan')->truncate();
        \App\Perusahaan::truncate();
        \App\Kategori::truncate();
        \App\Jenis::truncate();
        Schema::enableForeignKeyConstraints();
    }
}



