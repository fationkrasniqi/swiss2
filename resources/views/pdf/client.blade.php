<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Client #{{ $client->id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 14px; color: #1a1a1a; margin: 40px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #0d9488; padding-bottom: 20px; }
        .header h1 { color: #0d9488; font-size: 28px; margin: 0; }
        .header p { color: #6b7280; margin: 5px 0 0; }
        .section { margin-bottom: 20px; }
        .section h2 { font-size: 16px; color: #0d9488; border-bottom: 1px solid #e5e7eb; padding-bottom: 5px; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; }
        table td { padding: 8px 0; vertical-align: top; }
        table td:first-child { font-weight: bold; width: 140px; color: #374151; }
        table td:last-child { color: #1a1a1a; }
        .total { font-size: 18px; font-weight: bold; color: #0d9488; text-align: right; margin-top: 20px; padding: 15px; background: #f0fdfa; border-radius: 8px; }
        .footer { margin-top: 40px; text-align: center; font-size: 11px; color: #9ca3af; border-top: 1px solid #e5e7eb; padding-top: 15px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Janira Care</h1>
        <p>Client Service Summary</p>
    </div>

    <div class="section">
        <h2>Client Information</h2>
        <table>
            <tr><td>Name</td><td>{{ $client->full_name }}</td></tr>
            <tr><td>Email</td><td>{{ $client->email }}</td></tr>
            <tr><td>Phone</td><td>{{ $client->full_phone }}</td></tr>
        </table>
    </div>

    <div class="section">
        <h2>Service Details</h2>
        <table>
            <tr><td>Canton</td><td>{{ $client->canton }}</td></tr>
            <tr><td>Services</td><td>{{ $client->services }}</td></tr>
            @if($client->service_date)
            <tr><td>Service Date</td><td>{{ $client->service_date->format('d.m.Y') }}</td></tr>
            @endif
            <tr><td>Booked On</td><td>{{ $client->created_at->format('d.m.Y H:i') }}</td></tr>
        </table>
    </div>


    <div class="footer">
        <p>Janira Care &mdash; janiracare.ch</p>
        <p>Generated {{ now()->format('d.m.Y H:i') }}</p>
    </div>
</body>
</html>
