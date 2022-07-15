<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentGatewayDataRequest;
use App\Models\PaymentGatewayModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaymentGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DataPayments = PaymentGatewayModel::all();

        return view("admin-page.payment-gateway.index", compact("DataPayments"));
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
    public function store(PaymentGatewayDataRequest $request)
    {
        $request->validated();


        $dataForm = [
            "name_payment_gateway" => $request->name_payment_gateway,
            "slug" => Str::slug($request->name_payment_gateway),
            "payment_logo" => $request->file("payment_logo")->store('assets/payment-gateway')
        ];

        PaymentGatewayModel::create($dataForm);

        return redirect()->route("payment-gateway.index")->with("success_message", "payment gateway success created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentGatewayModel  $paymentGatewayModel
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentGatewayModel $paymentGatewayModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentGatewayModel  $paymentGatewayModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentGatewayModel $payment_gateway)
    {
        return $payment_gateway;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentGatewayModel  $paymentGatewayModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentGatewayModel $payment_gateway)
    {
        $request->validate([
            "name_payment_gateway" => "required",
            "payment_logo" => "file|image|max:2048|mimes:jpeg,png,jpg,svg"
        ]);

        $dataForm = [
            "name_payment_gateway" => $request->name_payment_gateway,
            "slug" => Str::slug($request->name_payment_gateway)
        ];

        if ($request->file("payment_logo")) {
            if ($request->old_payment_logo) {
                Storage::delete($request->old_payment_logo);
            }
            $dataForm['payment_logo'] = $request->file("payment_logo")->store('assets/payment-gateway');
        }

        PaymentGatewayModel::where("id", $payment_gateway->id)->update($dataForm);

        return redirect()->route("payment-gateway.index")->with("success_message", "payment gateway success updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentGatewayModel  $paymentGatewayModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentGatewayModel $payment_gateway)
    {
        PaymentGatewayModel::destroy($payment_gateway->id);
        Storage::delete($payment_gateway->payment_logo);

        return redirect()->route("payment-gateway.index")->with("success_message", "payment gateway success deleted");
    }
}
