<?php

namespace App\Http\Controllers;

use App\Models\Recharge;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class RechargeController
 * @package App\Http\Controllers
 */
class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recharges = Recharge::where('user_id', Auth::user()->id)->paginate();

        return view('recharge.index', compact('recharges'))
            ->with('i', (request()->input('page', 1) - 1) * $recharges->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recharge = new Recharge();
        $card = new Card();
        return view('recharge.create', compact('recharge', 'card'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Recharge::$rules);
        request()->validate(Card::$rules);

        $cards = DB::select('select * from cards where card_number = :CN AND CVV = :CVV',
         ['CN' => $request->card_number, 'CVV' => $request->CVV]);

        if(!$cards){
            return redirect()->route('recharge.create')->with('fail', 'tarjeta no encontrada');
        } else{
            foreach($cards as $card){}
            $data = $request->all();

            if( $data['balance'] > $card->Balance) {
                return redirect()->route('recharge.create')->with('fail', 'Saldo insuficiente');
            } else{
                $card->Balance = $card->Balance - $request->balance;
                $c = DB::table('cards')->where('card_number', $data['card_number'])->update(['Balance' => $card->Balance]);    

                $user = Auth::user();

                $data['user_id'] = $user->id;
                $user->balance = $user->balance + $data['balance'];
                /** @var \App\Models\User $user **/
                $user->save();
    
                $recharge = Recharge::create($data);
    
                return redirect()->route('recharge.index')
                    ->with('success', 'Recharge created successfully.');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recharge = Recharge::find($id);

        return view('recharge.show', compact('recharge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recharge = Recharge::find($id);

        return view('recharge.edit', compact('recharge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Recharge $recharge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recharge $recharge)
    {
        request()->validate(Recharge::$rules);

        $recharge->update($request->all());

        return redirect()->route('recharges.index')
            ->with('success', 'Recharge updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $recharge = Recharge::find($id)->delete();

        return redirect()->route('recharge.index')
            ->with('success', 'Recharge deleted successfully');
    }
}
