<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // نمایش اطلاعات کاربر
    public function show($id)
    {
        // داده‌های نمونه (در现实中 باید از دیتابیس بگیرید)
        $users = [
            1 => [
                'id' => 1,
                'name' => 'رضا کریمی',
                'email' => 'reza@email.com',
                'age' => 28,
                'phone' => '09121234567'
            ],
            2 => [
                'id' => 2,
                'name' => 'علی محمدی',
                'email' => 'ali@email.com',
                'age' => 32,
                'phone' => '09129876543'
            ]
        ];

        if (!isset($users[$id])) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($users[$id]);
    }

    // به‌روزرسانی کامل کاربر (PUT)
    public function update(Request $request, $id)
    {
        // اعتبارسنجی داده‌ها
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'age' => 'required|integer|min:1|max:150',
            'phone' => 'required|string|max:20'
        ]);

        // در现实中، اینجا کاربر را در دیتابیس به‌روزرسانی می‌کنید
        return response()->json([
            'message' => 'User updated successfully (PUT)',
            'user' => array_merge(['id' => $id], $validated)
        ]);
    }

    // به‌روزرسانی جزئی کاربر (PATCH)
    public function partialUpdate(Request $request, $id)
    {
        // اعتبارسنجی داده‌ها (فیلدها اختیاری هستند)
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'age' => 'sometimes|integer|min:1|max:150',
            'phone' => 'sometimes|string|max:20'
        ]);

        // در现实中، اینجا کاربر را در دیتابیس به‌روزرسانی می‌کنید
        return response()->json([
            'message' => 'User updated successfully (PATCH)',
            'user' => array_merge(['id' => $id], $validated)
        ]);
    }
}