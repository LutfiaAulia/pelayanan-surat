<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'  =>'admin1',
                'nkkip' =>'12345',
                'role' => 'admin',
                'password'  =>Hash::make('admin123')
            ],
            [
                'name'  =>'masyarakat1',
                'nkkip' =>'23456',
                'role' => 'masyarakat',
                'password'  =>Hash::make('masyarakat123')
            ],
            [
                'name'  =>'walinagari1',
                'nkkip' =>'34567',
                'role' => 'walinagari',
                'password'  =>Hash::make('walinagari123')
            ]
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
