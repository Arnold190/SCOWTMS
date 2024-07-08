<?php 


namespace App\Policies;

use App\Models\User;
use App\Models\Task;

class TaskPolicy
{
    public function create(User $user)
    {
        // Check if the user is authorized to create tasks
        // For example, you might check if the user has a specific role or permission
        return true; // For simplicity, allow all users to create tasks
    }
}
