<?php

namespace App\Services;

use App\Models\Country;
use App\Models\Guest;

/**
 *
 */
class GuestService
{
    /**
     * Получить всех гостей
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllGuests(): \Illuminate\Database\Eloquent\Collection
    {
        return Guest::all();
    }

    /**
     * Возвращает гостя по $id
     * @param $id
     * @return mixed
     */
    public function getGuestById($id): mixed
    {
        return Guest::findOrFail($id);
    }

    /**
     * Создать нового гостя
     * @param array $data
     * @return mixed
     */
    public function createGuest(array $data): mixed
    {
        // Я бы лучше вынес страну из таблицы Guest  и выводил ее по связи. Но сделал так как написано в тз.

        // Можно было бы еще проверять есть ли такая страна у нас в таблице Country
        // но такой же вопрос как я написал в updateGuest
        if (empty($data['country'])) {
            $phoneCode = explode('-', $data['phone'])[0];
            $country = Country::where('phone_code', '=', $phoneCode)->first();
            $data['country'] = $country ? $country->name : null;
        }
        return Guest::create($data);
    }

    /**
     * Обновить гостя
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function updateGuest($id, array $data): mixed
    {
        // Можно было бы здесь сделать обновление страны по коду телефона если не пришло поле country
        // но тут не понятно если мы толерантны к выбору человека то тогда этого делать не надо
        // так как факт (Жители Киргизии называют свою страну Кыргызстан но в мировом обиходе она Киргизия).
        $guest = Guest::findOrFail($id);
        $guest->update($data);
        return $guest;
    }

    /**
     * Удалить гостя
     * @param $id
     * @return mixed
     */
    public function deleteGuest($id): mixed
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();
        return $guest;
    }
}
