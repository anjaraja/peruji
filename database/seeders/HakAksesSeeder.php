<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HakAkses;
use App\Models\GrupAkses;

class HakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //BEGIN ADMINISTRATOR
            if (!HakAkses::where(['idgrupakses'=>1, 'idmenu'=>1])->first()){
                HakAkses::create(
                    ['idgrupakses' => 1,'idmenu' => 1,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
                );
            }
            if (!HakAkses::where(['idgrupakses'=>1, 'idmenu'=>2])->first()){
                HakAkses::create(
                    ['idgrupakses' => 1,'idmenu' => 2,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
                );
            }
            if (!HakAkses::where(['idgrupakses'=>1, 'idmenu'=>3])->first()){
                HakAkses::create(
                    ['idgrupakses' => 1,'idmenu' => 3,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
                );
            }
            if (!HakAkses::where(['idgrupakses'=>1, 'idmenu'=>4])->first()){
                HakAkses::create(
                    ['idgrupakses' => 1,'idmenu' => 4,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
                );
            }
            if (!HakAkses::where(['idgrupakses'=>1, 'idmenu'=>5])->first()){
                HakAkses::create(
                    ['idgrupakses' => 1,'idmenu' => 5,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
                );
            }
            if (!HakAkses::where(['idgrupakses'=>1, 'idmenu'=>6])->first()){
                HakAkses::create(
                    ['idgrupakses' => 1,'idmenu' => 6,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
                );
            }
        //END ADMINISTRATOR

        //BEGIN MEMBERSHIP
            if (!HakAkses::where(['idgrupakses'=>2, 'idmenu'=>7])->first()){
                HakAkses::create(
                    ['idgrupakses' => 2,'idmenu' => 7,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
                );
            }
            if (!HakAkses::where(['idgrupakses'=>2, 'idmenu'=>8])->first()){
                HakAkses::create(
                    ['idgrupakses' => 2,'idmenu' => 8,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
                );
            }
            if (!HakAkses::where(['idgrupakses'=>2, 'idmenu'=>9])->first()){
                HakAkses::create(
                    ['idgrupakses' => 2,'idmenu' => 9,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
                );
            }
            if (!HakAkses::where(['idgrupakses'=>2, 'idmenu'=>10])->first()){
                HakAkses::create(
                    ['idgrupakses' => 2,'idmenu' => 10,'action' => json_encode(["view","create","update","delete"]),'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
                );
            }
        //END ADMINISTRATOR


        if (!GrupAkses::where(['groupname'=>'Administrator'])->first()){
            GrupAkses::create(
                ['groupname' => "Administrator", 'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
            );
        }
        if (!GrupAkses::where(['groupname'=>'Member'])->first()){
            GrupAkses::create(
                ['groupname' => "Member", 'activestatus' => 1,'created_by' => "System",'modified_by' => "System"]
            );
        }
    }
}
