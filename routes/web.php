<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PdfaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\admin\SuperController;
use App\Http\Controllers\PlanCheckoutController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\admin\PlanAdminController;
use App\Http\Controllers\Admin\UserAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware([
    'auth',
    
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        // Check the user's role and return the corresponding dashboard view
        if ($user->role === 'basic') {
            return app(PdfaiController::class)->index();
        } elseif ($user->role === 'super') {
            return app(SuperController::class)->index();
        }

        // Default case if the user's role doesn't match any specific dashboard
        abort(404, '404 Not Found');

    });
});

// pdfai routes
// pdf
Route::middleware(['auth', 'role:basic'])->group(function () {
Route::get('/pdf', [PdfaiController::class, 'index'])->name('pdf.index');
Route::get('/pdf/create', [PdfaiController::class, 'create'])->name('pdf.create');
Route::post('/pdf/upload', [PdfaiController::class, 'store'])->name('pdf.store');
Route::get('/pdf/{pdfai:slug}', [PdfaiController::class, 'show'])->name('pdf.show');
Route::post('/pdf/ask-question', [PdfaiController::class, 'askQuestion'])->name('ask.question');
Route::delete('/pdf/{doc:slug}', [PdfaiController::class, 'destroy'])->name('pdf.destroy');
});

// checkout
//checkout
Route::get('/plans',PlanController::class)->name('checkout');
Route::post('/{plan:slug}/checkout', PlanCheckoutController::class)->name('checkout.index');
Route::post('/stripe/webhook', StripeWebhookController::class)->name('stripe.webhook');



// super
Route::middleware(['auth', 'role:super'])->group(function () {
 Route::get('/super', [SuperController::class, 'index'])->name('super.index');
 Route::get('/super/sale', [SaleController::class, 'index'])->name('sale.index');

// plan
 Route::get('/super/plan', [PlanAdminController::class, 'index'])->name('plan.index');
 Route::get('/super/plan/create', [PlanAdminController::class, 'create'])->name('plan.create');
 Route::post('/super/plan', [PlanAdminController::class, 'store'])->name('plan.store');
 Route::get('/super/plan/{plan:slug}', [PlanAdminController::class, 'edit'])->name('plan.edit');
Route::put('/super/plan/{plan:slug}/update', [PlanAdminController::class, 'update'])->name('plan.update');
Route::delete('/super/plan/{plan:slug}', [PlanAdminController::class, 'destroy'])->name('plan.destroy');

// users
Route::get('/super/users', [UserAdminController::class, 'index'])->name('user.index');
    
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
