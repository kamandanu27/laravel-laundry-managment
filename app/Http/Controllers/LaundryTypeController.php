<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaundryTypeRequest;
use App\LaundryType;
use App\User;
use Illuminate\Http\Request;

class LaundryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(User $user)
    {

        $this->middleware('auth');
        $this->middleware('role', ['only' => ['index', 'store', 'update', 'delete']]);

    }
    public function index()
    {
        $types = LaundryType::Paginate(2);
        return view('laundryType.showLaundryType')
            ->with('types', $types);
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
    public function store(LaundryTypeRequest $request)
    {
        $type        = new LaundryType();
        $type->price = $request->price;
        $type->type  = $request->type;
        $type->save();
        return back()->with('message', 'Type Info Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LaundryType  $laundryType
     * @return \Illuminate\Http\Response
     */
    public function show(LaundryType $laundryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LaundryType  $laundryType
     * @return \Illuminate\Http\Response
     */
    public function edit(LaundryType $laundryType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LaundryType  $laundryType
     * @return \Illuminate\Http\Response
     */
    public function update(LaundryTypeRequest $request)
    {
        $id          = $request->route('laundrytype');
        $type        = LaundryType::where('id', $id)->first();
        $type->price = $request->price;
        $type->type  = $request->type;
        $type->save();
        return back()->with('message', 'Type Info Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LaundryType  $laundryType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id   = $request->route('laundrytype');
        $type = ParentInfo::find($id);
        $type->delete();
        return back()->with('message', 'Parent Info Delete Successfully');
    }
}
