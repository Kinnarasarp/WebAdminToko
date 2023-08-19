<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProduksSeeder extends Seeder
{
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $data = [
                [
                    'id' => 1,
                    'nama' => 'Kopi ABC',
                ],
                [
                    'id' => 2,
                    'nama' => 'Indomie Goreng',
                ],
                [
                    'id' => 3,
                    'nama' => 'Indomie Kari',
                ],
                [
                    'id' => 4,
                    'nama' => 'POP ICE',

                ],
                [
                    'id' => 5,
                    'nama' => 'Milo',

                ],
                [
                    'id' => 6,
                    'nama' => 'Teajus',

                ]
            ];

            foreach ($data as $key => $value) {
                DB::table('produks')->updateOrInsert(['id' => $value['id']], [
                    'nama' => $value['nama']
                ]);
            }

            $lastId = DB::table('produks')->orderBy('id', 'desc')->first();
            if (!empty($lastId)) {
                $newLastId = $lastId->id + 1;
                DB::update(DB::raw("ALTER SEQUENCE produks_id_seq RESTART WITH {$newLastId}"));
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            echo $ex->getMessage();
        }
    }
}
