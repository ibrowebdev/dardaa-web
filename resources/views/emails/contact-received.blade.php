<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Inquiry</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f7; color: #51545e; margin: 0; padding: 30px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; padding: 40px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        h1 { color: #333333; font-size: 24px; border-bottom: 2px solid #f4f4f7; padding-bottom: 15px; }
        .field { margin-bottom: 20px; }
        .label { font-weight: bold; color: #8888AA; text-transform: uppercase; font-size: 12px; letter-spacing: 1px; }
        .value { font-size: 16px; color: #333333; margin-top: 5px; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #a8aeb8; }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Contact Inquiry</h1>
        
        <div class="field">
            <div class="label">Name</div>
            <div class="value">{{ $contact->name }}</div>
        </div>
        
        <div class="field">
            <div class="label">Email</div>
            <div class="value">{{ $contact->email }}</div>
        </div>
        
        @if($contact->phone)
        <div class="field">
            <div class="label">Phone</div>
            <div class="value">{{ $contact->phone }}</div>
        </div>
        @endif
        
        <div class="field">
            <div class="label">Subject</div>
            <div class="value">{{ $contact->subject }}</div>
        </div>
        
        <div class="field">
            <div class="label">Message</div>
            <div class="value" style="white-space: pre-line; line-height: 1.6; background: #f8fafc; padding: 15px; border-radius: 4px;">{{ $contact->message }}</div>
        </div>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} DARDAA WEB. This inquiry was submitted via the agency website.
    </div>
</body>
</html>
