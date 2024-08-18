<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Holiday;
use App\Models\PermissionRole;
use App\Models\RoleUser;
use App\Models\Shift;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@fredika.web.id',
            'password' => Hash::make('12345678'),
        ]);

        User::factory()->create([
            'name' => 'Maya User',
            'email' => 'maya@fredika.web.id',
            'password' => Hash::make('12345678'),
        ]);

        $this->call([
            CompanySeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            PermissionRoleSeeder::class,
            DepartmentSeeder::class,
            DesignationSeeder::class,
            ShiftSeeder::class,
            BasicSalarySeeder::class,
            RoleUserSeeder::class,
            HolidaySeeder::class,
            LeaveTypeSeeder::class,
            LeaveSeeder::class,
            AttendanceSeeder::class,
        ]);
    }
}
