<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class MakeManager extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:manager {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make an existing user "Manager" by passing his email.';

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
            User::where('email', $email)->update(['role' => 'manager']);
            $this->info($email.' is now a Manager.');
        }

    }
}
