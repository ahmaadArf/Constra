<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
            'clinet-list','clinet-create','clinet-edit','clinet-delete',
            'fact-list','fact-create','fact-edit','fact-delete',
            'image-list','image-create','image-edit','image-delete',
            'menu-list','menu-create','menu-edit','menu-delete',
            'post-list','post-create','post-edit','post-delete',
            'price-list','price-create','price-edit','price-delete',
            'project-list','project-create','project-edit','project-delete',
            'projectDetail-list','projectDetail-create','projectDetail-edit','projectDetail-delete',
            'question-list','question-create','question-edit','question-delete',
            'role-list','role-create','role-edit','role-delete',
            'service-list','service-create','service-edit','service-delete',
            'slider-list','slider-create','slider-edit','slider-delete',
            'team-list','team-create','team-edit','team-delete',
            'testimonial-list','testimonial-create','testimonial-edit','testimonial-delete',
            'user-list','user-create','user-edit','user-delete',

        ];
        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }
    }
}
