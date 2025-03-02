<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeCounter;

class HomeCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new HomeCounter;
        $obj->item1_icon = "fa fa-calendar";
        $obj->item1_number = "3";
        $obj->item1_title = "Days Event";
        $obj->item2_icon = "fa fa-user";
        $obj->item2_number = "8";
        $obj->item2_title = "Speakers";
        $obj->item3_icon = "fa fa-users";
        $obj->item3_number = "60";
        $obj->item3_title = "Members Registered";
        $obj->item4_icon = "fa fa-th-list";
        $obj->item4_number = "12";
        $obj->item4_title = "Sponsors";
        $obj->status = "show";
        $obj->save();
    }
}
