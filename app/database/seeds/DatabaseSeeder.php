<?php

use App\Exercise;
use App\Group;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', 'admin@mail.com')->exists()) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('111111')
            ]);
        }

        if (!User::where('email', 'user@mail.com')->exists()) {
            User::create([
                'name' => 'user',
                'email' => 'user@mail.com',
                'password' => Hash::make('111111')
            ]);
        }

        $this->createGroups();
        $this->createExercises();
    }

    private function createGroups()
    {
        Group::firstOrCreate(['title' => 'Груди', 'color' => '#F44336']);
        Group::firstOrCreate(['title' => 'Плечі', 'color' => '#cddc39']);
        Group::firstOrCreate(['title' => 'Широкі м\'язи спини', 'color' => '#9c27b0']);
        Group::firstOrCreate(['title' => 'Трапеції, середина та низ спини', 'color' => '#2196f3']);
        Group::firstOrCreate(['title' => 'Ноги', 'color' => '#009688']);
        Group::firstOrCreate(['title' => 'Біцепс', 'color' => '#e91e63']);
        Group::firstOrCreate(['title' => 'Трицепс', 'color' => '#ff9800']);
        Group::firstOrCreate(['title' => 'Прес', 'color' => '#ff5722']);
    }

    private function createExercises()
    {
        Exercise::firstOrCreate(['title' => 'Жим штанги лежачи', 'group_id' => 1]);
        Exercise::firstOrCreate(['title' => 'Жим гантелей лежачи', 'group_id' => 1]);
        Exercise::firstOrCreate(['title' => 'Жим штанги головою вниз', 'group_id' => 1]);
        Exercise::firstOrCreate(['title' => 'Жим штанги в наклоні', 'group_id' => 1]);
        Exercise::firstOrCreate(['title' => 'Жим в тренажері з наклоном', 'group_id' => 1]);
        Exercise::firstOrCreate(['title' => 'Пуловер лежачи з гантелею', 'group_id' => 1]);
        Exercise::firstOrCreate(['title' => 'Розведення гантелей лежачи', 'group_id' => 1]);
        Exercise::firstOrCreate(['title' => 'Віджимання від полу', 'group_id' => 1]);
        Exercise::firstOrCreate(['title' => 'Бабочка', 'group_id' => 1]);
        Exercise::firstOrCreate(['title' => 'Зведення рук в кросовері', 'group_id' => 1]);
        Exercise::firstOrCreate(['title' => 'Віджимання на брусях', 'group_id' => 1]);

        Exercise::firstOrCreate(['title' => 'Жим штанги стоячи', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Жим штанги сидячи', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Жим штанги зза голови стоячи', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Жим штанги зза голови сидячи', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Жим гантелей сидячи', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Жим гантелей стоячи', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Жим Арнольда', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Підйом штанги вузьким хватом', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Підйом штанги широким хватом', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Підйом гантелей перед собою', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Підйом гантелей через сторони стоячи', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Підйом гантелей через сторони сидячи', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Розведення рук назад в кросовері', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Розведення гантелей стоячи в наклоні', 'group_id' => 2]);
        Exercise::firstOrCreate(['title' => 'Розведення гантелей на наклонній лавці на животі', 'group_id' => 2]);


        Exercise::firstOrCreate(['title' => 'Підтягування широким хватом', 'group_id' => 3]);
        Exercise::firstOrCreate(['title' => 'Підтягування оберненим хватом', 'group_id' => 3]);
        Exercise::firstOrCreate(['title' => 'Підтягування прямим хватом', 'group_id' => 3]);
        Exercise::firstOrCreate(['title' => 'Тяга верхнього блоку до грудей', 'group_id' => 3]);
        Exercise::firstOrCreate(['title' => 'Тяга штанги в наклоні', 'group_id' => 3]);
        Exercise::firstOrCreate(['title' => 'Тяга верхнього блоку за голову', 'group_id' => 3]);
        Exercise::firstOrCreate(['title' => 'Тяга Т-грифу в наклоні', 'group_id' => 3]);
        Exercise::firstOrCreate(['title' => 'Тяга гантелей лежачи на лавці на животі', 'group_id' => 3]);
        Exercise::firstOrCreate(['title' => 'Тяга гантелей стоячи в наклоні', 'group_id' => 3]);


        Exercise::firstOrCreate(['title' => 'Тяга одної гантелі в наклоні', 'group_id' => 4]);
        Exercise::firstOrCreate(['title' => 'Тяга нижнього блоку', 'group_id' => 4]);
        Exercise::firstOrCreate(['title' => 'Гіперекстензія', 'group_id' => 4]);
        Exercise::firstOrCreate(['title' => 'Станова тяга', 'group_id' => 4]);
        Exercise::firstOrCreate(['title' => 'Шраги з гантелями', 'group_id' => 4]);
        Exercise::firstOrCreate(['title' => 'Шраги зі штангою', 'group_id' => 4]);
        Exercise::firstOrCreate(['title' => 'Тяга за спиною', 'group_id' => 4]);


        Exercise::firstOrCreate(['title' => 'Випади з гантелями', 'group_id' => 5]);
        Exercise::firstOrCreate(['title' => 'Присідання в гакк-тренажері', 'group_id' => 5]);
        Exercise::firstOrCreate(['title' => 'Присідання зі штангою', 'group_id' => 5]);
        Exercise::firstOrCreate(['title' => 'Жим ногами в тренажері', 'group_id' => 5]);
        Exercise::firstOrCreate(['title' => 'Розгинання ніг в тренажері', 'group_id' => 5]);
        Exercise::firstOrCreate(['title' => 'Мертва тяга', 'group_id' => 5]);
        Exercise::firstOrCreate(['title' => 'Згинання ніг в тренажері стоячи', 'group_id' => 5]);
        Exercise::firstOrCreate(['title' => 'Згинання ніг в тренажері лежачи', 'group_id' => 5]);
        Exercise::firstOrCreate(['title' => 'Підйом на ікри сидячи', 'group_id' => 5]);
        Exercise::firstOrCreate(['title' => 'Підйом на носки стоячи', 'group_id' => 5]);

        Exercise::firstOrCreate(['title' => 'Згинання рук зі штангою стоячи', 'group_id' => 6]);
        Exercise::firstOrCreate(['title' => 'Згинання рук на лавці скота', 'group_id' => 6]);
        Exercise::firstOrCreate(['title' => 'Згинання рук з гантелями на наклонній лавці', 'group_id' => 6]);
        Exercise::firstOrCreate(['title' => 'Згинання рук з гантелями хватом "Молот"', 'group_id' => 6]);
        Exercise::firstOrCreate(['title' => 'Згинання рук на нижньому блоці в кросовері', 'group_id' => 6]);
        Exercise::firstOrCreate(['title' => 'Згинання рук з гантелями стоячи', 'group_id' => 6]);
        Exercise::firstOrCreate(['title' => 'Згинання рук стоячи/сидячи у верхніх блоків', 'group_id' => 6]);
        Exercise::firstOrCreate(['title' => 'Підтягування на біцепс', 'group_id' => 6]);
        Exercise::firstOrCreate(['title' => 'Концентровані згинання на біцепс', 'group_id' => 6]);

        Exercise::firstOrCreate(['title' => 'Французький жим лежачи', 'group_id' => 7]);
        Exercise::firstOrCreate(['title' => 'Французький жим гантелями сидячи', 'group_id' => 7]);
        Exercise::firstOrCreate(['title' => 'Французький жим стоячи зі штангою', 'group_id' => 7]);
        Exercise::firstOrCreate(['title' => 'Жим одної гантелі з-за голови стоячи', 'group_id' => 7]);
        Exercise::firstOrCreate(['title' => 'Розгинання рук на блоці стоячи', 'group_id' => 7]);
        Exercise::firstOrCreate(['title' => 'Відведення руки з гантелею в наклоні', 'group_id' => 7]);
        Exercise::firstOrCreate(['title' => 'Віджимання на брусях', 'group_id' => 7]);
        Exercise::firstOrCreate(['title' => 'Оберенені віджимання', 'group_id' => 7]);
        Exercise::firstOrCreate(['title' => 'Жим штанги вузьким хватом', 'group_id' => 7]);

        Exercise::firstOrCreate(['title' => 'Згручування лежачи', 'group_id' => 8]);
        Exercise::firstOrCreate(['title' => 'Планка', 'group_id' => 8]);
        Exercise::firstOrCreate(['title' => 'Скручування на наклонній лавці', 'group_id' => 8]);
        Exercise::firstOrCreate(['title' => 'Підйом ніг в упорі', 'group_id' => 8]);
        Exercise::firstOrCreate(['title' => 'Підйом ніг у висі', 'group_id' => 8]);
        Exercise::firstOrCreate(['title' => 'Наклони з гантелею в сторони стоячи', 'group_id' => 8]);
        Exercise::firstOrCreate(['title' => 'Обернені скручування', 'group_id' => 8]);
    }
}
