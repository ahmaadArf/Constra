<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\FactController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\ClinetController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ProjectDetailController;

// Dashoard Routes
                //->middleware('auth','check_user')
Route::prefix('admin')->name('admin.')->group(function () {
    //Admin Route
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('users',[AdminController::class,'user'])->name('users');
    Route::delete('users/destroy/{id}',[AdminController::class,'destroy'])->name('users.destroy');

    //Clinet Route
    Route::get('clients/trash', [ClinetController::class, 'trash'])->name('clients.trash');
    Route::get('clients/{id}/restore', [ClinetController::class, 'restore'])->name('clients.restore');
    Route::delete('clients/{id}/forcedelete', [ClinetController::class, 'forcedelete'])->name('clients.forcedelete');
    Route::resource('clients',ClinetController::class);

    //Fact Route
    Route::get('facts/trash', [FactController::class, 'trash'])->name('facts.trash');
    Route::get('facts/{id}/restore', [FactController::class, 'restore'])->name('facts.restore');
    Route::delete('facts/{id}/forcedelete', [FactController::class, 'forcedelete'])->name('facts.forcedelete');
    Route::resource('facts',FactController::class);

    //Image Route
    Route::resource('images',ImageController::class);

    //Menu Route
    Route::get('menus/trash', [MenuController::class, 'trash'])->name('menus.trash');
    Route::get('menus/{id}/restore', [MenuController::class, 'restore'])->name('menus.restore');
    Route::delete('menus/{id}/forcedelete', [MenuController::class, 'forcedelete'])->name('menus.forcedelete');
    Route::resource('menus',MenuController::class);

    //Post Route
    Route::get('posts/trash', [PostController::class, 'trash'])->name('posts.trash');
    Route::get('posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::delete('posts/{id}/forcedelete', [PostController::class, 'forcedelete'])->name('posts.forcedelete');
    Route::resource('posts',PostController::class);

    //Price Route
    Route::get('prices/trash', [PriceController::class, 'trash'])->name('prices.trash');
    Route::get('prices/{id}/restore', [PriceController::class, 'restore'])->name('prices.restore');
    Route::delete('prices/{id}/forcedelete', [PriceController::class, 'forcedelete'])->name('prices.forcedelete');
    Route::resource('prices',PriceController::class);

    //Project Route
    Route::get('projects/trash', [ProjectController::class, 'trash'])->name('projects.trash');
    Route::get('projects/{id}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
    Route::delete('projects/{id}/forcedelete', [ProjectController::class, 'forcedelete'])->name('projects.forcedelete');
    Route::resource('projects',ProjectController::class);

    //Project-detail Route
    Route::get('Project_details/trash', [ProjectDetailController::class, 'trash'])->name('Project_details.trash');
    Route::get('Project_details/{id}/restore', [ProjectDetailController::class, 'restore'])->name('Project_details.restore');
    Route::delete('Project_details/{id}/forcedelete', [ProjectDetailController::class, 'forcedelete'])->name('Project_details.forcedelete');
    Route::resource('Project_details',ProjectDetailController::class);

    //Question Route
    Route::get('questions/trash', [QuestionController::class, 'trash'])->name('questions.trash');
    Route::get('questions/{id}/restore', [QuestionController::class, 'restore'])->name('questions.restore');
    Route::delete('questions/{id}/forcedelete', [QuestionController::class, 'forcedelete'])->name('questions.forcedelete');
    Route::resource('questions',QuestionController::class);

    //Slider Route
    Route::get('sliders/trash', [SliderController::class, 'trash'])->name('sliders.trash');
    Route::get('sliders/{id}/restore', [SliderController::class, 'restore'])->name('sliders.restore');
    Route::delete('sliders/{id}/forcedelete', [SliderController::class, 'forcedelete'])->name('sliders.forcedelete');
    Route::resource('sliders',SliderController::class);

    //Team Route
    Route::get('teams/trash', [TeamController::class, 'trash'])->name('teams.trash');
    Route::get('teams/{id}/restore', [TeamController::class, 'restore'])->name('teams.restore');
    Route::delete('teams/{id}/forcedelete', [TeamController::class, 'forcedelete'])->name('teams.forcedelete');
    Route::resource('teams',TeamController::class);

    //Service Route
    Route::get('services/trash', [ServiceController::class, 'trash'])->name('services.trash');
    Route::get('services/{id}/restore', [ServiceController::class, 'restore'])->name('services.restore');
    Route::delete('services/{id}/forcedelete', [ServiceController::class, 'forcedelete'])->name('services.forcedelete');
    Route::resource('services',ServiceController::class);

    //Testimonial Route
    Route::get('testimonials/trash', [TestimonialController::class, 'trash'])->name('testimonials.trash');
    Route::get('testimonials/{id}/restore', [TestimonialController::class, 'restore'])->name('testimonials.restore');
    Route::delete('testimonials/{id}/forcedelete', [TestimonialController::class, 'forcedelete'])->name('testimonials.forcedelete');
    Route::resource('testimonials',TestimonialController::class);




});

//->middleware('auth','check_user')
Auth::routes();
Route::view('not','not_allawd');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/',[SiteController::class,'index'])->name('site.index');
Route::get('/services',[SiteController::class,'services'])->name('site.services');
Route::get('/about',[SiteController::class,'about'])->name('site.about');
Route::get('/teams',[SiteController::class,'teams'])->name('site.teams');
Route::get('/contact',[SiteController::class,'contact'])->name('site.contact');
Route::get('/service-single/{id}',[SiteController::class,'service_single'])->name('site.service-single');
Route::get('/project-single/{id}',[SiteController::class,'project_single'])->name('site.project-single');
Route::get('/news-single/{id}',[SiteController::class,'news_single'])->name('site.news-single');
Route::get('/projects',[SiteController::class,'projects'])->name('site.projects');
Route::get('/news',[SiteController::class,'news'])->name('site.news');
Route::get('/testimonials',[SiteController::class,'testimonials'])->name('site.testimonials');
Route::get('/faqs',[SiteController::class,'faqs'])->name('site.faqs');

