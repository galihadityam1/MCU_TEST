<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::insert([
            ['employee_id' => 1, 'task_name' => 'Mengerjakan API', 'due_date' => '2024-09-15'],
            ['employee_id' => 2, 'task_name' => 'Membuat desain UI halaman create', 'due_date' => '2024-09-20'],
            ['employee_id' => 1, 'task_name' => 'Slicing HTML', 'due_date' => '2024-08-02'],
            ['employee_id' => 2, 'task_name' => 'Membuat icon', 'due_date' => '2024-10-03'],
            ['employee_id' => 2, 'task_name' => 'Mengubah ukuran gambar', 'due_date' => '2024-10-03'],
        ]);
    }
}
