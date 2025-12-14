<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Invoice</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f8f9fa; padding: 20px;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        {{-- Header --}}
        <tr>
            <td style="background: linear-gradient(90deg,#145A32,#26aa5f); color: #fff; padding: 20px; text-align: center;">
                <img src="https://dev-testing.stepforenvironment.com/{{config('constants.ASSETS_PATH')}}img/logo/logo4.png" alt="Step For Environment" style="height:60px; margin-bottom:10px;">
                <h2 style="margin:0; color:#fff;">Step For Environment</h2>
                <small style="color:#eafbe7;">Eco-friendly • Sustainable • Reusable</small>
            </td>
        </tr>

        {{-- Body --}}
        <tr>
            <td style="padding: 30px; color:#333;">
                <p>Dear {{ $order->user->first_name }},</p>
                <p>Thank you for your order <b>#{{ $order->id }}</b> placed on 
                   {{ $order->created_at->format('d M Y') }}.</p>
                <p>Your invoice is attached to this email.</p>

                <p style="margin-top:20px;">
                    <b>Order Total:</b> ₹{{ number_format($order->total, 2) }}
                </p>

                {{-- Optional Download Button --}}
                <p style="margin-top:30px; text-align:center;">
                    <a href="{{ url(config('constants.IMAGE_PATH') .$order->invoice_path) }}" target="_blank" 
                       style="background:#26aa5f; color:#fff; padding:12px 20px; border-radius:6px; text-decoration:none; font-weight:bold;">
                        Download Invoice
                    </a>
                </p>

                <p style="margin-top:30px; font-size: 14px; color:#555;">
                    Together, we are building a sustainable and eco-friendly future 🌍💚  
                </p>
            </td>
        </tr>

        {{-- Footer --}}
        <tr>
            <td style="background: #f1f1f1; text-align: center; padding: 15px; font-size: 12px; color:#666;">
                &copy; {{ date('Y') }} Step For Environment. All rights reserved.
            </td>
        </tr>
    </table>
</body>
</html>
