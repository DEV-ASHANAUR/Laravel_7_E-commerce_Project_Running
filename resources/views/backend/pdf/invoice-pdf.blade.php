<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice-Pos</title> 
</head>
<body>
    <h3 style="color: red">Invoice #{{ $invoice->invoice_no }} <br><span>Nur's Brother's Ltd</span></h3>
    <hr style="color: red">
    @php
        $payment = App\model\Payment::where('invoice_id',$invoice->id)->first();
    @endphp
    <div>
        <strong>Shipped To:</strong><br>
        {{ $payment['customer']['name'] }}<br>
        {{ $payment['customer']['address'] }}<br>
        {{ ($payment['customer']['email'])?$payment['customer']['email']:'Example@gmail.com' }}<br>
        {{ $payment['customer']['mobile_no'] }} <br>
        <strong>Invoice Date:</strong><br>
          {{ date('d-M-Y',strtotime($invoice->date)) }}<br>
    </div>   
    <h4 style="color: red;">Order Summary</h4>   
    <table style="width: 100%; margin-bottom:100px">
        <thead>
            <tr style="background: red;">
                <th style=" color:white">SL</th>
                <th style=" color:white">Product Name</th>
                <th style=" color:white">Quantity</th>
                <th style=" color:white">Unit Price</th>
                <th style=" color:white">Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total_sum = 0;
            @endphp
            @foreach ($invoice['invoice_details'] as $key => $details)
                <tr>
                    <th>{{ $key+1 }}</th>
                    <th style="padding:10px;">{{ $details['product']['name'] }}</th>
                    <th>{{ $details->selling_qty }}
                        {{ $details['product']['unit']['name'] }}</th>
                    <th>{{ number_format($details->unit_price,2).' Tk' }}</th>
                    <th>{{ number_format($details->selling_price,2).' Tk' }}</th>
                </tr>
            @php
                $total_sum += $details->selling_price;
            @endphp
            @endforeach
        </tbody>
        <thead>
            <tr style="background: red;">
                <th style=" color:white">SL</th>
                <th style=" color:white">Product Name</th>
                <th style=" color:white">Quantity</th>
                <th style=" color:white">Unit Price</th>
                <th style=" color:white">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="4" style="text-align: right;padding:8px">SubTotal :</th>
                <th><strong>{{ number_format($total_sum,2).' Tk' }}</strong></th>
            </tr>
            <tr>
                <th colspan="4" style="text-align: right;padding:8px">Discount :</th>
                <th><strong>{{ number_format($payment->discount_amount,2)." Tk" }}</strong></th>
            </tr>
            <tr>
                <th colspan="4" style="text-align: right;padding:8px">Paid Amount :</th>
                <th><strong>{{ number_format($payment->paid_amount,2)." Tk" }}</strong></th>
            </tr>
            <tr>
                <th colspan="4" style="text-align: right;padding:8px">Due Amount :</th>
                <th><strong>{{ number_format($payment->due_amount,2)." Tk" }}</strong></th>
            </tr>
            <tr>
                <th colspan="4" style="text-align: right;padding:8px;background: red;color:white">Grand Total :</th>
                <th><strong>{{ number_format($payment->total_amount,2)." Tk" }}</strong></th>
            </tr>
            @php
                $date = new DateTime('now',new DateTimezone('Asia/Dhaka'));
            @endphp
            <tr>
                <th colspan="3" style="text-align:left">printing Date : {{ $date->format('F j, Y, g:i a') }}</th>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%;">
        <thead>
            <tr>
                <th colspan="4" style="text-align: left;border-top:2px solid red;padding-top:5px">Seller Signature</th>
                <th  colspan="4" style="text-align: right;border-top:2px solid red">Customer Signature</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th colspan="4" style="text-align: left">Nur's Brother's Ltd</th>
                <th colspan="4" style="text-align: right">{{ $payment['customer']['name'] }}</th>
            </tr>
            <tr>
                <th colspan="8" style="text-align: left">Mobile : 01866936562</th>
            </tr>
            <tr>
                <th colspan="8" style="text-align: left">Address : Dhaka,Bangladesh</th>
            </tr>
            
        </tbody>
    </table>
    
      
</body>
</html>