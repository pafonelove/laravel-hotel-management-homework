<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

/* Комментирование старого маршрута перенаправления. 
Route::get('/', function () {
    return view('home.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/

// Перенаправление на актуальную страницу при переходе на сайт до авторизации.
route::get('/',[AdminController::class,'home']);

// Перенаправление на актуальные страницы после авторизации.
route::get('/home', [AdminController::class,'index'])->name('home');

// Перенаправление на страницу создания комнат для бронирования на сайте.
route::get('/create_room', [AdminController::class,'create_room']);

// Создание новой комнаты для бронирования после заполнения формы.
route::post('/add_room', [AdminController::class,'add_room']);

// Отображение созданных комнат в админ-панели.
route::get('/view_room', [AdminController::class,'view_room']);

// Раздел "Our Room".
route::get('/our_rooms', [HomeController::class,'our_rooms']);

// Удаление комнаты из БД по id.
route::get('/delete_room/{id}', [AdminController::class,'delete_room']);

// Обновление данных комнаты в БД по id.
route::get('/update_room/{id}', [AdminController::class,'update_room']);

// Изменение данных комнаты в БД по id.
route::post('/edit_room/{id}', [AdminController::class,'edit_room']);

// Отображение детальной информации о комнате по id.
route::get('/details_room/{id}', [HomeController::class,'details_room']);

// Добавление брони в БД.
route::post('/add_booking/{id}', [HomeController::class,'add_booking']);

// Отображение броней в админ-панели.
route::get('/bookings', [AdminController::class,'bookings']);//->middleware(['auth', 'admin']);

// Удаление брони из БД по id.
route::get('/delete_booking/{id}', [AdminController::class,'delete_booking']);

// Подтвердить бронь в админ-панели.
route::get('/approve_book/{id}', [AdminController::class,'approve_book']);

// Отклонить бронь в админ-панели.
route::get('/reject_book/{id}', [AdminController::class,'reject_book']);

// Показать галлерею изображений в админ-панели.
route::get('/view_gallery', [AdminController::class,'view_gallery']);

// Раздел "Gallery".
route::get('/hotel_gallery', [HomeController::class,'hotel_gallery']);

// Загрузить изображение в галлерею админ-панели.
route::post('/upload_gallery', [AdminController::class,'upload_gallery']);

// Удалить изображение из галлереи в админ-панели.
route::get('/delete_gallery/{id}', [AdminController::class,'delete_gallery']);

// Отправить сообщение администарции через форму обратной связи.
route::post('/contact', [HomeController::class, 'contact']);

// Показать все сообщения пользователей в админ-панели.
route::get('/view_messages', [AdminController::class,'view_messages']);

// Отобразить страницу с формой отправки сообщения пользователю на электронную почту.
route::get('/send_mail/{id}', [AdminController::class, 'send_mail']);

// Отправить сообщение пользователю на электронную почту.
route::post('/mail/{id}', [AdminController::class, 'mail']);

// Раздел "Contact Us".
route::get('/contact_us', [HomeController::class,'contact_us']);

// Раздел "About".
route::get('/about_us', [HomeController::class,'about_us']);