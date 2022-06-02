<?php

namespace Tests\Feature;

use App\Helpers\SamanHarayoHelper;
use App\Models\Category;
use App\Models\Feature;
use App\Models\ItemImage;
use App\Models\Location;
use App\Models\Payment;
use App\Models\Report;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class LostReportTest extends TestCase
{
    use RefreshDatabase, WithFaker, DatabaseMigrations;
//    protected $endPoint = '/report-lost';
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        Config::set("app.settings.per_report_price", 40);
        Config::set("app.settings.stripe_secret_key", "sk_test_51JSbv0Db5yVTJO3Qa5KoH7zPcmwaGYTA8EetolGSAkaNFygGBsCb96HtYP5ClBzrA2KTUlu6YhQUuibvja04hUpw00R7Bq2G6e");
        config::set('app.settings.max_feature_days', 20);
    }

    public function test_lost_report_are_successfully_recorded_with_stripe_payment()
    {
        $user = $this->signInAsBasicUser();
        $this->withoutExceptionHandling();
        $category_attributes = [
            'name'              =>          'electronics',
        ];
        $category = Category::create($category_attributes);
        $report_attributes =  [
            'title'                 =>                'Samsung S22 6gb Ram',
            'slug'                  =>                 SamanHarayoHelper::uniqueSlugify('Samsung S22 6gb Ram', Report::class, null, 'slug'),
            'description'           =>                 'orta mattis tortor, sed maximus massa pretium vel. Sed at odio et lorem egestas facilisis. Praesent mattis nibh non placerat pulvinar. Vestibulum at tincidunt lectus. Nunc dapibus porta urna vel aliquam. Phasellus quis pellentesque nisi, et sodales tortor. Integer ut arcu vitae nisi euismod maximus. Proin fringilla quam vel luctus euismod. Morbi semper dictum
                                                        leo, vitae laoreet sapien suscipit et. Curabitur non lorem pharetra, suscipit massa at, viverra nunc. Cras eu nisl tellus. Nulla magna dui, lobortis vitae volutpat et, ultricies ut odio. Maecenas vitae suscipit dui. Aliquam fringilla aliquam mollis',
            'brand'                 =>                 'Samsung',
            'contact_number'        =>                 9812380822,
            'contact_email'         =>                 "sanjeevvsanjeev1@gmail.com",
            'category_id'           =>                  $category->id,
            'reported_by'           =>                  $user->id,
            'report_type'           =>                  Report::REPORT_TYPE_LOST,
        ];
        $location_attributes = [
            'latitude'              =>          "9122131",
            'longitude'             =>          "1313113",
            'address'               =>          'Nepal',
        ];
        $attributes = array_merge($report_attributes, $location_attributes);
        $results = [
            'title'                     =>              $attributes['title'],
            'slug'                      =>              SamanHarayoHelper::uniqueSlugify($attributes['title'], Report::class, null, 'slug'),
            'description'               =>              $attributes['description'],
            'reported_by'               =>              $user->id,
            'category_id'               =>              $attributes['category_id'],
            'brand'                     =>              $attributes['brand'],
            'report_type'               =>              Report::REPORT_TYPE_LOST,
            'contact_number'            =>              $attributes['contact_number'],
            'contact_email'             =>              $attributes['contact_email'],
        ];
        $this->post(url('/report-lost'),$attributes)
            ->assertStatus(302)
            ->assertRedirect('/checkout')
            ->assertSessionHas('report', $results)
            ->assertSessionHas('location', $location_attributes);

        $pre_payment_validation_attributes = ["_token" => csrf_token(), "total" => config::get('app.settings.per_report_price'), "currency" => "USD"];
        $this->get('/checkout');
        $this->post(url('/payment/pre-payment-validation'),$pre_payment_validation_attributes)
            ->assertSessionHas('total')
            ->assertStatus(200)
            ->assertJson(['successful_validation'=>'success']);

        $payment_confirmation_attribute = ['total' => config::get('app.settings.per_report_price'), 'paymentIntentId' => 0,"_token" => csrf_token(),];
        $this->post(url('/payment/stripe'),$payment_confirmation_attribute)
        ->assertStatus(200);


        $payment_attributes = ['transaction_id' => 'test', 'total' => \config('app.settings.per_report_price'), 'via' => "stripe", "_token" => csrf_token()];
        $this->post(url('/checkout/fulfill-order'),$payment_attributes);
        $this->assertDatabaseHas(Report::class, $results);
        $this->assertDatabaseHas(Payment::class, ["total" => \config('app.settings.per_report_price'), 'via' => 'stripe', 'transaction_id' => 'test']);
    }


    public function test_lost_report_item_image_and_feature_image_are_stored_in_database()
    {
        $user = $this->signInAsBasicUser();
        $this->withoutExceptionHandling();
        Storage::fake('local');
        $category_attributes = [
            'name'              =>          'electronics',
        ];
        $category = Category::create($category_attributes);
        $files = [UploadedFile::fake()->image('file1.png', 250, 150), UploadedFile::fake()->image('file2.png', 250, 150)];
        $featured_image = UploadedFile::fake()->image('file3.png', 250, 150);
        foreach ($files as $file){
            $imageName[] = SamanHarayoHelper::renameImageFileUpload($file);
        }
        $featured_image_name = SamanHarayoHelper::renameImageFileUpload($featured_image);
        $report_attributes =  [
            'title'                 =>                  'Samsung S22 6gb Ram',
            'slug'                  =>                  SamanHarayoHelper::uniqueSlugify('Samsung S22 6gb Ram', Report::class, null, 'slug'),
            'description'           =>                 'Description test',
            'brand'                 =>                 'Samsung',
            'contact_number'        =>                  9812380822,
            'contact_email'         =>                 "sanjeevvsanjeev1@gmail.com",
            'category_id'           =>                  $category->id,
            'reported_by'           =>                  $user->id,
            'report_type'           =>                  Report::REPORT_TYPE_LOST,
            'item_image'            =>                  $files,
            'is_featured'           =>                  true,
            'duration'              =>                  10,
            'featured_image'        =>                  $featured_image
        ];
        $location_attributes = [
            'latitude'              =>          '981s2313',
            'longitude'             =>          '1313s1313',
            'address'               =>          'Nepal',
        ];
        $attributes = array_merge($report_attributes, $location_attributes);
        $this->post(url('/report-lost'),$attributes);
        $pre_payment_validation_attributes = ["_token" => csrf_token(), "total" => config::get('app.settings.per_report_price'), "currency" => "USD"];
        $this->get('/checkout');
        $this->post(url('/payment/pre-payment-validation'),$pre_payment_validation_attributes);
        $payment_confirmation_attribute = ['total' => config::get('app.settings.per_report_price'), 'paymentIntentId' => 0,"_token" => csrf_token()];
        $this->post(url('/payment/stripe'),$payment_confirmation_attribute);

        $payment_attributes = ['transaction_id' => 'test', 'total' => \config('app.settings.per_report_price'), 'via' => "stripe", "_token" => csrf_token()];
        $this->post(url('/checkout/fulfill-order'),$payment_attributes);

        Storage::disk('local')->assertExists(["public/uploads/report/".$user->id."/item_image/".$imageName[0],"public/uploads/report/".$user->id."/item_image/".$imageName[1]]);
        Storage::disk('local')->assertExists("public/uploads/report/".$user->id."/feature_image/".$featured_image_name);
        $this->assertDatabaseHas(Feature::class, ['feature_image' => $featured_image_name]);
        $this->assertDatabaseHas(ItemImage::class, ['image' => $imageName[0]]);
        $this->assertDatabaseHas(ItemImage::class, ['image' => $imageName[1]]);

    }

    public function test_mime_type_of_uploaded_image(){
            $user = $this->signInAsBasicUser();
            $featured_image = UploadedFile::fake()->image('file3.pdf', 250, 150);
            $report_attributes =  [
                'title'                 =>                  'Samsung S22 6gb Ram',
                'slug'                  =>                  SamanHarayoHelper::uniqueSlugify('Samsung S22 6gb Ram', Report::class, null, 'slug'),
                'description'           =>                 'Description test',
                'brand'                 =>                 'Samsung',
                'contact_number'        =>                  9812380822,
                'contact_email'         =>                 "sanjeevvsanjeev1@gmail.com",
                'category_id'           =>                  1,
                'reported_by'           =>                  $user->id,
                'report_type'           =>                  Report::REPORT_TYPE_LOST,
                'is_featured'           =>                  true,
                'duration'              =>                  10,
                'featured_image'        =>                  $featured_image,
                'latitude'              =>                  '981s2313',
                'longitude'             =>                  '1313s1313',
                'address'               =>                  'Nepal',
            ];
            $this->post(url('/report-lost'),$report_attributes)
                ->assertSessionHasErrors(['featured_image']);
    }

}
