<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\AdminModel;

class CreateAdmin extends BaseCommand
{
    protected $group       = 'Custom';
    protected $name        = 'create:admin';
    protected $description = 'Creates a new admin user.';

    public function run(array $params)
    {
        helper('validation');

        // Get and validate the username
        $username = CLI::prompt('Username', null, 'required|min_length[3]|max_length[20]|is_unique[admins.username]');

        // Get and validate the password
        $password = CLI::prompt('Password', null, 'required|min_length[8]');

        // Get and validate the confirm password
        $confirm_password = CLI::prompt('Confirm Password', null, 'required');

        // Check if passwords match
        if ($password !== $confirm_password) {
            CLI::error('Passwords do not match.');
            return;
        }

        // Save the admin user
        $adminModel = new AdminModel();
        $adminModel->save([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        CLI::write('Admin user created successfully.', 'green');
    }
}
