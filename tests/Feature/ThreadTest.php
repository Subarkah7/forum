<?php

use App\Models\Thread;
use App\Models\User;

test('an authenticated user can create new thread', function () {

    //$this->withoutExceptionHandling();

    $thread = Thread::factory()->make();
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('threads.store', $thread->toArray()));

    expect($response->getStatusCode())->toEqual(302);
    $response->assertRedirect();
});


test('an authenticated user can not create new thread if he does not fill anything required', function () {

    //$this->withoutExceptionHandling();

    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('threads.store', [
        'title' => ''
    ]));

    expect($response->getStatusCode())->toEqual(302);
    $response->assertRedirect();
});


test('an guest can not create new thread ', function () {

  
    $thread = Thread::factory()->make();

    $response = $this->post(route('threads.store', $thread->toArray()));

    $response->assertRedirect(route('login'));
    $this->assertGuest();  

});