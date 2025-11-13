<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MembershipBenefit;

class MembershipBenefitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!MembershipBenefit::where('name', 'member')->first()){
            MembershipBenefit::create(
                [
                    'name' => 'member',
                    'description' => "",
                    'activestatus' => 0,
                    'created_by' => "System",
                    'modified_by' => "System"
                ]
            );
        }
        if (!MembershipBenefit::where('name', 'special')->first()){
            MembershipBenefit::create(
                [
                    'name' => 'special',
                    'description' => "",
                    'activestatus' => 0,
                    'created_by' => "System",
                    'modified_by' => "System"
                ]
            );
        }
        if (!MembershipBenefit::where('name', 'Management')->first()){
            MembershipBenefit::create(
                [
                    'name' => 'executive',
                    'description' => "",
                    'activestatus' => 0,
                    'created_by' => "System",
                    'modified_by' => "System"
                ]
            );
        }
        if (!MembershipBenefit::where('name', 'Priority')->first()){
            MembershipBenefit::create(
                [
                    'name' => 'priority',
                    'description' => "",
                    'activestatus' => 0,
                    'created_by' => "System",
                    'modified_by' => "System"
                ]
            );
        }
    }
}
