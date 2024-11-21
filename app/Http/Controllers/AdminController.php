<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;    // работа с сущностями модели "Комната для бронирования"
use App\Models\Booking; // работа с сущностями модели "Бронь"
use App\Models\Gallery; // работа с сущностями модели "Галлерея"
use App\Models\Contact; // работа с сущностями модели "Контакт"
use App\Notifications\SendMailNotification; // использовать уведомления типа "Уведомление-сообщение на эл. почту"
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index() {
        if(Auth::id()) {
            $usertype = Auth()->user()->usertype;

            // Если заходит обычный пользователь, то отобразить главную страницу.
            if($usertype == 'user') {
                $room = Room::all();
                $gallery = Gallery::all();

                return view('home.index', compact('room', 'gallery'));
            }
            // Иначе если заходит администратор, то отобразить админ-панель.
            else if ($usertype == 'admin') 
                return view('admin.index');
            // Иначе вернуть пользователя без типа авторизации на страницу авторизации.
            else
                return redirect()->back();
        }
    }

    // Отобразить главную страницу с готовыми для брони комнатами и актуальной галлереей.
    public function home() {
        $room = Room::all();
        $gallery = Gallery::all();

        return view('home.index', compact('room', 'gallery'));
    }

    public function create_room() {
        return view('admin.create_room');
    }

    // Добавить новую комнату в БД после заполнения формы в админ-панели.
    public function add_room(Request $request) {
        $data = new Room();
        $data->room_title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->wifi=$request->wifi;
        $data->room_type=$request->type;

        // Добавить изображение.
        $image = $request->image;
        if($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            // Поместить изображение в папку на сервере при создании новой записи через админ-панель.
            $request->image->move('room', $imagename);

            $data->image=$imagename;
        }
        $data->save();

        return redirect()->back();
    }

    // Выбрать все сущности класса Room и вернуть их в view_room.blade.php.
    public function view_room() {
        $data = Room::all();
        return view('admin.view_room', compact('data'));
    }

    // Удаление комнаты из БД по id.
    public function delete_room($id) {
        $data = Room::find($id);
        $data->delete();

        return redirect()->back();
    }

    // Обновление данных комнаты в БД по id.
    public function update_room($id) {
        $data = Room::find($id);
        return view('admin.update_room', compact('data'));
    }

    // Изменение данных в записи БД.
    public function edit_room(Request $request, $id) {
        $data = Room::find($id);
        $data->room_title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->wifi=$request->wifi;
        $data->room_type=$request->type;

        // Добавить изображение.
        $image = $request->image;
        if($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            // Поместить изображение в папку на сервере при создании новой записи через админ-панель.
            $request->image->move('room', $imagename);

            $data->image=$imagename;
        }
        $data->save();

        return redirect()->back();
    }

    // Отобразить все брони в админ-панели.
    public function bookings() {
        $data=Booking::all();
        return view('admin.bookings', compact('data'));
    }

    // Удалить бронь из БД по id.
    public function delete_booking($id) {
        $data = Booking::find($id);
        $data->delete();

        return redirect()->back();
    }

    // Подтвердить бронь (обновить статус записи в БД).
    public function approve_book($id) {
        $booking = Booking::find($id);
        $booking->status = 'approved';
        $booking->save();

        return redirect()->back();
    }

    // Отклонить бронь (обновить статус записи в БД).
    public function reject_book($id) {
        $booking = Booking::find($id);
        $booking->status = 'rejected';
        $booking->save();

        return redirect()->back();
    }

    // Показать галлерею изображений из БД.
    public function view_gallery() {
        $gallery = Gallery::all();
        return view('admin.gallery', compact('gallery'));
    }

    // Добавить изображение в галлерею админ-панели (записать в БД).
    public function upload_gallery(Request $request) {
        $data = new Gallery;
        $image = $request->image;
        if($image) {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            // Поместить изображение в папку на сервере при создании новой записи через админ-панель.
            $request->image->move('gallery', $imagename);

            $data->image=$imagename;
        }
        $data->save();

        return redirect()->back();
    }
    
    // Удалить изображение из галлереи админ-панели (удалить из БД).
    public function delete_gallery($id) {
        $data = Gallery::find($id);
        $data->delete();

        return redirect()->back();
    }


    // Показать все сообщения в админ-панели.
    public function view_messages()
    {
        $data = Contact::all();
        return view('admin.messages', compact('data'));
    }

    // Отобразить страницу с формой отправки сообщения на электронную почту.
    public function send_mail($id) {
        $data = Contact::find($id);
        return view('admin.send_mail', compact('data'));
    }

    // Отправить сообщение на электронную почту.
    public function mail(Request $request, $id) {
        $data = Contact::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'endline' => $request->endline
        ];

        // Отправить уведомление.
        Notification::send($data, new SendMailNotification($details));
        return redirect()->back();
    }
}
