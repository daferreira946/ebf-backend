<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'username' => $user->username,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertNoContent();
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'username' => $user->username,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_not_authenticate_with_invalid_username()
    {
        User::factory()->create([
            'username' => '20483'
        ]);

        $this->post('/login', [
            'username' => '20482',
            'password' => 'password',
        ]);

        $this->assertGuest();
    }

    public function test_inactive_user_can_not_authenticate()
    {
        $user = User::factory()->create([
            'is_active' => false
        ]);

        $this->post('/login', [
            'username' => $user->username,
            'password' => 'password'
        ]);

        $this->assertGuest();
    }
}
