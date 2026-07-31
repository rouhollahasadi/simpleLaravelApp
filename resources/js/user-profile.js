// resources/js/user-profile.js
import axios from 'axios';

// تنظیمات اولیه axios
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.withCredentials = true;

// تابع برای دریافت اطلاعات کاربر
export function getUserProfile(userId) {
    return axios.get(`/users/${userId}`);
}

// تابع برای نمایش اطلاعات کاربر در صفحه
export function displayUserProfile(userId) {
    const userInfoDiv = document.getElementById('user-info');
    
    if (!userInfoDiv) {
        console.error('Element with id "user-info" not found!');
        return;
    }

    // نمایش پیام در حال بارگذاری
    userInfoDiv.innerHTML = `
        <div style="text-align: center; padding: 20px; background: #f0f0f0; border-radius: 8px;">
            <p>⏳ در حال دریافت اطلاعات کاربر...</p>
        </div>
    `;

    getUserProfile(userId)
        .then(response => {
            const user = response.data;
            console.log('اطلاعات کاربر دریافت شد:', user);
            
            // نمایش اطلاعات کاربر
            userInfoDiv.innerHTML = `
                <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; border: 1px solid #dee2e6;">
                    <h3 style="color: #FF2D20; margin-bottom: 15px;">👤 اطلاعات کاربر</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                        <div><strong>🆔 ID:</strong> ${user.id}</div>
                        <div><strong>👤 نام:</strong> ${user.name}</div>
                        <div><strong>📧 ایمیل:</strong> ${user.email}</div>
                        <div><strong>🎂 سن:</strong> ${user.age} سال</div>
                        <div><strong>📱 تلفن:</strong> ${user.phone}</div>
                    </div>
                </div>
            `;
        })
        .catch(error => {
            console.error('خطا در دریافت اطلاعات کاربر:', error);
            
            // نمایش پیام خطا
            userInfoDiv.innerHTML = `
                <div style="background: #f8d7da; padding: 20px; border-radius: 8px; border: 1px solid #f5c6cb; color: #721c24;">
                    <h4>❌ خطا در دریافت اطلاعات</h4>
                    <p>${error.response?.data?.message || error.message || 'خطای ناشناخته'}</p>
                    <button onclick="location.reload()" style="margin-top: 10px; padding: 8px 16px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">
                        🔄 تلاش مجدد
                    </button>
                </div>
            `;
        });
}

// خودکار اجرا شود
document.addEventListener('DOMContentLoaded', function() {
    const userId = 1; // آیدی کاربر مورد نظر
    displayUserProfile(userId);
});