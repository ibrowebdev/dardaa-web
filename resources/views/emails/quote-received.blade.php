<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Quote Request</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f7; color: #51545e; margin: 0; padding: 30px; }
        .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; padding: 40px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        h1 { color: #333333; font-size: 24px; border-bottom: 2px solid #f4f4f7; padding-bottom: 15px; }
        h2 { font-size: 18px; color: #6C63FF; border-bottom: 1px solid #eee; padding-bottom: 5px; margin-top: 30px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #8888AA; text-transform: uppercase; font-size: 11px; letter-spacing: 1px; }
        .value { font-size: 15px; color: #333333; margin-top: 4px; }
        .tag { background: #f1f0ff; color: #6C63FF; padding: 4px 8px; border-radius: 4px; font-size: 12px; display: inline-block; margin-right: 5px; margin-bottom: 5px; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #a8aeb8; }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Quote Request</h1>
        
        <h2>1. Selected Services</h2>
        <div style="margin-top: 10px;">
            @foreach($quote->step1_services as $service)
                <span class="tag">{{ $service }}</span>
            @endforeach
        </div>

        <h2>2. Project Details</h2>
        <div class="field">
            <div class="label">Project Name</div>
            <div class="value">{{ $quote->step2_details['project_name'] ?? 'N/A' }}</div>
        </div>
        <div class="field">
            <div class="label">Budget Range</div>
            <div class="value">{{ $quote->step2_details['budget'] ?? 'N/A' }}</div>
        </div>
        <div class="field">
            <div class="label">Timeline</div>
            <div class="value">{{ $quote->step2_details['timeline'] ?? 'N/A' }}</div>
        </div>
        <div class="field">
            <div class="label">Target Audience</div>
            <div class="value">{{ $quote->step2_details['target_audience'] ?? 'N/A' }}</div>
        </div>
        <div class="field">
            <div class="label">Description</div>
            <div class="value" style="white-space: pre-line; background: #f8fafc; padding: 10px; border-radius: 4px;">{{ $quote->step2_details['project_description'] ?? 'N/A' }}</div>
        </div>

        <h2>3. Client Info</h2>
        <div class="field">
            <div class="label">Name</div>
            <div class="value">{{ $quote->name }}</div>
        </div>
        <div class="field">
            <div class="label">Company</div>
            <div class="value">{{ $quote->company ?? 'N/A' }}</div>
        </div>
        <div class="field">
            <div class="label">Email</div>
            <div class="value">{{ $quote->email }}</div>
        </div>
        <div class="field">
            <div class="label">Phone</div>
            <div class="value">{{ $quote->phone ?? 'N/A' }}</div>
        </div>
        @if($quote->source)
        <div class="field">
            <div class="label">Heard About Us</div>
            <div class="value">{{ $quote->source }}</div>
        </div>
        @endif
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} DARDAA WEB. Quote submitted at {{ $quote->created_at->format('Y-m-d H:i') }}.
    </div>
</body>
</html>
