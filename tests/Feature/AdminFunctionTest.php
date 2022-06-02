<?php

namespace Tests\Feature;

use App\Helpers\SamanHarayoHelper;
use App\Models\Report;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class AdminFunctionTest extends TestCase
{
    use RefreshDatabase, WithFaker, DatabaseMigrations;

    Public function test_if_admin_can_delete_report(){
        $user = $this->signIn();
        $this->withoutExceptionHandling();
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
            'latitude'              =>                  '981s2313',
            'longitude'             =>                  '1313s1313',
            'address'               =>                  'Nepal',
        ];
        $report = Report::create($report_attributes);
        $this->json('delete', url('/')."/dashboard/lost-reports/".$report->id)
            ->assertOk();
        $this->assertDatabaseMissing(Report::class, $report_attributes);
    }

    public function test_normal_user_cannot_enter_admin_dashboard(){
        $this->signInAsBasicUser();
       $this->get('/dashboard')->assertSee('404 | NOT FOUND');
    }

    public function test_admin_user_can_enter_admin_dashboard(){
        $this->signIn();
        $this->get('/dashboard')->assertDontSee('404 | NOT FOUND');
    }
}
