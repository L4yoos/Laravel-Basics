<?php

namespace App\Http\Controllers;

use App\Models\Shoptool;
use App\Models\Wallet;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoptools = Shoptool::all();
        return view('shopping.index', ['shoptools'=>$shoptools]);
    }

    public function admin()
    {
        $shoptools = Shoptool::all();
        return view('shopping.admin', ['shoptools'=>$shoptools]);
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
    public function store(Shoptool $shoptool, Wallet $wallet, Request $request)
    {
        $wallet = \Auth::User()->wallet;
        $shoptool = $request->shoptool;
        $shoptool_price = $shoptool->price * $request->quantity;

        if($shoptool->quantity <= 0)
        {
            return back()->with(
                \Session::flash('error', 'Przepraszamy ale chciales/as kupic przedmiot ktorego aktualnie nie mamy na magazynie!')
            );
        }
        if($wallet->balance >= $shoptool_price)
        {
            $wallet->balance = $wallet->balance - $shoptool_price;
            $wallet->update();
            $shoptool->quantity = $shoptool->quantity - $request->quantity;
            $shoptool->update();

            return back()->with(
                \Session::flash('success', 'Gratulacje! Kupiłeś przedmiot o nazwie '.$shoptool->name.' z ilościa '.$request->quantity.' Dziekujemy za zakup!')
            );
        }
        else
        {
            return back()->with(
                \Session::flash('error', 'Przepraszamy ale nie masz wystarczająco środków na koncie aby kupić ten przedmiot!')
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Shoptool $shoptool, Request $request)
    {
        
        $shoptool = $request->shoptool;
        $price = 'price'; $price .= strval($shoptool->id - 1);
        $name = 'name'; $name .= strval($shoptool->id - 1);
        $quantity = 'quantity'; $quantity .= strval($shoptool->id - 1);
        $shoptool->price = $request->$price;
        $shoptool->name = $request->$name;
        $shoptool->quantity = $request->$quantity;
        $shoptool->save();

        return back()->with(
            \Session::flash('success', 'Brawo Adminie wlasnie dokonales zmian w magazynie Sklepu!')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
