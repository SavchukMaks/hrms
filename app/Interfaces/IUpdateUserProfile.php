<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface IUpdateUserProfile
{
    public function getName(Request $request);
    public function update(int $id, array $data);
    public function getData(Request $request);

}