<?php

namespace App\Http\Controllers;

use App\Laundry;
use App\Mail\SendOrderInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LaundryController extends Controller
{
    public function __construct(User $user)
    {

        $this->middleware('auth');
        $this->middleware('role');

    }
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index()
    {
       
           $laundries = Laundry::has('types')
           ->where('confirmed', 0)
           ->paginate(2)
           ; 
           return view('laundry.showLaundry')
            ->with('laundries', $laundries);
        // return $laundries;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $laundry                = new Laundry();
        $laundry->customer_name = $request->customer_name;
        $laundry->priority      = $request->priority;
        $laundry->weight        = $request->weight;
        $laundry->email_address = $request->email_address;
        $laundry->phone_number  = $request->phone_number;
        $laundry->save();
        // $type = LaundryType::find($request->type);

        $typewitnumber = array_combine($request->type, $request->number_of_item);

        foreach ($typewitnumber as $key => $value) {
            $laundry->types()->attach($key, ['number_of_item' => $value]);
        }

        Mail::to($request->email_address)->send(new SendOrderInfo($laundry));

        return back();
    }

    public function orderConfirm(Request $request)
    {
        $laundryConfirmId = $request->submitorder;
        $confirmLaundry   = Laundry::findOrFail($laundryConfirmId);

       foreach ($confirmLaundry as $confirm) {
           $confirm->confirmed=1;
           $laundry=$confirm;
           Mail::to($laundry->email_address)->send(new SendOrderInfo($laundry));
           $confirm->save();
       }
        return back()->with('message', 'Order Confirmed Successfully');
    }
    public function orderConfirmList()
    {
        $laundries = Laundry::has('types')
           ->where('confirmed', 1)
           ->paginate(2)
           ; 
           return view('laundry.showConfirmLaundry')
            ->with('laundries', $laundries);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function edit(Laundry $laundry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laundry $laundry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laundry  $laundry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laundry $laundry)
    {
        //
    }
}
