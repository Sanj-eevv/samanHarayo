<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\ItemImage;
use App\Models\Location;
use App\Models\Payment;
use App\Models\ProductImage;
use App\Models\Report;
use App\Models\Reward;
use Database\Factories\FeatureFactory;
use Database\Factories\ProductImageFactory;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ReportSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::upsert([
            [
                'title'                 =>                'Samsung S22 6gb Ram',
                'slug'                  =>                'samsung-s22-6gb-ram',
                'description'           =>                 $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
                'reported_by'           =>                 1,
                'category_id'           =>                 1,
                'brand'                 =>                 'Samsung',
                'report_type'           =>                 'lost',
                'verified'              =>                 1,
                'contact_number'        =>                 "9812380822",
                'contact_email'         =>                 "sanjeevvsanjeev1@gmail.com",
                'verified_user'         =>                 null,
                'created_at'            =>                 now(),
                'updated_at'            =>                 now(),
            ],
            [
                'title'                 =>                'I lost My Bag',
                'slug'                  =>                'i-lost-my-bag',
                'description'           =>                 $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
                'reported_by'           =>                 1,
                'category_id'           =>                 4,
                'brand'                 =>                 null,
                'report_type'           =>                 'lost',
                'verified'              =>                 1,
                'contact_number'        =>                 "9812380822",
                'contact_email'         =>                 "sanjeevvsanjeev1@gmail.com",
                'verified_user'         =>                 null,
                'created_at'            =>                 now(),
                'updated_at'            =>                 now(),
            ],
            [
                'title'                 =>                'Ear Ring',
                'slug'                  =>                'ear-ring',
                'description'           =>                 $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
                'reported_by'           =>                 2,
                'category_id'           =>                 2,
                'brand'                 =>                 null,
                'report_type'           =>                 'lost',
                'verified'              =>                 1,
                'contact_number'        =>                 "9815362308",
                'contact_email'         =>                 "sanjeevvsanjeev11@gmail.com",
                'verified_user'         =>                 null,
                'created_at'            =>                 now(),
                'updated_at'            =>                 now(),
            ],
            [
                'title'                 =>                'Guitar',
                'slug'                  =>                'guitar',
                'description'           =>                 $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
                'reported_by'           =>                 4,
                'category_id'           =>                 4,
                'brand'                 =>                 "Mantra",
                'report_type'           =>                 'lost',
                'verified'              =>                 1,
                'contact_number'        =>                 "9842030041",
                'contact_email'         =>                 "test@gmail.com",
                'verified_user'         =>                 null,
                'created_at'            =>                 now(),
                'updated_at'            =>                 now(),
            ],
            [
                'title'                 =>                'Laptop',
                'slug'                  =>                'laptop',
                'description'           =>                 $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
                'reported_by'           =>                 5,
                'category_id'           =>                 1,
                'brand'                 =>                 "Apple",
                'report_type'           =>                 'lost',
                'verified'              =>                 1,
                'contact_number'        =>                 "9842263674",
                'contact_email'         =>                 "test2@gmail.com",
                'verified_user'         =>                 null,
                'created_at'            =>                 now(),
                'updated_at'            =>                 now(),
            ],
            [
                'title'                 =>                'Citizenship Card',
                'slug'                  =>                'citizenship card',
                'description'           =>                 $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
                'reported_by'           =>                 1,
                'category_id'           =>                 3,
                'brand'                 =>                 null,
                'report_type'           =>                 'lost',
                'verified'              =>                 1,
                'contact_number'        =>                 "9842263674",
                'contact_email'         =>                 "sanjeevvsanjeev1@gmail.com",
                'verified_user'         =>                 null,
                'created_at'            =>                 now(),
                'updated_at'            =>                 now(),
            ],
            [
                'title'                 =>                'Laptop',
                'slug'                  =>                'laptop-1',
                'description'           =>                 $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
                'reported_by'           =>                 7,
                'category_id'           =>                 1,
                'brand'                 =>                 'Xiaomi',
                'report_type'           =>                 'found',
                'verified'              =>                 1,
                'contact_number'        =>                 "9842263674",
                'contact_email'         =>                 "sanjeevvsanjeev1@gmail.com",
                'verified_user'         =>                 null,
                'created_at'            =>                 now(),
                'updated_at'            =>                 now(),
            ],
            [
                'title'                 =>                'Mobile Phone',
                'slug'                  =>                'mobile-phone',
                'description'           =>                 $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
                'reported_by'           =>                 10,
                'category_id'           =>                 1,
                'brand'                 =>                 'Sony',
                'report_type'           =>                 'found',
                'verified'              =>                 1,
                'contact_number'        =>                 "9842263674",
                'contact_email'         =>                 "testfound@gmail.com",
                'verified_user'         =>                 null,
                'created_at'            =>                 now(),
                'updated_at'            =>                 now(),
            ],
            [
                'title'                 =>                'License',
                'slug'                  =>                'license',
                'description'           =>                 $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
                'reported_by'           =>                 9,
                'category_id'           =>                 3,
                'brand'                 =>                 null,
                'report_type'           =>                 'found',
                'verified'              =>                 1,
                'contact_number'        =>                 "9812380822",
                'contact_email'         =>                 "testfound2@gmail.com",
                'verified_user'         =>                 null,
                'created_at'            =>                 now(),
                'updated_at'            =>                 now(),
            ],
            [
                'title'                 =>                'Citizenship card',
                'slug'                  =>                'citizenship-card-1',
                'description'           =>                 $this->faker->paragraph(rand(5,10), $variableNbSentences = true),
                'reported_by'           =>                 10,
                'category_id'           =>                 3,
                'brand'                 =>                 null,
                'report_type'           =>                 'found',
                'verified'              =>                 1,
                'contact_number'        =>                 "9842263674",
                'contact_email'         =>                 "testfound2@gmail.com",
                'verified_user'         =>                 null,
                'created_at'            =>                 now(),
                'updated_at'            =>                 now(),
            ],
        ],[],[]);
        Report::all()->each(function ($q){
            Location::factory()->create([
                'report_id'     =>          $q->id,
            ]);
        });
    }
}
