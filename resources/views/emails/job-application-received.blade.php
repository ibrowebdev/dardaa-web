<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Job Application</title>
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
        <h1>New Job Application</h1>
        <p style="font-size: 16px;">A new application has been submitted for <strong>{{ $application->job->title }}</strong> ({{ $application->job->department }}).</p>
        
        <div class="field">
            <div class="label">Applicant Name</div>
            <div class="value">{{ $application->name }}</div>
        </div>
        
        <div class="field">
            <div class="label">Email</div>
            <div class="value">{{ $application->email }}</div>
        </div>
        
        @if($application->phone)
        <div class="field">
            <div class="label">Phone</div>
            <div class="value">{{ $application->phone }}</div>
        </div>
        @endif
        
        <div class="field">
            <div class="label">Cover Letter</div>
            <div class="value" style="white-space: pre-line; line-height: 1.6; background: #f8fafc; padding: 15px; border-radius: 4px;">{{ $application->cover_letter }}</div>
        </div>

        <div class="field" style="background: #eff6ff; border: 1px solid #bfdbfe; padding: 12px; border-radius: 6px;">
            <p style="margin: 0; color: #1d4ed8; font-size: 14px;">📎 The applicant's CV has been attached to this email.</p>
        </div>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} DARDAA WEB Careers System.
    </div>
</body>
</html>
