<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithSession;
use Illuminate\Support\Facades\Hash;
use Response;

class AuthTest extends TestCase
{
    use RefreshDatabase, InteractsWithSession;

    public function createApplication()
    {
        $app = require __DIR__.'/../../bootstrap/app.php';
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
        return $app;
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(AdminUserSeeder::class);
    }
    public static function createTestsUser(
        $name = 'Joe Black',
        $email = 'joeblack@moskwagabriel.com',
        $password = '12345aA!',
        $phone = '3213123224'
    ) {
        User::create([
            'name' => $name,
            'phone_number' => $phone,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 1
        ]);
    }

    public static function createTestsAdmin(
        $name = 'Joe White',
        $email = 'joewhite@moskwagabriel.com',
        $password = '12345aA!',
        $phone = '3213123224'
    ) {
        User::create([
            'name' => $name,
            'phone_number' => $phone,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 2
        ]);
    }
    public function test_login_as_admin()
    {
        $this->get('/login');

        $csrfToken = csrf_token();

        $this->post('/validate_login', [
            'email' => 'admin@admin.com',
            'password' => 'admin',
            '_token' => $csrfToken,
        ])->assertStatus(302)
        ->assertRedirect('/dashboard');
    }

    public function test_login_as_admin_error()
    {
        $this->get('/login');

        $csrfToken = csrf_token();

        $this->post('/validate_login', [
            'email' => 'admin@admin.com',
            'password' => 'admi321213n',
            '_token' => $csrfToken,
        ])->assertStatus(302)
        ->assertRedirect('/login');
    }
    public function test_register_correct()
    {
        $this->get('/registration');

        $csrfToken = csrf_token();

        $this->post('/validate_registration', [
            'email' => 'test.flowu@gmail.com',
            'password' => 'zaq1@WSX',
            'password-confirmation' =>'zaq1@WSX',
            'name' =>'Johnny Mielony',
            'telephone' => '345 676 232',
            '_token' => $csrfToken,
        ])->assertStatus(302)
            ->assertRedirect('/login');
    }
    public function test_register_wrong_email1()
    {
        $this->get('/registration');

        $csrfToken = csrf_token();

        $this->post('/validate_registration', [
            'email' => 'test.flowugmail.com',
            'password' => 'zaq1@WSX',
            'password-confirmation' =>'zaq1@WSX',
            'name' =>'Johnny Mielony',
            'telephone' => '345 676 232',
            '_token' => $csrfToken,
        ])->assertStatus(302)
            ->assertRedirect('/registration');
        $this->assertDatabaseMissing('users',['email'=>'test.flowugmail.com ']);
    }
    public function test_register_wrong_password1()
    {
        $this->get('/registration');

        $csrfToken = csrf_token();

        $this->post('/validate_registration', [
            'email' => 'test.flowugmail.com',
            'password' => 'zaq1@WSX',
            'password-confirmation' =>'zaq1@WsSX',
            'name' =>'Johnny Mielony',
            'telephone' => '345 676 232',
            '_token' => $csrfToken,
        ])->assertStatus(302)
            ->assertRedirect('/registration');
        $this->assertDatabaseMissing('users',['email'=>'test.flowugmail.com ']);
    }
    public function test_register_wrong_password2()
    {
        $this->get('/registration');

        $csrfToken = csrf_token();

        $this->post('/validate_registration', [
            'email' => 'test.flowugmail.com',
            'password' => '123456',
            'password-confirmation' =>'123456',
            'name' =>'Johnny Mielony',
            'telephone' => '345 676 232',
            '_token' => $csrfToken,
        ])->assertStatus(302)
            ->assertRedirect('/registration');
        $this->assertDatabaseMissing('users',['email'=>'test.flowugmail.com ']);
    }
    public function test_register_wrong_telephone1()
    {
        $this->get('/registration');

        $csrfToken = csrf_token();

        $this->post('/validate_registration', [
            'email' => 'test.flowugmail.com',
            'password' => '123456',
            'password-confirmation' =>'123456',
            'name' =>'Johnny Mielony',
            'telephone' => '3453',
            '_token' => $csrfToken,
        ])->assertStatus(302)
            ->assertRedirect('/registration');
        $this->assertDatabaseMissing('users',['email'=>'test.flowugmail.com ']);
    }
    public function test_all_pages_work_unlogged()
    {
        $email = 'admin@admin.com';
        $password = 'admin';

        $this
            ->get('/')
            ->assertOk();
        $this
            ->get('/login')
            ->assertOk();
        $this
            ->get('/registration')
            ->assertOk();
        $this
            ->get('/terms-of-use')
            ->assertOk();
        $this
            ->get('/contact')
            ->assertOk();
        $this
            ->get('/dashboard')
            ->assertOk();
        $this
            ->get('/team')
            ->assertOk();
    }
    public function test_seeder_work()
    {
              $user = [

                'email' => 'admin@admin.com',

            ];
        $this->assertDatabaseHas('users', [
            'email'=>$user['email']]);

    }




}
