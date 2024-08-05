@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="invoice-box mt-3"
            style="width: 100%; max-width: 800px; margin: auto; padding: 30px; border: 1px solid #ccc; box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); font-size: 16px; line-height: 24px; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color: #555; background-color: #e6f7e6;">
            <div class="invoice-header" style="text-align: center; margin-bottom: 20px;">
                <h1>PNC Food Park</h1>
                <h6>Invoice #{{ $invoice->id }}</h6>
            </div>
            <table cellpadding="0" cellspacing="0"
                style="width: 100%; line-height: inherit; text-align: left; border-collapse: collapse;">
                <tr class="information">
                    <td colspan="2" style="padding-bottom: 20px;">
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                    Invoice to:<br>
                                    <strong>{{ $invoice->foodOrdering->customer->name }}</strong><br>
                                    {{ $invoice->foodOrdering->customer->address }}
                                </td>
                                <td style="text-align: right;">
                                    <strong>Email:</strong> {{ $invoice->foodOrdering->customer->email }}<br>
                                    <strong>Phone:</strong> {{ $invoice->foodOrdering->customer->phone }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="heading" style="background: #f5f5f5; font-weight: bold;">
                    <td style="border: 1px solid #ccc; padding: 10px;">Code</td>
                    <td style="border: 1px solid #ccc; padding: 10px;">Item Description</td>
                    <td style="border: 1px solid #ccc; padding: 10px;">Price (Nrs)</td>
                    <td style="border: 1px solid #ccc; padding: 10px;">Qty</td>
                    <td style="border: 1px solid #ccc; padding: 10px;">Total (Nrs)</td>
                </tr>
                @if ($invoice->foodOrdering && $invoice->foodOrdering->foodItem)
                    <tr class="item">
                        <td style="border: 1px solid #ccc; padding: 10px;">1</td>
                        <td style="border: 1px solid #ccc; padding: 10px;">{{ $invoice->foodOrdering->foodItem->name }}</td>
                        <td style="border: 1px solid #ccc; padding: 10px;">{{ $invoice->foodOrdering->foodItem->price }}
                        </td>
                        <td style="border: 1px solid #ccc; padding: 10px;">{{ $invoice->foodOrdering->quantity }}</td>
                        <td style="border: 1px solid #ccc; padding: 10px;">
                            {{ $invoice->foodOrdering->foodItem->price * $invoice->foodOrdering->quantity }}</td>
                    </tr>
                    <tr class="total">
                        <td colspan="4"></td>
                        <td style="border-top: 2px solid #f5f5f5; font-weight: bold; padding: 10px;">Sub Total:
                            {{ $invoice->foodOrdering->foodItem->price * $invoice->foodOrdering->quantity }}</td>
                    </tr>
                    <tr class="total">
                        <td colspan="4"></td>
                        <td style="border-top: 2px solid #f5f5f5; font-weight: bold; padding: 10px;">VAT (13%):
                            {{ $invoice->foodOrdering->foodItem->price * $invoice->foodOrdering->quantity * 0.13 }}</td>
                    </tr>
                    <tr class="total">
                        <td colspan="4"></td>
                        <td style="border-top: 2px solid #f5f5f5; font-weight: bold; padding: 10px;">Net Total:
                            {{ $invoice->foodOrdering->foodItem->price * $invoice->foodOrdering->quantity * 1.13 }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="5" style="border: 1px solid #ccc; padding: 10px;">No items found for this invoice.
                        </td>
                    </tr>
                @endif
            </table>
            <div class="payment-info" style="margin-top: 20px; text-align: right;">
                <strong>Payment Info:</strong><br>
                Amount: Nrs {{ $invoice->foodOrdering->foodItem->price * $invoice->foodOrdering->quantity * 1.13 }}<br>
                Status: {{ $invoice->status }}
            </div>
        </div>
        <button class="btn btn-primary mt-4" onclick="printInvoice()">Print Invoice</button>
    </div>
@endsection

@section('scripts')
    <script>
        function printInvoice() {
            var printContents = document.querySelector('.invoice-box').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
