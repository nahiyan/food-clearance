<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        // User cannot login with incorrect credentials
        $this->call("POST", "login", ["email" => "hello", "password" => "doesnotexist", "remember" => false])->assertSessionHasErrors(["email"]);

        // User can login with correct credentials
        $user = User::where("id", ">=", 1)->first();
        $this->call("POST", "login", ["email" => $user->email, "password" => "me", "remember" => false])->assertSessionHasNoErrors();
    }
}
