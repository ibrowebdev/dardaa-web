<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/quote', [QuoteController::class, 'index'])->name('quote');
Route::post('/quote', [QuoteController::class, 'submit'])->name('quote.submit');
Route::get('/quote/thank-you', [QuoteController::class, 'thankyou'])->name('quote.thankyou');

Route::get('/careers', [CareersController::class, 'index'])->name('careers');
Route::get('/careers/{slug}', [CareersController::class, 'show'])->name('careers.show');
Route::post('/careers/{slug}/apply', [CareersController::class, 'apply'])->name('careers.apply');

// ============================
// ADMIN PANEL ROUTES
// ============================
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminQuoteController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminTeamController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminJobController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Controllers\Admin\AdminAuthController;

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['admin'])
    ->group(function () {

        // Dashboard
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        
        // Contacts
        Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
        Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
        Route::patch('/contacts/{contact}/mark-read', [AdminContactController::class, 'markRead'])->name('contacts.markRead');

        // Quote Requests
        Route::get('/quotes', [AdminQuoteController::class, 'index'])->name('quotes.index');
        Route::get('/quotes/{quote}', [AdminQuoteController::class, 'show'])->name('quotes.show');
        Route::delete('/quotes/{quote}', [AdminQuoteController::class, 'destroy'])->name('quotes.destroy');

        // Projects / Portfolio
        Route::resource('projects', AdminProjectController::class);

        // Blog Posts
        Route::resource('posts', AdminPostController::class);

        // Team Members
        Route::resource('team', AdminTeamController::class);

        // Testimonials
        Route::resource('testimonials', AdminTestimonialController::class);

        // Jobs / Careers
        Route::resource('jobs', AdminJobController::class);
        Route::get('/jobs/{job}/applications', [AdminJobController::class, 'applications'])->name('jobs.applications');
        Route::get('/jobs/{job}/applications/{application}', [AdminJobController::class, 'viewApplication'])->name('jobs.applications.show');
        Route::delete('/jobs/{job}/applications/{application}', [AdminJobController::class, 'destroyApplication'])->name('jobs.applications.destroy');

        // Settings
        Route::get('/settings', [AdminSettingsController::class, 'index'])->name('settings.index');
        Route::post('/settings', [AdminSettingsController::class, 'update'])->name('settings.update');
    });

// Admin Auth Routes (no auth middleware)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

