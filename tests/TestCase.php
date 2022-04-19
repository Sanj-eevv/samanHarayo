<?php

namespace Tests;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    protected function signIn($user = null)
    {
        $user = $user ?: User::factory()->create(['role_id' => Role::factory()->create(['name' => 'superAdmin'])]);
        $this->actingAs($user, 'web');
        return $user;
    }
    protected function signInAsBasicUser($user = null)
    {
        $user = $user ?: User::factory()->create(['role_id' => Role::factory()->create(['name' => 'basicUser'])]);
        $this->actingAs($user);
        return $user;
    }

    /**
     * @param $uri
     * @param array $data
     * @return \Illuminate\Testing\TestResponse
     */
    public function ajaxPost($uri, array $data = [])
    {
        return $this->post($uri, $data, ['HTTP_X-Requested-With' => 'XMLHttpRequest']);
    }


    /**
     * Make ajax GET request
     * @param $uri
     * @return \Illuminate\Testing\TestResponse
     */
    public function ajaxGet($uri)
    {
        return $this->get($uri, ['HTTP_X-Requested-With' => 'XMLHttpRequest']);
    }


}
