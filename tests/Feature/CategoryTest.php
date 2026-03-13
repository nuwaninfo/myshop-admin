<?php



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
    $response = $this->get(route('categories.edit'));

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

test('guest cannot access category update page', function () {
    $response = $this->get(route('categories.edit'));

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

test('guest cannot access category store page', function () {
    $response = $this->get(route('categories.store'));

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

test('guest cannot access category delete page', function () {
    $response = $this->get(route('categories.delete'));

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});

test('guest cannot access category status page', function () {
    $category = \App\Models\Category::factory()->create();
    $response = $this->get(route('categories.status', $category->id));

    $response->assertStatus(302);
    $response->assertRedirect('/login');
});
