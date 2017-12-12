<?php

namespace App\Http\Controllers;

use CryptVestMc;
use App\Models\Coin;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CoinsController extends Controller
{
    /**
     * Coin Validation Rules.
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required',
        'amount' => 'required|numeric',
        'cost' => 'required|numeric',
        'note' => 'nullable'
    ];

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coins = CryptVestMc::ticker();

        return view('portfolios.create')->with([
            'coins' => $coins
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);

        $user = Auth::user();
        $portfolio = Portfolio::find($user->portfolio->id);
        $coin = new Coin($request->all());

        $portfolio->coins()->save($coin);

        return redirect('/portfolio')->with('status', 'Coin created');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coin = Coin::findOrFail($id);
        $coins = CryptVestMc::ticker();

        return view('portfolios.edit')->with([
            'coin' => $coin,
            'coins' => $coins
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);

        $coin = Coin::findOrFail($id);
        $coin->name = $request->input('name');
        $coin->amount = $request->input('amount');
        $coin->cost = $request->input('cost');
        $coin->note = $request->input('note');

        $coin->update();

        return Redirect::back()->with('status', 'Coin Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        Coin::findOrFail($id)->delete();

        return redirect('/portfolio')->with('status', 'Coin Deleted');
    }
}
