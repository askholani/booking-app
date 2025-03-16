<?php
namespace App\Http\Controllers;

use App\Models\Playstation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PlaystationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get search input
        $query  = Playstation::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $data = $query->paginate(2);

        $breadcrumbs = [
            ['name' => 'Admin', 'url' => route('admin.booking.index')],
            ['name' => 'Playstation'],
        ];

        $years = range(date('Y') - 15, date('Y') + 5);

        return view('playstation.index', compact('breadcrumbs', 'data', 'years'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|string',
            'year'  => 'required|string',
        ]);

        Playstation::create([
            'name'  => $request->name,
            'price' => intval(str_replace(['Rp', '.', ' '], '', $request->price)),
            'year'  => $request->year,
        ]);

        Alert::success('Success', 'Data has been added successfully!');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(Playstation $playstation)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playstation $playstation)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playstation $playstation)
    {

        $validatedData = $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|string',
            'year'  => 'required|string',
        ]);

        Playstation::where('id', $playstation->id)->update([
            'name'  => $request->name,
            'price' => intval(str_replace(['Rp', '.', ' '], '', $request->price)),
            'year'  => $request->year,
        ]);

        Alert::success('Success', 'Data has been updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playstation $playstation)
    {

        $playstation->delete();

        Alert::success('Success', 'Data has been deleted successfully!');
        return redirect()->back();
    }
}
