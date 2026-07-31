// resources/js/api.js

import axios from 'axios';

// تنظیمات اولیه axios
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.withCredentials = true;

// تابع برای ویرایش کاربر با PUT
export function updateUserComplete(userId, userData) {
    return axios.put(`/users/${userId}`, userData);
}

// تابع برای ویرایش جزئی کاربر با PATCH
export function updateUserPartial(userId, userData) {
    return axios.patch(`/users/${userId}`, userData);
}

// مثال استفاده
const userId = 1;

// PUT - همه فیلدها
updateUserComplete(userId, {
    name: 'رضا کریمی',
    email: 'ali@email.com',
    age: 28,
    phone: '09121234567'
}).then(response => {
    console.log('به‌روزرسانی کامل انجام شد:', response.data);
}).catch(error => {
    console.error('خطا:', error);
});

// PATCH - فقط اسم
updateUserPartial(userId, {
    name: 'رضا کریمی'  // فقط همین یک فیلد
}).then(response => {
    console.log('به‌روزرسانی جزئی انجام شد:', response.data);
});


// برای تست، یک alert ساده اضافه کنید
// alert('فای');
// console.log('api.js loaded successfully!');