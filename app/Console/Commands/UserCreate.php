<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Validator;

class UserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $username = $this->validate_ask('Enter user name', ['string|max:255']);

        if ($this->confirm('Do you wish to create a random password?')) {
            $password = Str::random(8);
            $this->info('*The randomly created password is: ' . $password);
        } else {
            $password =$this->validate_ask('Enter user password', ['string|min:6']);
        }

        $email = $this->validate_ask('Enter email', ['email']);

        $user = new User();
        $user->username = $username;
        $user->password = bcrypt($password);
        $user->email = $email;
        $user->email_verified_at = now();
        $user->save();

        $this->info('User created');
    }

    public function validate_ask(string $question, array $rules, bool $isSecret = false)
    {
        if ($isSecret) {
            $value = $this->secret($question);
        } else {
            $value = $this->ask($question);
        }

        $validate = $this->validateInput($rules, $value);

        if ($validate !== true) {
            $this->error($validate);
            $value = $this->validate_ask($question, $rules);
        }

        return $value;
    }

    public function validateInput($rules, $value): bool|string
    {
        $validator = Validator::make([key($rules) => $value], $rules);

        if ($validator->fails()) {
            return $validator->errors()->first(key($rules));
        }

        return true;
    }
}
