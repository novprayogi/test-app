<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $file = storage_path('json/permission.json');
            if ( !file_exists($file) ) {
                $this->command->error("File {$file} tidak ada.");
                return;
            }

            $data = json_decode(file_get_contents($file), true);
            if ( json_last_error() != JSON_ERROR_NONE ) {
                $this->command->error('Error pada saat mendecode data.');
                return;
            }

            $dataCount = sizeof($data);
            if ( $dataCount == 0 ) {
                $this->command->warn( 'data tidak ada');
                return;
            }

            DB::beginTransaction();
            foreach ( $data as $d ) {
                $seed = Permission
                    ::create([
                        'id'            => $d['id'],
                        'name'          => $d['name'],
                        'guard_name'    => $d['guard_name'],
                    ]);

                if ( !$seed ) {
                    $this->command->error('gagal melakukan penambahan data seeder');
                    DB::rollBack();
                    return;
                }
            }
            DB::commit();
        } catch ( Throwable $t ) {
            DB::rollBack();
            $this->command->error($t->getMessage());

        }
    }
}
