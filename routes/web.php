<?php

use Illuminate\Support\Facades\Route;

// Import all controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Dashboard\StudentDashboardController;
use App\Http\Controllers\Dashboard\InstructorDashboardController;
use App\Http\Controllers\Dashboard\MentorDashboardController;
use App\Http\Controllers\Dashboard\FreelancerDashboardController;
use App\Http\Controllers\Dashboard\CommunityDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminPaymentController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminSupportController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminCmsController;
use App\Http\Controllers\Admin\AdminSettingsController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home.alias');
Route::get('/homepage', [HomeController::class, 'index'])->name('homepage.alias');
Route::get('/home-page', [HomeController::class, 'index'])->name('homepage.dash.alias');

// Dashboard Aliases
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard.alias');
Route::get('/instructor/dashboard', [InstructorDashboardController::class, 'index'])->name('instructor.dashboard.alias');
Route::get('/mentor/dashboard', [MentorDashboardController::class, 'index'])->name('mentor.dashboard.alias');
Route::get('/freelancer/dashboard', [FreelancerDashboardController::class, 'index'])->name('freelancer.dashboard.alias');

// Tutorials (global learning platform)
Route::get('/tutorials', [TutorialController::class, 'index'])->name('tutorials.index');
Route::get('/tutorials/{lang}/{topic?}', [TutorialController::class, 'show'])->name('tutorials.show');

// Courses & Categories
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

// Mentors
Route::get('/mentors', [MentorController::class, 'index'])->name('mentors.index');
Route::get('/mentors/{id}', [MentorController::class, 'show'])->name('mentors.show');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Communities
Route::get('/communities', [CommunityController::class, 'index'])->name('communities.index');
Route::get('/communities/{slug}', [CommunityController::class, 'show'])->name('communities.show');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Jobs
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{slug}', [JobController::class, 'show'])->name('jobs.show');

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Static Pages
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/page/{slug}', [PageController::class, 'show'])->name('pages.show');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    
    // Course Actions
    Route::get('/courses/{slug}/learn', [CourseController::class, 'learn'])->name('courses.learn');
    Route::post('/courses/{slug}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
    
    // Mentor Booking
    Route::post('/mentors/{id}/book', [MentorController::class, 'book'])->name('mentors.book');
    
    // Service Order
    Route::post('/services/{slug}/order', [ServiceController::class, 'order'])->name('services.order');
    
    // Community Actions
    Route::post('/communities/{slug}/join', [CommunityController::class, 'join'])->name('communities.join');
    Route::post('/communities/{slug}/leave', [CommunityController::class, 'leave'])->name('communities.leave');
    
    // Blog Comments
    Route::post('/blog/{slug}/comment', [BlogController::class, 'comment'])->name('blog.comment');
    
    // Job Applications
    Route::post('/jobs/{slug}/apply', [JobController::class, 'apply'])->name('jobs.apply');
    
    // Messages
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages/{id}/send', [MessageController::class, 'send'])->name('messages.send');
    Route::post('/messages/create', [MessageController::class, 'create'])->name('messages.create');
    
    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
    
    /*
    |--------------------------------------------------------------------------
    | Student Dashboard
    |--------------------------------------------------------------------------
    */
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [StudentDashboardController::class, 'index'])->name('index');
        Route::get('/my-courses', [StudentDashboardController::class, 'myCourses'])->name('courses');
        Route::get('/my-learning', [StudentDashboardController::class, 'myLearning'])->name('learning');
        Route::get('/wishlist', [StudentDashboardController::class, 'wishlist'])->name('wishlist');
        Route::get('/certificates', [StudentDashboardController::class, 'certificates'])->name('certificates');
        Route::get('/downloads', [StudentDashboardController::class, 'downloads'])->name('downloads');
        Route::get('/notes', [StudentDashboardController::class, 'notes'])->name('notes');
        Route::get('/orders', [StudentDashboardController::class, 'orders'])->name('orders');
        Route::get('/settings', [StudentDashboardController::class, 'settings'])->name('settings');
        Route::put('/settings', [StudentDashboardController::class, 'updateSettings'])->name('settings.update');
    });
    
    /*
    |--------------------------------------------------------------------------
    | Instructor Dashboard
    |--------------------------------------------------------------------------
    */
    Route::prefix('instructor')->name('instructor.')->middleware('role:instructor,admin')->group(function () {
        Route::get('/', [InstructorDashboardController::class, 'index'])->name('dashboard');
        Route::get('/courses', [InstructorDashboardController::class, 'manageCourses'])->name('courses');
        Route::get('/courses/create', [InstructorDashboardController::class, 'createCourse'])->name('courses.create');
        Route::post('/courses', [InstructorDashboardController::class, 'storeCourse'])->name('courses.store');
        Route::get('/courses/{id}/edit', [InstructorDashboardController::class, 'editCourse'])->name('courses.edit');
        Route::put('/courses/{id}', [InstructorDashboardController::class, 'updateCourse'])->name('courses.update');
        Route::delete('/courses/{id}', [InstructorDashboardController::class, 'deleteCourse'])->name('courses.destroy');
        Route::get('/students', [InstructorDashboardController::class, 'students'])->name('students');
        Route::get('/revenue', [InstructorDashboardController::class, 'revenue'])->name('revenue');
        Route::get('/withdraw', [InstructorDashboardController::class, 'withdraw'])->name('withdraw');
        Route::post('/withdraw', [InstructorDashboardController::class, 'requestWithdraw'])->name('withdraw.request');
        Route::get('/reviews', [InstructorDashboardController::class, 'reviews'])->name('reviews');
        Route::get('/analytics', [InstructorDashboardController::class, 'analytics'])->name('analytics');
        Route::get('/coupons', [InstructorDashboardController::class, 'coupons'])->name('coupons');
        Route::post('/coupons', [InstructorDashboardController::class, 'createCoupon'])->name('coupons.store');
        Route::get('/settings', [InstructorDashboardController::class, 'settings'])->name('settings');
        Route::put('/settings', [InstructorDashboardController::class, 'updateSettings'])->name('settings.update');
    });
    
    /*
    |--------------------------------------------------------------------------
    | Mentor Dashboard
    |--------------------------------------------------------------------------
    */
    Route::prefix('mentor-dashboard')->name('mentor.')->middleware('role:mentor,admin')->group(function () {
        Route::get('/', [MentorDashboardController::class, 'index'])->name('dashboard');
        Route::get('/appointments', [MentorDashboardController::class, 'appointments'])->name('appointments');
        Route::get('/availability', [MentorDashboardController::class, 'availability'])->name('availability');
        Route::put('/availability', [MentorDashboardController::class, 'updateAvailability'])->name('availability.update');
        Route::get('/packages', [MentorDashboardController::class, 'packages'])->name('packages');
        Route::post('/packages', [MentorDashboardController::class, 'createPackage'])->name('packages.store');
        Route::put('/packages/{id}', [MentorDashboardController::class, 'updatePackage'])->name('packages.update');
        Route::delete('/packages/{id}', [MentorDashboardController::class, 'deletePackage'])->name('packages.destroy');
        Route::get('/reviews', [MentorDashboardController::class, 'reviews'])->name('reviews');
        Route::get('/revenue', [MentorDashboardController::class, 'revenue'])->name('revenue');
        Route::get('/settings', [MentorDashboardController::class, 'settings'])->name('settings');
        Route::put('/settings', [MentorDashboardController::class, 'updateSettings'])->name('settings.update');
    });
    
    /*
    |--------------------------------------------------------------------------
    | Freelancer Dashboard
    |--------------------------------------------------------------------------
    */
    Route::prefix('freelancer')->name('freelancer.')->middleware('role:freelancer,admin')->group(function () {
        Route::get('/', [FreelancerDashboardController::class, 'index'])->name('dashboard');
        Route::get('/services', [FreelancerDashboardController::class, 'services'])->name('services');
        Route::get('/services/create', [FreelancerDashboardController::class, 'createService'])->name('services.create');
        Route::post('/services', [FreelancerDashboardController::class, 'storeService'])->name('services.store');
        Route::get('/services/{id}/edit', [FreelancerDashboardController::class, 'editService'])->name('services.edit');
        Route::put('/services/{id}', [FreelancerDashboardController::class, 'updateService'])->name('services.update');
        Route::delete('/services/{id}', [FreelancerDashboardController::class, 'deleteService'])->name('services.destroy');
        Route::get('/orders', [FreelancerDashboardController::class, 'orders'])->name('orders');
        Route::put('/orders/{id}/status', [FreelancerDashboardController::class, 'updateOrderStatus'])->name('orders.status');
        Route::get('/portfolio', [FreelancerDashboardController::class, 'portfolio'])->name('portfolio');
        Route::get('/reviews', [FreelancerDashboardController::class, 'reviews'])->name('reviews');
        Route::get('/payments', [FreelancerDashboardController::class, 'payments'])->name('payments');
        Route::get('/analytics', [FreelancerDashboardController::class, 'analytics'])->name('analytics');
        Route::get('/settings', [FreelancerDashboardController::class, 'settings'])->name('settings');
    });
    
    /*
    |--------------------------------------------------------------------------
    | Community Dashboard
    |--------------------------------------------------------------------------
    */
    Route::prefix('community-manage')->name('community-dashboard.')->group(function () {
        Route::get('/', [CommunityDashboardController::class, 'index'])->name('index');
        Route::get('/{community}/posts', [CommunityDashboardController::class, 'posts'])->name('posts');
        Route::post('/{community}/posts', [CommunityDashboardController::class, 'createPost'])->name('posts.store');
        Route::get('/{community}/members', [CommunityDashboardController::class, 'members'])->name('members');
        Route::put('/{community}/members/{user}/role', [CommunityDashboardController::class, 'updateMemberRole'])->name('members.role');
        Route::delete('/{community}/members/{user}', [CommunityDashboardController::class, 'removeMember'])->name('members.remove');
        Route::get('/{community}/events', [CommunityDashboardController::class, 'events'])->name('events');
        Route::post('/{community}/events', [CommunityDashboardController::class, 'createEvent'])->name('events.store');
        Route::get('/{community}/announcements', [CommunityDashboardController::class, 'announcements'])->name('announcements');
        Route::get('/{community}/settings', [CommunityDashboardController::class, 'settings'])->name('settings');
    });

    Route::get('/community-dashboard', [CommunityDashboardController::class, 'index'])->name('community.dash.alias');
    Route::get('/community_dashboard', [CommunityDashboardController::class, 'index'])->name('community.dash.underscore.alias');
    Route::get('/community/dashboard', [CommunityDashboardController::class, 'index'])->name('community.dash.slash.alias');
    Route::get('/instructor/dashboard', [InstructorDashboardController::class, 'index'])->name('instructor.dash.alias');
    Route::get('/mentor/dashboard', [MentorDashboardController::class, 'index'])->name('mentor.dash.alias');
    Route::get('/freelancer/dashboard', [FreelancerDashboardController::class, 'index'])->name('freelancer.dash.alias');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Users
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [AdminUserController::class, 'show'])->name('users.show');
    Route::put('/users/{id}/role', [AdminUserController::class, 'updateRole'])->name('users.updateRole');
    Route::post('/users/{id}/toggle-active', [AdminUserController::class, 'toggleActive'])->name('users.toggleActive');
    Route::post('/users/{id}/toggle-verified', [AdminUserController::class, 'toggleVerified'])->name('users.toggleVerified');
    Route::delete('/users/{id}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    
    // Courses
    Route::get('/courses', [AdminCourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{id}', [AdminCourseController::class, 'show'])->name('courses.show');
    Route::put('/courses/{id}/status', [AdminCourseController::class, 'updateStatus'])->name('courses.status');
    Route::post('/courses/{id}/toggle-featured', [AdminCourseController::class, 'toggleFeatured'])->name('courses.toggleFeatured');
    Route::delete('/courses/{id}', [AdminCourseController::class, 'destroy'])->name('courses.destroy');
    
    // Categories
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{id}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');
    
    // Payments
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('payments.index');
    Route::get('/withdrawals', [AdminPaymentController::class, 'withdrawals'])->name('withdrawals.index');
    Route::post('/withdrawals/{id}/approve', [AdminPaymentController::class, 'approveWithdrawal'])->name('withdrawals.approve');
    Route::post('/withdrawals/{id}/reject', [AdminPaymentController::class, 'rejectWithdrawal'])->name('withdrawals.reject');
    
    // Reports & Analytics
    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports.index');
    Route::get('/analytics', [AdminReportController::class, 'analytics'])->name('analytics.index');
    
    // Support
    Route::get('/support', [AdminSupportController::class, 'index'])->name('support.index');
    Route::get('/support/{id}', [AdminSupportController::class, 'show'])->name('support.show');
    Route::post('/support/{id}/reply', [AdminSupportController::class, 'reply'])->name('support.reply');
    Route::put('/support/{id}/status', [AdminSupportController::class, 'updateStatus'])->name('support.status');
    
    // Blog
    Route::get('/blog', [AdminBlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [AdminBlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [AdminBlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{id}/edit', [AdminBlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}', [AdminBlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{id}', [AdminBlogController::class, 'destroy'])->name('blog.destroy');
    
    // CMS
    Route::get('/cms', [AdminCmsController::class, 'index'])->name('cms.index');
    Route::get('/cms/create', [AdminCmsController::class, 'create'])->name('cms.create');
    Route::post('/cms', [AdminCmsController::class, 'store'])->name('cms.store');
    Route::get('/cms/{id}/edit', [AdminCmsController::class, 'edit'])->name('cms.edit');
    Route::put('/cms/{id}', [AdminCmsController::class, 'update'])->name('cms.update');
    Route::delete('/cms/{id}', [AdminCmsController::class, 'destroy'])->name('cms.destroy');
    
    // Settings
    Route::get('/settings', [AdminSettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [AdminSettingsController::class, 'update'])->name('settings.update');
});

// Include auth routes
require __DIR__.'/auth.php';
