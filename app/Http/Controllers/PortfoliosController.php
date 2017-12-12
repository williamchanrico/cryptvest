<?php

namespace App\Http\Controllers;

use CryptVestMc;
use App\Models\Coin;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfoliosController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $data = [
            'coins' => CryptVestMc::ticker(),
            'coinsOwned' => Coin::orderBy('created_at', 'asc')->where('portfolio_id', $user->portfolio->id)->get(),
        ];

        return view('portfolios.index', $data);
    }
}
