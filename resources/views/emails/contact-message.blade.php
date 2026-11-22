<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <title>New contact message</title>
    <style>
        :root { color-scheme: light dark; supported-color-schemes: light dark; }
        body { margin: 0; padding: 0; }
        @media only screen and (max-width: 640px) {
            .email-shell { padding: 24px 12px !important; }
            .email-card { padding: 28px 22px !important; }
            .email-heading { font-size: 28px !important; }
        }
        @media (prefers-color-scheme: dark) {
            .email-bg { background-color: #1a1713 !important; }
            .email-card { background-color: #231f1a !important; border-color: #3b3420 !important; }
            .email-text { color: #f2eadf !important; }
            .email-muted { color: #b9ad9d !important; }
            .email-detail { background-color: #2e2822 !important; border-color: #494033 !important; }
            .email-divider { border-color: #494033 !important; }
            .email-brand-mark { background-color: #33271e !important; color: #e9b98f !important; }
            .email-accent { color: #d3bf83 !important; }
        }
    </style>
</head>
<body class="email-bg" style="background-color:#f3e8d6; color:#2e2a24; font-family:Arial, Helvetica, sans-serif; line-height:1.6;">
    <div style="display:none; max-height:0; overflow:hidden; opacity:0;">
        A new message was sent from Kayla's Korner.
    </div>
    <table class="email-bg" role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color:#f3e8d6;">
        <tr>
            <td class="email-shell" align="center" style="padding:48px 20px;">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:620px;">
                    <tr>
                        <td align="center" style="padding:0 0 24px;">
                            <table role="presentation" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="email-brand-mark" width="42" height="42" align="center" valign="middle" style="width:42px; height:42px; border-radius:12px; background-color:#f6cfab; color:#2e2a24; font-family:Georgia, serif; font-size:24px; font-weight:bold;">K</td>
                                    <td class="email-text" style="padding-left:12px; color:#2e2a24; font-family:Georgia, 'Times New Roman', serif; font-size:22px; font-weight:bold;">Kayla's Korner</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="email-card" style="padding:40px; border:1px solid #f3e8d6; border-radius:20px; background-color:#fffdf9;">
                            <p class="email-accent" style="margin:0 0 10px; color:#7d6d3c; font-size:12px; font-weight:bold; letter-spacing:2px; text-transform:uppercase;">Website contact form</p>
                            <h1 class="email-heading email-text" style="margin:0 0 26px; color:#2e2a24; font-family:Georgia, 'Times New Roman', serif; font-size:34px; line-height:1.2;">A new hello!</h1>

                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="email-detail" style="padding:16px 18px; border:1px solid #f3e8d6; border-radius:12px; background-color:#fbf5ec;">
                                        <p class="email-muted" style="margin:0 0 4px; color:#5d554a; font-size:12px; font-weight:bold; letter-spacing:1px; text-transform:uppercase;">From</p>
                                        <p class="email-text" style="margin:0; color:#2e2a24; font-size:16px; font-weight:bold;">{{ $name }}</p>
                                        <p style="margin:2px 0 0; font-size:14px;"><a class="email-accent" href="mailto:{{ $email }}" style="color:#7d6d3c; text-decoration:underline;">{{ $email }}</a></p>
                                    </td>
                                </tr>
                                @if ($contactSubject !== null && $contactSubject !== '')
                                    <tr>
                                        <td class="email-detail" style="padding:16px 18px; border:1px solid #f3e8d6; border-top:0; border-radius:0 0 12px 12px; background-color:#fbf5ec;">
                                            <p class="email-muted" style="margin:0 0 4px; color:#5d554a; font-size:12px; font-weight:bold; letter-spacing:1px; text-transform:uppercase;">Subject</p>
                                            <p class="email-text" style="margin:0; color:#2e2a24; font-size:15px;">{{ $contactSubject }}</p>
                                        </td>
                                    </tr>
                                @endif
                            </table>

                            <hr class="email-divider" style="height:0; margin:28px 0; border:0; border-top:1px solid #f3e8d6;">
                            <p class="email-muted" style="margin:0 0 8px; color:#5d554a; font-size:12px; font-weight:bold; letter-spacing:1px; text-transform:uppercase;">Message</p>
                            <p class="email-text" style="margin:0; color:#2e2a24; font-size:16px;">{!! nl2br(e($contactBody)) !!}</p>
                            <p class="email-muted" style="margin:28px 0 0; color:#5d554a; font-size:14px;">Just reply to this email to get back in touch.</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="email-muted" align="center" style="padding:24px 12px 0; color:#5d554a; font-size:12px;">
                            Explore. Discover. Shop with Confidence.<br>
                            &copy; {{ date('Y') }} Kayla's Korner
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
