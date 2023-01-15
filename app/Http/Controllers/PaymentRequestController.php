<?php

namespace App\Http\Controllers;

use App\Models\PaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentRequestController extends Controller
{
    public function index(Request $request)
    {
        $payments = null;
        if ($request->search != null)
        {
            $payments = PaymentRequest::where('description','LIKE',"%{$request->search}%")
            ->orWhere('project','LIKE',"%{$request->search}%")
            ->paginate(100);
        }
        else $payments = PaymentRequest::paginate(100);
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        return view("payments.create");
    }

    public function store(Request $request)
    {
        $validiranZahtjev = $request->validate([
            'description' => 'required|string|min:5|max:255',
            'project' => 'required|string|min:5|max:255',
            'person' => 'required|string|min:5|max:255',
            'reciept_number' => 'required|string|min:2|max:255',
            'reciept_date' => 'required|date|before_or_equal:'.now()->format('m/d/Y'),
            'cost' => 'required|min:0',
            'bank_account_number' => 'required|string|min:2|max:255',
            'comment' => 'nullable|string|max:256',
            'image' => 'nullable|image|max:5128',
        ]);

        if ($request->image){
            //Obrada slike
            $ekstenzija = $request->file('image')->getClientOriginalExtension();
            //Kreiranje naziva slike
            $naziv = 'racun'.'_'.time().'.'.$ekstenzija;
            //Uplad slike
            $path = $request->file('image')->storeAs('public/img/racuni/', $naziv);     
            //U bazi pamtimo samo ime
            $validiranZahtjev['image'] = $path;
        }

        $payment = PaymentRequest::create($validiranZahtjev);

        return redirect(route('payment.index'))->with('jsAlert', 'Uspjesno ste kreirali zahtjev za uplatu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentRequest $paymentRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentRequest $paymentRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentRequest $paymentRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentRequest  $paymentRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentRequest $paymentRequest)
    {
        //
    }
}
