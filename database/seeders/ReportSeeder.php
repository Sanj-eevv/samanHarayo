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
        Report::factory()->count(50)->create()->each(function ($report){
            if($report->report_type === 'lost' ) {
                Payment::factory()->create([
                    'report_id' => $report->id,
                ]);

                if ($report->id % 9 === 0) {
                    Reward::factory()->create([
                        'report_id' => $report->id,
                    ]);
                }

                if ($report->id % 7) {
                    Feature::factory()->create([
                        'feature_image' => $this->faker->image(storage_path('app/public/uploads/report/' . $report->reported_by . '/feature_image'), 400, 300, 'Featured Photo', false),
                        'report_id' => $report->id
                    ]);
                }
            }

            Location::factory()->create([
                'report_id'     =>          $report->id,
            ]);

            $user = $report->reported_by;

            ItemImage::factory(rand(4,8))->create([
                'image'                 =>      $this->faker->image(storage_path('app/public/uploads/report/'.$user.'/item_image'), 400, 300, 'Product Image', false),
                'report_id'             =>      $report->id,
            ]);
        });
    }
}
