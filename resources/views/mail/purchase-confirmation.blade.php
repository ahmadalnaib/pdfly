<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Invoice</title>
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            line-height: 1.6;
            font-size: 14px;
            color: #555;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .invoice-header img {
            max-height: 50px;
            width: auto;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #999;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-table, .invoice-table th, .invoice-table td {
            border: 1px solid #eee;
        }
        .invoice-table th, .invoice-table td {
            text-align: left;
            padding: 8px;
        }
        .invoice-table th {
            background-color: #f5f5f5;
        }
        .total {
            text-align: right;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="invoice-header">
        <div>
          <h1>pdfly.ai</h1>
        </div>
        <div>
            <strong>Invoice #{{ $sale->id }}</strong><br>
            Created: {{ $sale->created_at->format('m/d/Y') }}<br>
            Due:  {{ $sale->created_at->format('m/d/Y') }}
        </div>
    </div>

    <div class="invoice-details">
        <p>
            <strong>Billed To:</strong><br>
            {{ $sale->email }}
        </p>
        <p>
            <strong>Plan Details:</strong><br>
            {{ $sale->plan->name . ' '. 'Credits' ?? 'N/A' }}<br>
            Price: ${{ number_format($sale->price / 100, 2) }}
        </p>
    </div>

    <table class="invoice-table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $sale->plan->name . ' ' . 'Credits' ?? 'N/A' }}</td>
                <td>${{ number_format($sale->price / 100, 2) }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="total"><strong>Total</strong></td>
                <td>${{ number_format($sale->price / 100, 2) }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="invoice-footer">
        Thank you for your support and trust in our AI services. We are here to consistently offer you the best and look forward to maximizing the value you gain from your new credits.
    </div>
</div>

</body>
</html>
