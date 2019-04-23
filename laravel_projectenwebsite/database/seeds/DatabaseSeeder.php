<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(create_comments_seeder::class);
        $this->call(create_groups_seeder::class);
        $this->call(create_projects_seeder::class);
        $this->call(create_students_seeder::class);
        $this->call(create_teachers_seeder::class);
        $this->call(create_users_seeder::class);
        $this->call(create_externs_seeder::class);
        $this->call(create_smartcriteria_seeder::class);
    }
}
