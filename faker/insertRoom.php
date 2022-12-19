<?php
require_once dirname(__FILE__, 2).'/vendor/autoload.php';

$faker = Faker\Factory::create();

for ($i = 0; $i < 130; $i++){
    $room = DB_CONNECT::DB()->table('room');
    $room->insert(
        [
            'room_code' => uniqid('r'),
            'name' => $faker->streetName(),
            'address' => $faker->city(),
            'max_people' => $faker->randomDigitNotNull(),
            'price' => $faker->randomNumber(5, true),
            'create_date' => date("Y-m-d H:i:s"),
            'img' =>  $faker->randomElement(['house1.jpeg', 'house2.jpeg', 'house3.jpeg']),
            'member_code' => 'm6377727b479e0',
            'type' => $faker->randomElement(['motel', 'hotel', 'pension']),
            'views' => 0,
        ]
    )->execute();
}


?>