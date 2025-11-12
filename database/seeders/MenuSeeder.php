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
                    'activestatus' => 1,
                    'created_by' => "System",
                    'modified_by' => "System"
                ]
            );
        }

        if (!Menu::where('menuname', 'Membership Benefits')->first()){
            Menu::create(
                [
                    'menuname' => 'Membership Benefits',
                    'position' => 11,
                    'icon' => null,
                    'route' => 'membership-benefits-index',
                    'parent' => null,
                    'activestatus' => 1,
                    'created_by' => "System",
                    'modified_by' => "System"
                ]
            );
        }

        // PART MEMBER MENU
            if (!Menu::where('menuname', 'Personal Information')->first()){
                Menu::create(
                    [
                        'menuname' => 'Personal Information',
                        'position' => 7,
                        'icon' => null,
                        'route' => 'personal-information-index',
                        'parent' => null,
                        'activestatus' => 1,
                        'created_by' => "System",
                        'modified_by' => "System"
                    ]
                );
            }
            if (!Menu::where('menuname', 'Membership Status')->first()){
                Menu::create(
                    [
                        'menuname' => 'Membership Status',
                        'position' => 8,
                        'icon' => null,
                        'route' => 'membership-status-index',
                        'parent' => null,
                        'activestatus' => 1,
                        'created_by' => "System",
                        'modified_by' => "System"
                    ]
                );
            }
            if (!Menu::where('menuname', 'Document & Resources')->first()){
                Menu::create(
                    [
                        'menuname' => 'Document & Resources',
                        'position' => 9,
                        'icon' => null,
                        'route' => 'document-resources-index',
                        'parent' => null,
                        'activestatus' => 1,
                        'created_by' => "System",
                        'modified_by' => "System"
                    ]
                );
            }
            if (!Menu::where('menuname', 'Change Password')->first()){
                Menu::create(
                    [
                        'menuname' => 'Change Password',
                        'position' => 10,
                        'icon' => null,
                        'route' => 'change-password-index',
                        'parent' => null,
                        'activestatus' => 1,
                        'created_by' => "System",
                        'modified_by' => "System"
                    ]
                );
            }
        // END PART MEMBER MENU
    }
}
