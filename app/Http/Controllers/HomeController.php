<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function details_room($id) {
        // Получить подробную информацию о выбранной комнате на главной странице.
        $room = Room::find($id);
        return view('home.room_details', compact('room'));
    }

    public function add_booking(Request $request, $id) {
        // Валидация выбора доступных дат в календаре.
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'date|after:startDate'
        ]);

        // Добавить бронь в БД.
        $data = new Booking;
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $endDate)
            ->where('end_date', '>=', $startDate)->exists();
        // Если комната забронирована на указанные датые (запись есть в БД),
        // то отобразить соответствующее сообщение ошибки бронирования.
        if($isBooked) {
            return redirect()->back()->with('message','Room is Already Booked. Please, try different date.');
        }
        // Иначе забронировать комнату на указанные даты (добавить запись в БД).
        else {
            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;
            $data->save();

            // Вывести сообщение об успешнном бронировании комнаты.
            return redirect()->back()->with('message','Room Booked Successfully');
        }
    }

    // Отправить сообщение администарции через форму обратной связи.
    public function contact(Request $request) {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('message', 'Message Sent Successfully');
    }

    public function our_rooms() {
        $room = Room::all();
        return view('home.our_rooms', compact('room'));
    }

    public function hotel_gallery() {
        $gallery = Gallery::all();
        return view('home.hotel_gallery', compact('gallery'));
    }

    public function contact_us() {
        return view('home.contact_us');
    }

        public function about_us() {
        return view('home.about_us');
    }
}
