<?php

use App\Models\User;
use App\Models\Category;

test('redirects guest to login page when visiting home', function () {

    $response = $this->get('/');

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

test('guest cannot access category index page', function () {
    $response = $this->get(route('categories.index'));

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

test('guest cannot access create category page', function () {
    $response = $this->get(route('categories.create'));

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

test('guest cannot access category edit page', function () {
    $category = \App\Models\Category::factory()->create();
    $response = $this->get(route('categories.edit', $category->id));

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

test('guest cannot access category update page', function () {
    $category = \App\Models\Category::factory()->create();
    $response = $this->post(route('categories.update', $category->id));

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

test('guest cannot access category store page', function () {
    $response = $this->post(route('categories.store'));

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

test('guest cannot access category delete page', function () {
    $category = \App\Models\Category::factory()->create();
    $response = $this->delete(route('categories.delete', $category->id));

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

test('guest cannot access category status page', function () {
    $category = Category::factory()->create();
    $response = $this->get(route('categories.status', $category->id));

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});


// Reomve repetes of above code
test('guest cannot access protected category routes', function () {
    $category = \App\Models\Category::factory()->create();

    $routes = [
        'GET'    => [
            route('categories.index'),
            route('categories.create'),
            route('categories.edit', $category->id),
            route('categories.status', $category->id),
        ],
        'POST'   => [
            route('categories.store'),
            route('categories.update', $category->id),
        ],
        'DELETE' => [
            route('categories.delete', $category->id),
        ],
        'GET_HOME' => [
            '/', // home page
        ],
    ];

    foreach ($routes['GET'] as $route) {
        $this->get($route)->assertRedirect('/login');
    }

    foreach ($routes['POST'] as $route) {
        $this->post($route)->assertRedirect('/login');
    }

    foreach ($routes['DELETE'] as $route) {
        $this->delete($route)->assertRedirect('/login');
    }

    foreach ($routes['GET_HOME'] as $route) {
        $this->get($route)->assertRedirect('/login');
    }
});

// Rewite about according to production
test('guest cannot access protected category routes 2nd method', function () {
    $category = \App\Models\Category::factory()->create();

    $routes = [
        ['get', route('categories.index')],
        ['get', route('categories.create')],
        ['post', route('categories.store')],
        ['get', route('categories.edit', $category->id)],
        ['post', route('categories.update', $category->id)],
        ['delete', route('categories.delete', $category->id)],
        ['get', route('categories.status', $category->id)],
        ['get', '/'], // home
    ];

    foreach ($routes as [$method, $route]) {
        $this->{$method}($route)->assertRedirect('/login');
    }
});

test('authenticated user can view category index', function () {
    /** @var \Tests\TestCase $this */

    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('categories.index'));

    $response->assertStatus(200);
    $response->assertViewIs('pages.categories.index');
});

test('authenticated user can view create category page', function () {
    /** @var \Tests\TestCase $this */

    $user = \App\Models\User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('categories.create'));

    $response->assertStatus(200);
    $response->assertViewIs('pages.categories.create');
});

test('authenticated user can store a category', function () {
    /** @var \Tests\TestCase $this */

    $user = \App\Models\User::factory()->create();
    $this->actingAs($user);

    $data = [
        'name' => 'Electronics',
        'status' => 1,
    ];

    $response = $this->post(route('categories.store'), $data);

    $response->assertRedirect(route('categories.index'));
    $this->assertDatabaseHas('categories', ['name' => 'Electronics']);
});

test('authenticated user can view edit category page', function () {
    /** @var \Tests\TestCase $this */
    $user = \App\Models\User::factory()->create();
    $this->actingAs($user);

    $category = \App\Models\Category::factory()->create();

    $response = $this->get(route('categories.edit', $category->id));

    $response->assertStatus(200);
    $response->assertViewIs('pages.categories.edit');
});

test('authenticated user can update a category', function () {
    /** @var \Tests\TestCase $this */
    $user = User::factory()->create();
    $this->actingAs($user);

    $category = Category::factory()->create();

    $response = $this->post(route('categories.update', $category->id), [
        'name' => 'Updated Name',
        'status' => 1,
    ]);

    $response->assertRedirect(route('categories.index'));
    $this->assertDatabaseHas('categories', ['name' => 'Updated Name']);
});

test('authenticated user can delete a category', function () {
    /** @var \Tests\TestCase $this */
    $user = User::factory()->create();
    $this->actingAs($user);

    $category = Category::factory()->create();

    $response = $this->delete(route('categories.delete', $category->id));

    $response->assertRedirect(route('categories.index'));
    $this->assertDatabaseMissing('categories', ['id' => $category->id]);
});

test('authenticated user can toggle category status', function () {
    /** @var \Tests\TestCase $this */
    $user = \App\Models\User::factory()->create();
    $this->actingAs($user);

    $category = \App\Models\Category::factory()->create(['status' => 1]);

    $response = $this->get(route('categories.status', $category->id));

    $response->assertRedirect(route('categories.index'));

    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'status' => 0,
    ]);
});
