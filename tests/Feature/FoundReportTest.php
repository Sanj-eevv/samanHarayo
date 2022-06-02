<?php

namespace Tests\Feature;

use App\Helpers\SamanHarayoHelper;
use App\Models\Category;
use App\Models\Location;
use App\Models\Report;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FoundReportTest extends TestCase
{
    use RefreshDatabase, WithFaker, DatabaseMigrations;

    public function test_found_report_is_successfully_stored_in_database(){
        $user = $this->signInAsBasicUser();
        $this->withoutExceptionHandling();
        Storage::fake('local');
        $files = [UploadedFile::fake()->image('file1.png', 250, 150), UploadedFile::fake()->image('file2.png', 250, 150)];
        foreach ($files as $file){
            $imageName[] = SamanHarayoHelper::renameImageFileUpload($file);
        }
        $category_attributes = [
            'name'              =>          'electronics',
        ];
        $category = Category::create($category_attributes);
        $report_attributes =  [
            'title'                 =>                'test found report',
            'slug'                  =>                 SamanHarayoHelper::uniqueSlugify('test-found-report', Report::class, null, 'slug'),
            'description'           =>                 'orta mattis tortor, sed maximus massa pretium vel. Sed at odio et lorem egestas facilisis. Praesent mattis nibh non placerat pulvinar. Vestibulum at tincidunt lectus. Nunc dapibus porta urna vel aliquam. Phasellus quis pellentesque nisi, et sodales tortor. Integer ut arcu vitae nisi euismod maximus. Proin fringilla quam vel luctus euismod. Morbi semper dictum
                                                        leo, vitae laoreet sapien suscipit et. Curabitur non lorem pharetra, suscipit massa at, viverra nunc. Cras eu nisl tellus. Nulla magna dui, lobortis vitae volutpat et, ultricies ut odio. Maecenas vitae suscipit dui. Aliquam fringilla aliquam mollis',
            'brand'                 =>                 'test',
            'contact_number'        =>                 9812380822,
            'contact_email'         =>                 "sanjeevvsanjeev1@gmail.com",
            'item_image'            =>                  $files,
            'category_id'           =>                  $category->id,
            'reported_by'           =>                  $user->id,
            'report_type'           =>                  Report::REPORT_TYPE_FOUND,
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
            'report_type'               =>              Report::REPORT_TYPE_FOUND,
            'contact_number'            =>              $attributes['contact_number'],
            'contact_email'             =>              $attributes['contact_email'],
            'verified'                  =>              0,
        ];
        $this->post(url('/report-found'),$attributes)
            ->assertStatus(302)
            ->assertRedirect('/');

        $this->assertDatabaseHas(Report::class, $results);
        $this->assertDatabaseHas(Location::class,$location_attributes);
    }
}
