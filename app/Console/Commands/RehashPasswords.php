<?php

namespace App\Console\Commands;

use App\Models\UserAccount;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class RehashPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rehash-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

         // Get all users
        //  $users = UserAccount::all();

        $user = UserAccount::where('email', 'dharmendra@franchiseindia.net')->first();

        if (!$user) {
            $this->error('User not found.');
            return;
        }

         foreach ($users as $user) {
             // Check if the password needs rehashing
             if (password_needs_rehash($user->password, PASSWORD_BCRYPT)) {
                 // Rehash the password
                 $user->password = Hash::make($user->password);
                 $user->save();
             }
         }
 
         $this->info('Passwords rehashed successfully.');
     }
    }

