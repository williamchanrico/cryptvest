<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use CryptVestMc;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $data = $this->dasboardData();

        if ($user->isAdmin()) {

            return view('pages.admin.home');

        }

        return view('pages.user.home', $data);
    }

    /**
     * Show the marketcap
     *
     * @return \Illuminate\Http\Response
     */
    public function marketcap()
    {
        $coins = CryptVestMc::ticker();

        return view('pages.marketcap')->with([
            'coins' => $coins
        ]);
    }

    /**
     * Get necessary data to show on user home dashboard
     *
     * @return array
     */
    public function dasboardData()
    {
        $m = array();
        $user = Auth::user();
        $marketcap = CryptVestMc::ticker();
        $coins = Coin::orderBy('cost', 'desc')->where('portfolio_id', $user->portfolio->id)->get()->toArray();
        $totalInvested = 0;
        $netWorth = 0;

        for($a = 0; $a < count($marketcap); $a++)
        {
            $m[$marketcap[$a]->name] = $a;
        }

        for($a = 0; $a < count($coins); $a++)
        {
            if(!isset($m[$coins[$a]['name']])){
                continue;
            }

            $totalInvested += $coins[$a]['cost'];
            $netWorth += $marketcap[$m[$coins[$a]['name']]]->price_usd * $coins[$a]['amount'];
        }

        return [
            'm' => $m,
            'marketcap' => $marketcap,
            'coins' => $coins,
            'totalInvested' => $totalInvested,
            'netWorth' => $netWorth
        ];
    }

}