<?php

namespace App\Console\Commands\Users;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'users:create';

    /**
     * @var string
     */
    protected $description = 'users:create';

    /**
     * @return void
     */
    public function handle(): void
    {
        $user = new User();
        $user->name = $this->ask('Имя пользователя', 'username');
        $user->email = $this->ask('Адрес электронной почты', 'username@bk.ru');
        $user->email_verified_at = now();
        $user->password = Hash::make($this->ask('Пароль', 'password'));
        $user->save();

        $this->info('Пользователь: ' . $user->email . ', успешно был создан.');
    }
}
