<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use domain\Facades\BookingFacade;
use domain\Facades\PackageFacade;
use domain\Facades\RoomTypeFacade;
use domain\Facades\SafariBookingPriceFacade;

class BookingController extends Controller
{
    public function create($id)
    {
        try {

            $package = PackageFacade::get($id);
            if ($package->type != 1){
                $roomType= RoomTypeFacade::get($package->room_type_id);
                $roomCountForType = $roomType->room_count;
            }else {
                $roomCountForType = 0;
            }

            return view('pages.booking.create', compact('package','roomCountForType'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function tempStore(Request $request)
    {
        try {

            $residenceVisa = $request->residence_visa ?? 0;
            $travelVisa = $request->travel_visa ?? 0;

            if ($request->package_type == 1) {
                $totalPrice = SafariBookingPriceFacade::getPrice($residenceVisa, $travelVisa, $request->package_safari_type);
            } elseif ($request->package_type == 2) {
                $roomType= RoomTypeFacade::get($request->room_type_id);
                $roomPrice = $roomType->price;
                $totalPrice = $roomPrice * $request->number_of_rooms;
            }else {
                $safariTotalPrice = SafariBookingPriceFacade::getPrice($residenceVisa, $travelVisa, $request->package_safari_type);
                $roomType= RoomTypeFacade::get($request->room_type_id);
                $roomPrice = $roomType->price;
                $roomTotalPrice = $roomPrice * $request->number_of_rooms;
                $totalPrice = $safariTotalPrice + $roomTotalPrice;
            }

            $request->merge([
                'number_of_customers' => $residenceVisa + $travelVisa,
                'room_check_in_date' => $request->check_in_out,//temp
                'room_check_out_date' => $request->check_in_out,//temp
                'price' => $totalPrice,
            ]);

            $tempBooking = BookingFacade::tempStore($request->all());

            return redirect()->route('booking.summary', ['id' => $tempBooking->id]);
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function store(Request $request)
    {
        try {

            $tempBooking = BookingFacade::getTempBooking($request->temp_booking_id);

            $referenceId = 'B' . $tempBooking->id . now()->timestamp;

            $IsExitBooking = BookingFacade::getBookingUsingTempId($request->temp_booking_id);

            if ($IsExitBooking) {
                return redirect()->route('booking.confirmation', ['id' => $IsExitBooking->id])->with('error', 'Booking Already Confirmed.');
            }

            $data = $tempBooking->toArray();
            $data['note'] = $request->note;
            $data['reference_id'] = $referenceId;

            $booking = BookingFacade::store($data);

            return redirect()->route('booking.confirmation', ['id' => $booking->id]);
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function summary($id)
    {
        try {

            $tempBooking = BookingFacade::getTempBooking($id);

            if (!$tempBooking || $tempBooking->user_id !== auth()->id()) {
                return redirect()->route('welcome')->with('error', 'No temporary booking found.');
            }

            $userLastTempBooking = BookingFacade::getUserLastTempBooking();

            if (!$userLastTempBooking || $userLastTempBooking->id != $id) {
                return redirect()->route('welcome')->with('error', 'You can only access your last booking.');
            }

            $package = PackageFacade::get($tempBooking->package_id);
            if ($package->type != 1){
                $roomType= RoomTypeFacade::get($package->room_type_id);
                $roomCountForType = $roomType->room_count;
            }else {
                $roomCountForType = 0;
            }

            return view('pages.booking.summary', compact('tempBooking', 'package', 'roomCountForType'));

        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function confirmation($id)
    {
        try {
            $booking = BookingFacade::get($id);

            if (!$booking || $booking->user_id !== auth()->id()) {
                return redirect()->route('welcome')->with('error', 'No booking found.');
            }

            return view('pages.booking.confirmation', compact('booking'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function myBookings()
    {
        try {
            return view('pages.booking.my_bookings');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function myBookingDetails($id)
    {
        try {
            // $package = Package::findOrFail($id);

            // return view('packages.show', compact('package'));
            return view('pages.booking.details');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }


}
