<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class DevPostman extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev:postman {guard : api|web} {user? : Id user}';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generating access for Postman.';

    public function handle()
    {
        if (!App::environment('local')) {
            $this->warn("It works only in local environment.");
            return 1;
        }
        if (!User::query()->count()) {
            $this->warn("Users table is empty.");
            return 1;
        }

        $user = $this->argument('user')
            ? User::query()->findOrFail($this->argument('user'))
            : User::query()->firstOrFail()
        ;

        if ($this->argument('guard') === "api") {
            $result = '
                insert to Bearer Token:
            ' . $user->createToken('test')->plainTextToken;
            $this->output->writeln($result);
            return 0;
        }

        Route::get('/dev-login', function () use ($user) {
            Auth::login($user);
            return response("Hello I`m here.");
        })->middleware('web');

        $request = Request::create('/dev-login');
        $kernel = app()->make(HttpKernel::class);
        $response = $kernel->handle($request);
        $cookies = $response->headers->getCookies('array');
        $cookie1 = $cookies[""]["/"][strtolower(env('APP_NAME')) . '_session'];
        $cookie2 = $cookies[""]["/"]['XSRF-TOKEN'];
        $laravelSession = $cookie1->getValue();
        $xsrfToken = $cookie2->getValue();

        $result = '
            // insert to Pre-request Script:
            pm.request.addHeader({key: "Cookie", value: "' . strtolower(env('APP_NAME')) . '_session='.$laravelSession.'"});
            pm.request.addHeader({key: "X-XSRF-TOKEN", value: "'.$xsrfToken.'"});
        ';

        $this->output->writeln($result);
        return 0;
    }
}
