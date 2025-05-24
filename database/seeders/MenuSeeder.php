<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (!Menu::where('menuname', 'Dashboard')->first()){
            Menu::create(
                [
                    'menuname' => 'Dashboard',
                    'position' => 1,
                    'icon' => null,
                    'route' => 'dashboard-index',
                    'parent' => null,
                    'activestatus' => 0,
                    'created_by' => "System",
                    'modified_by' => "System"
                ]
            );
        }

        if (!Menu::where('menuname', 'Upcoming Events')->first()){
            Menu::create(
                [
                    'menuname' => 'Upcoming Events',
                    'position' => 2,
                    'icon' => null,
                    'route' => 'upcoming-events',
                    'parent' => null,
                    'activestatus' => 1,
                    'created_by' => "System",
                    'modified_by' => "System"
                ]
            );
        }

        if (!Menu::where('menuname', 'Previous Events')->first()){
            Menu::create(
                [
                    'menuname' => 'Previous Events',
                    'position' => 3,
                    'icon' => null,
                    'route' => 'previous-events',
                    'parent' => null,
                    'activestatus' => 1,
                    'created_by' => "System",
                    'modified_by' => "System"
                ]
            );
        }

        if (!Menu::where('menuname', 'Newsroom')->first()){
            Menu::create(
                [
                    'menuname' => 'Newsroom',
                    'position' => 4,
                    'icon' => null,
                    'route' => 'newsroom',
                    'parent' => null,
                    'activestatus' => 1,
                    'created_by' => "System",
                    'modified_by' => "System"
                ]
            );
        }

        if (!Menu::where('menuname', 'Admin Emails')->first()){
            Menu::create(
                [
                    'menuname' => 'Admin Emails',
                    'position' => 5,
                    'icon' => null,
                    'route' => 'admin-emails-index',
                    'parent' => null,
                    'activestatus' => 1,
                    'created_by' => "System",
                    'modified_by' => "System"
                ]
            );
        }

        if (!Menu::where('menuname', 'Membership')->first()){
            Menu::create(
                [
                    'menuname' => 'Membership',
                    'position' => 6,
                    'icon' => null,
                    'route' => 'membership-index',
                    'parent' => null,
                    'activestatus' => 0,
                    'created_by' => "System",
                    'modified_by' => "System"
                ]
            );
        }
    }
}
