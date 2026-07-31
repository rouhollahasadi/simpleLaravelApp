<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // نمایش لیست کاربران
    public function index()
    {
        return "User List";
    }

    // فرم ایجاد کاربر
    public function create()
    {
        return "Create User";
    }

    // ذخیره کاربر جدید
    public function store(Request $request)
    {
        return "Store User";
    }

    // نمایش یک کاربر
    public function show(int $id)
    {
        return "Show User: " . $id;
    }

    // فرم ویرایش کاربر
    public function edit(int $id)
    {
        return "Edit User: " . $id;
    }

    // بروزرسانی کاربر
    public function update(Request $request, int $id)
    {
        return "Update User: " . $id;
    }

    // حذف کاربر
    public function destroy(int $id)
    {
        return "Delete User: " . $id;
    }

    
}

