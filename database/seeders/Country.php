<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Country extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'Абхазия', 'phone_code' => '+7 840'],
            ['name' => 'Австралия', 'phone_code' => '+61'],
            ['name' => 'Австрия', 'phone_code' => '+43'],
            ['name' => 'Азербайджан', 'phone_code' => '+994'],
            ['name' => 'Албания', 'phone_code' => '+355'],
            ['name' => 'Алжир', 'phone_code' => '+213'],
            ['name' => 'Ангола', 'phone_code' => '+244'],
            ['name' => 'Аргентина', 'phone_code' => '+54'],
            ['name' => 'Армения', 'phone_code' => '+374'],
            ['name' => 'Афганистан', 'phone_code' => '+93'],
            ['name' => 'Багамы', 'phone_code' => '+1 242'],
            ['name' => 'Бангладеш', 'phone_code' => '+880'],
            ['name' => 'Барбадос', 'phone_code' => '+1 246'],
            ['name' => 'Бельгия', 'phone_code' => '+32'],
            ['name' => 'Белиз', 'phone_code' => '+501'],
            ['name' => 'Бенин', 'phone_code' => '+229'],
            ['name' => 'Болгария', 'phone_code' => '+359'],
            ['name' => 'Боливия', 'phone_code' => '+591'],
            ['name' => 'Бразилия', 'phone_code' => '+55'],
            ['name' => 'Бруней', 'phone_code' => '+673'],
            ['name' => 'Великобритания', 'phone_code' => '+44'],
            ['name' => 'Венгрия', 'phone_code' => '+36'],
            ['name' => 'Венесуэла', 'phone_code' => '+58'],
            ['name' => 'Вьетнам', 'phone_code' => '+84'],
            ['name' => 'Габон', 'phone_code' => '+241'],
            ['name' => 'Гаити', 'phone_code' => '+509'],
            ['name' => 'Германия', 'phone_code' => '+49'],
            ['name' => 'Гренада', 'phone_code' => '+1 473'],
            ['name' => 'Греция', 'phone_code' => '+30'],
            ['name' => 'Дания', 'phone_code' => '+45'],
            ['name' => 'Доминика', 'phone_code' => '+1 767'],
            ['name' => 'Доминиканская Республика', 'phone_code' => '+1 809'],
            ['name' => 'Египет', 'phone_code' => '+20'],
            ['name' => 'Израиль', 'phone_code' => '+972'],
            ['name' => 'Индия', 'phone_code' => '+91'],
            ['name' => 'Индонезия', 'phone_code' => '+62'],
            ['name' => 'Иордания', 'phone_code' => '+962'],
            ['name' => 'Ирландия', 'phone_code' => '+353'],
            ['name' => 'Италия', 'phone_code' => '+39'],
            ['name' => 'Кабо-Верде', 'phone_code' => '+238'],
            ['name' => 'Казахстан', 'phone_code' => '+7 7'],
            ['name' => 'Катар', 'phone_code' => '+974'],
            ['name' => 'Кения', 'phone_code' => '+254'],
            ['name' => 'Китай', 'phone_code' => '+86'],
            ['name' => 'Киргизия', 'phone_code' => '+996'],
            ['name' => 'Кирибати', 'phone_code' => '+686'],
            ['name' => 'Косово', 'phone_code' => '+383'],
            ['name' => 'Коста-Рика', 'phone_code' => '+506'],
            ['name' => 'Куба', 'phone_code' => '+53'],
            ['name' => 'Кувейт', 'phone_code' => '+965'],
            ['name' => 'Лаос', 'phone_code' => '+856'],
            ['name' => 'Латвия', 'phone_code' => '+371'],
            ['name' => 'Ливан', 'phone_code' => '+961'],
            ['name' => 'Ливия', 'phone_code' => '+218'],
            ['name' => 'Литва', 'phone_code' => '+370'],
            ['name' => 'Люксембург', 'phone_code' => '+352'],
            ['name' => 'Маврикий', 'phone_code' => '+230'],
            ['name' => 'Мадагаскар', 'phone_code' => '+261'],
            ['name' => 'Малайзия', 'phone_code' => '+60'],
            ['name' => 'Мали', 'phone_code' => '+223'],
            ['name' => 'Мальдивы', 'phone_code' => '+960'],
            ['name' => 'Мальта', 'phone_code' => '+356'],
            ['name' => 'Марокко', 'phone_code' => '+212'],
            ['name' => 'Мексика', 'phone_code' => '+52'],
            ['name' => 'Микронезия', 'phone_code' => '+691'],
            ['name' => 'Молдова', 'phone_code' => '+373'],
            ['name' => 'Монголия', 'phone_code' => '+976'],
            ['name' => 'Намибия', 'phone_code' => '+264'],
            ['name' => 'Непал', 'phone_code' => '+977'],
            ['name' => 'Новая Зеландия', 'phone_code' => '+64'],
            ['name' => 'Норвегия', 'phone_code' => '+47'],
            ['name' => 'ОАЭ', 'phone_code' => '+971'],
            ['name' => 'Оман', 'phone_code' => '+968'],
            ['name' => 'Пакистан', 'phone_code' => '+92'],
            ['name' => 'Панама', 'phone_code' => '+507'],
            ['name' => 'Парагвай', 'phone_code' => '+595'],
            ['name' => 'Перу', 'phone_code' => '+51'],
            ['name' => 'Польша', 'phone_code' => '+48'],
            ['name' => 'Португалия', 'phone_code' => '+351'],
            ['name' => 'Республика Конго', 'phone_code' => '+242'],
            ['name' => 'Республика Корея', 'phone_code' => '+82'],
            ['name' => 'Россия', 'phone_code' => '+7'],
            ['name' => 'Румыния', 'phone_code' => '+40'],
            ['name' => 'Сальвадор', 'phone_code' => '+503'],
            ['name' => 'Самоа', 'phone_code' => '+685'],
            ['name' => 'Сан-Марино', 'phone_code' => '+378'],
            ['name' => 'Саудовская Аравия', 'phone_code' => '+966'],
            ['name' => 'Сейшельские Острова', 'phone_code' => '+248'],
            ['name' => 'Сенегал', 'phone_code' => '+221'],
            ['name' => 'Сербия', 'phone_code' => '+381'],
            ['name' => 'Сингапур', 'phone_code' => '+65'],
            ['name' => 'Словакия', 'phone_code' => '+421'],
            ['name' => 'Словения', 'phone_code' => '+386'],
            ['name' => 'Соломоновы Острова', 'phone_code' => '+677'],
            ['name' => 'Судан', 'phone_code' => '+249'],
            ['name' => 'Суринам', 'phone_code' => '+597'],
            ['name' => 'США-Канада', 'phone_code' => '+1'],
            ['name' => 'Таджикистан', 'phone_code' => '+992'],
            ['name' => 'Тайвань', 'phone_code' => '+886'],
            ['name' => 'Тайланд', 'phone_code' => '+66'],
            ['name' => 'Танзания', 'phone_code' => '+255'],
            ['name' => 'Того', 'phone_code' => '+228'],
            ['name' => 'Тунис', 'phone_code' => '+216'],
            ['name' => 'Туркменистан', 'phone_code' => '+993'],
            ['name' => 'Турция', 'phone_code' => '+90'],
            ['name' => 'Уганда', 'phone_code' => '+256'],
            ['name' => 'Узбекистан', 'phone_code' => '+998'],
            ['name' => 'Украина', 'phone_code' => '+380'],
            ['name' => 'Уругвай', 'phone_code' => '+598'],
            ['name' => 'Фиджи', 'phone_code' => '+679'],
            ['name' => 'Филиппины', 'phone_code' => '+63'],
            ['name' => 'Финляндия', 'phone_code' => '+358'],
            ['name' => 'Франция', 'phone_code' => '+33'],
            ['name' => 'Хорватия', 'phone_code' => '+385'],
            ['name' => 'Чили', 'phone_code' => '+56'],
            ['name' => 'Чехия', 'phone_code' => '+420'],
            ['name' => 'Швейцария', 'phone_code' => '+41'],
            ['name' => 'Швеция', 'phone_code' => '+46'],
            ['name' => 'Шри-Ланка', 'phone_code' => '+94'],
            ['name' => 'Эквадор', 'phone_code' => '+593'],
            ['name' => 'Экваториальная Гвинея', 'phone_code' => '+240'],
            ['name' => 'Эстония', 'phone_code' => '+372'],
            ['name' => 'Южноафриканская Республика', 'phone_code' => '+27'],
            ['name' => 'Южный Судан', 'phone_code' => '+211'],
            ['name' => 'Ямайка', 'phone_code' => '+1 876'],
            ['name' => 'Япония', 'phone_code' => '+81'],
        ];

        if(!\App\Models\Country::first()){
            \App\Models\Country::insert($countries);
        }
    }
}
