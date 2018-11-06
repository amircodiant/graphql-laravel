<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {email : email of user} {--Q|queue=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail on given email.';

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
     * @return mixed
     */
    public function handle()
    {
        // $name = $this->choice('What is your name?', ['Taylor', 'Dayle'], 0);
        // echo $name;

        // $password = $this->secret('What is the password?');

        // echo $password;

        // echo "mail has been sent on ". $this->argument('email');
        // echo "\n";
        // echo $this->option('queue');

        $this->info('Display this on the screen');
        $this->error('Something went wrong!');
        $this->line('Display this on the screen');
        $headers = ['Name', 'Email'];
        $users = [["name"=>"amir ansari","email"=>"amir@gmail.com"],["name"=>"imran","email"=>"imran@gmail.com"]];
        $this->table($headers, $users);


        


    }
}
