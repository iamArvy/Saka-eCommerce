<?php
use Inertia\Testing\AssertableInertia as Assert;

test('home page can be rendered', function () {
    $response = $this->get(route('store.home'));
    // $response->assertInertia(function (Assert $page) {
    //     $page->component('Store/Home');
    // });
    $response->assertInertia(fn ($page) => $page
        ->component('Store/Home')
        ->has('title')
    );
    // $response->assertInertia(function (Assert $page) use ($cartItems)  {
    //     $page->component('Emporium/Cart')
    //         ->has('items', count($cartItems))
    //         ->where('items', $cartItems);
    // });
    $response->assertStatus(200);
});
