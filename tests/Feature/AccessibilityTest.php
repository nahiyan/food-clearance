<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Database\Factories\UserFactory;

class AccessibilityTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPublicAccessibility()
    {
        // Guests should be able to access public pages
        $this->get('/')->assertOk()->assertSee("Food Items");
        $this->get('home')->assertOk();
        $this->get('login')->assertOk()->assertSee("Login");
        $this->get('register')->assertOk()->assertSee("Register");
        $this->get('search/a')->assertOk()->assertSee("Search Results");

        // Guests should be redirected back
        $this->get('cart')->assertRedirect();
        $this->get('admin')->assertRedirect();
        $this->get('company')->assertRedirect();

        // Guests should have a register and login button on the homepage
        $this->get("/")->assertSee("Register")->assertSee("Login");
    }

    public function testGeneralAccessibility()
    {
        $general = User::factory()->make([
            'name' => 'Lorem Ipsum',
            'type' => 'general',
            'password' => bcrypt("me"),
            'email' => 'lorem.ipsum@test.com',
        ]);

        // Logged in users should see the logout button and a hello along with their name
        $this->actingAs($general)->get("/")->assertSee("Logout")->assertSee("Hello")->assertSee($general->name);

        // Should be able to access the cart
        $this->actingAs($general)->get("cart")->assertSee("Cart Items")->assertSee("Net price:")->assertSee("Checkout");

        // Should be redirect back when visiting the login and registration pages
        $this->actingAs($general)->get("login")->assertRedirect();
        $this->actingAs($general)->get("register")->assertRedirect();
    }

    public function testAdminAccessibility()
    {
        // Let's test as an admin
        $admin = User::factory()->make([
            'name' => 'Lorem Ipsum',
            'type' => 'admin',
            'password' => bcrypt("me"),
            'email' => 'lorem.ipsum@test.com',
        ]);

        // Admins should see a menu item for admin panel
        $this->actingAs($admin)->get("/")->assertSee("Admin Panel");

        // Shouldn't reject an admin from accessing the admin panel
        $this->actingAs($admin)->get("admin")->assertOk()->assertSee("Summary");
        $this->actingAs($admin)->get("admin/users")->assertOk()->assertSee("List of Users");
        $this->actingAs($admin)->get("admin/foods")->assertOk()->assertSee("List of Food Items");
        $this->actingAs($admin)->get("admin/companies")->assertOk()->assertSee("List of Companies");
        $this->actingAs($admin)->get("admin/transactions")->assertOk()->assertSee("List of Transactions");
    }

    public function testCompanyAccessibility()
    {
        // Acting as company
        $company = User::factory()->make([
            'name' => 'Lorem Ipsum',
            'type' => 'company',
            'password' => bcrypt("me"),
            'email' => 'lorem.ipsum@test.com',
        ]);

        // Company owners should see a menu item for company panel
        $this->actingAs($company)->get("/")->assertSee("Company Panel");

        // Shouldn't reject a company from accessing the company panel
        $this->actingAs($company)->get("company")->assertOk()->assertSee("Summary");
        $this->actingAs($company)->get("company/foods")->assertOk()->assertSee("List of Food Items");
        $this->actingAs($company)->get("company/companies")->assertOk()->assertSee("List of Companies");
        $this->actingAs($company)->get("company/transactions")->assertOk()->assertSee("List of Transactions");
    }
}
