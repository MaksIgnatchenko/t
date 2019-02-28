<?php

use Faker\Generator as Faker;

$factory->define(\App\Modules\Challenges\Models\Challenge::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'image' => new \Illuminate\Http\UploadedFile($faker->image(), str_random()),
        'description' => $faker->sentence( rand(1, 6), true ),
        'link' => $faker->url,
        'country' => \App\Modules\Challenges\Enums\CountryEnum::getAll()[array_rand(\App\Modules\Challenges\Enums\CountryEnum::getAll())],
        'city' => 'fakeCity',
        'participants_limit' => 100,
        'proof_type' => \App\Modules\Challenges\Enums\ProofTypeEnum::getAll()[array_rand(\App\Modules\Challenges\Enums\ProofTypeEnum::getAll())],
        'start_date' => \Carbon\Carbon::now()->toDateTimeString(),
        'end_date' => \Carbon\Carbon::now()->addDays(rand(10, 30))->toDateTimeString()
    ];
});
