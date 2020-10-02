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
        // Account
        $this->call(UsersTableSeeder::class);

        // Merchant
        $this->call(PlansTableSeeder::class);
        $this->call(CouponsTableSeeder::class);

        // Education
        $this->call(StudentAdmissionFormTableSeeder::class);
        $this->call(TutorAdmissionFormTableSeeder::class);

        $this->call(StudentAuditionFormTableSeeder::class);
        $this->call(TutorAuditionFormTableSeeder::class);

        factory(App\Models\Account\UserModel::class, 100)->create();
    }
}
