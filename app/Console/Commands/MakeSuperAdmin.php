<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB; // Import DB

class MakeSuperAdmin extends Command
{
    protected $signature = 'make:superadmin
                            {email? : The email of the user}
                            {--id= : The ID of the user}';

    protected $description = 'Makes a user a super admin (assigns role and sets is_admin).';

    public function handle()
    {
        $email = $this->argument('email');
        $userId = $this->option('id');

        if (!$email && !$userId) {
            $this->error('You must provide either an email or a user ID.');
            return 1;
        }
        if ($email && $userId) {
            $this->error('You must provide either an email or a user ID. Not Both');
            return 1;
        }
         if ($email) {
             $validator = Validator::make(['email' => $email], [
                'email' => 'required|email|exists:users,email', // Validate: required, email, exists in users table
             ]);
             if ($validator->fails()) {
                 $this->error($validator->errors()->first()); // Display validation errors
                return 1;
             }
             $user = User::where('email', $email)->first();
        }

         if ($userId) {
             $validator = Validator::make(['id' => $userId], [
                 'id' => 'required|integer|exists:users,id', // Validate: required, email, exists in users table
              ]);

            if ($validator->fails()) {
                $this->error($validator->errors()->first());
                return 1;
            }

            $user = User::find($userId);
        }

        // Check if the user exists
        if (!$user) {
            $this->error('User not found.');
            return 1;
        }

        // Use a database transaction for atomicity
        DB::beginTransaction();

        try {
            // Find or create the 'super_admin' role
            $role = Role::findOrCreate('super_admin');

            // Assign the role to the user
            $user->assignRole($role);

            // Set is_admin to true (optional, but good for redundancy)
            $user->is_admin = true;
            $user->save();

            DB::commit(); // Commit the changes

            $this->info("User {$user->email} is now a super admin.");
            return 0; // Success

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback if any error occurred
            $this->error('An error occurred: ' . $e->getMessage());
            return 1; // Failure
        }
    }
}
