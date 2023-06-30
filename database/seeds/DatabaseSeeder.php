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
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(PackagePlanSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(CoinPlanSeeder::class);
        $this->call(CoinPlanUserSeeder::class);
        $this->call(RangeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(QuotationSeeder::class);
        $this->call(FreelancerEducationSeeder::class);
        $this->call(FreelancerExperienceSeeder::class);
        $this->call(FreelancerProjectSeeder::class);
        $this->call(SkillForFreelancerSeeder::class);
        $this->call(FreelancerSeeder::class);
        $this->call(FreelancerStatusSeeder::class);
        $this->call(FreelancerSkillSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(CategoryCompanySeeder::class);
        $this->call(CompanyPackagePlanSeeder::class);
        $this->call(AdvertisingSeeder::class);
        $this->call(CompanyCompanyAdvertisingPlanSeeder::class);
        $this->call(CompanyProductSeeder::class);
        $this->call(CompanyProjectSeeder::class);
        $this->call(CompanyServiceSeeder::class);
        $this->call(DailyProductPriceSeeder::class);
        $this->call(MyanBoxTubeSeeder::class);
        $this->call(ProjectPhotoSeeder::class);
        $this->call(FreelancerCommentSeeder::class);
        $this->call(FreelancerRateSeeder::class);        
    }
}
