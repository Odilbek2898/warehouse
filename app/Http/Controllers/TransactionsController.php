<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Recalculation;
use App\Models\Type;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index()
    {
        $income_products = Product::where('type_id', Type::INCOME)->get();
        return view('income',compact('income_products'));
    }

    public function income(Request $request)
    {
        $this->validate($request, [
            'kolichestvo'=>'required|integer',
        ]);

        if($request->kolichestvo <= 0) {
            return back()->withErrors(['msg' => 'Приход товаров не далжно бить меньше 1'])
                ->withInput();
        }
        $previous = Recalculation::latest()->first(); // latest = order by desc

        $calculation = new Recalculation($request->all());
        if(empty($previous->ostatok))
        {
            $calculation->ostatok = 0 + $request->kolichestvo;
        }
        else
        {
            $calculation->ostatok = $previous->ostatok + $request->kolichestvo;
        }
        $calculation->product()->associate($request->product_id);
        $calculation->type()->associate(Type::INCOME);
        $calculation->save();

        if ($calculation)
        {
            return redirect()->route('income.index')
                ->with(['success'=>'Успешно сохранено']);
        }
        else
        {
            return back()->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function show()
    {
        $income_products = Product::where('type_id', Type::OUTGO)->get();
        return view('indexoutgo',compact('income_products'));
    }

    public function outgo(Request $request)
    {
        $this->validate($request, [
            'kolichestvo'=>'required|integer',
        ]);

        if($request->kolichestvo <= 0 ) {
            return back()->withErrors(['msg' => 'Уход не должно быть меньше 1'])
                ->withInput();
        }
        $previous = Recalculation::latest()->first();

        if (empty($previous->ostatok))
        {
            return back()->withErrors(['msg' => 'У вас нет товара'])
                ->withInput();
        }

        if($previous->ostatok < $request->kolichestvo)
        {
            return back()->withErrors(['msg' => 'Итог не должно быть меньше Суммы'])
                ->withInput();
        }

        $calculation = new Recalculation($request->all());
        $calculation->ostatok = $previous->ostatok - $request->kolichestvo;
        $calculation->product()->associate($request->product_id);
        $calculation->type()->associate(Type::OUTGO);
        $calculation->save();

        if ($calculation)
        {
            return redirect()->route('outgo.index')
                ->with(['success'=>'Успешно сохранено']);//
        }
        else{
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
