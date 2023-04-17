<?php

use App\Models\Promoter;
use App\Filament\Resources\PromoterResource;

it('can render Promoter list table', function () {
    $this->get(PromoterResource::getUrl('index'))->assertSuccessful();
});

it('can render Promoter create form', function () {
    $this->get(PromoterResource::getUrl('create'))->assertSuccessful();
});

it('can render Promoter edit form', function () {
    $this->get(PromoterResource::getUrl('edit', [
        'record' => Promoter::factory()->create(),
    ]))->assertSuccessful();
});