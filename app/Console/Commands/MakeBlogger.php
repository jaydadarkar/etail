<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class MakeBlogger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:blogger {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make an existing user "Blogger" by passing his email.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();
        if(empty($user)){
            $this->error('Could not find the specfied user.');
        }
        else{
            User::where('email', $email)->update(['role' => 'blogger']);
            $this->info($email.' is now a Blogger.');
        }
    }
}
