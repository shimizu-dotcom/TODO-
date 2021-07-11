<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Todo;
use DateTime;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bodys = ['JCBギフト券を換金する','ゼルダの伝説をする','conohaのVPSで立ち上げをする'];
        foreach ($bodys as $body) {
            DB::table('todos')->insert([
                'body' => $body,
                'created_at' => new Datetime(),
                'updated_at' => new Datetime()
            ]);
        }
    }
}
