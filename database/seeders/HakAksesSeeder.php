<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HakAkses;

class HakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (!HakAkses::where(['iduser'=>1, 'idmenu'=>1])->first()){
            HakAkses::create(
                ['iduser' => 1,'idmenu' => 1,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
            );
        }
        if (!HakAkses::where(['iduser'=>1, 'idmenu'=>2])->first()){
            HakAkses::create(
                ['iduser' => 1,'idmenu' => 2,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
            );
        }
        if (!HakAkses::where(['iduser'=>1, 'idmenu'=>3])->first()){
            HakAkses::create(
                ['iduser' => 1,'idmenu' => 3,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
            );
        }
        if (!HakAkses::where(['iduser'=>1, 'idmenu'=>4])->first()){
            HakAkses::create(
                ['iduser' => 1,'idmenu' => 4,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
            );
        }
        if (!HakAkses::where(['iduser'=>1, 'idmenu'=>5])->first()){
            HakAkses::create(
                ['iduser' => 1,'idmenu' => 5,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
            );
        }
        if (!HakAkses::where(['iduser'=>1, 'idmenu'=>6])->first()){
            HakAkses::create(
                ['iduser' => 1,'idmenu' => 6,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
            );
        }
    }
}
