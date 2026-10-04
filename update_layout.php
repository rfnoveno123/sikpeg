<?php
$content = file_get_contents('resources/views/layouts/app.blade.php');
$content = str_replace('</head>', "    <script src=\"https://unpkg.com/htmx.org@1.9.11\"></script>\n</head>", $content);

// Wrap body contents in an HTMX target area so the global loader isn't destroyed
$content = str_replace(
    '<body class="text-slate-800 antialiased flex h-screen overflow-hidden">', 
    '<body class="text-slate-800 antialiased h-screen overflow-hidden" hx-boost="true" hx-target="#app-wrapper" hx-select="#app-wrapper" hx-swap="outerHTML show:none">', 
    $content
);

// We need to wrap everything except global-loader in app-wrapper
$content = str_replace('<!-- Sidebar -->', '<div id="app-wrapper" class="flex h-screen overflow-hidden w-full">' . "\n    " . '<!-- Sidebar -->', $content);
$content = str_replace('</body>', '</div>' . "\n" . '</body>', $content);

$script = <<<JS
<script>
    window.addEventListener('load', function() {
        const loader = document.getElementById('global-loader');
        if (loader) {
            loader.classList.add('loader-hidden');
            setTimeout(() => { loader.style.display = 'none'; }, 400);
        }
    });

    document.body.addEventListener('htmx:beforeRequest', function() {
        const loader = document.getElementById('global-loader');
        if (loader) {
            loader.style.display = 'flex';
            setTimeout(() => { loader.classList.remove('loader-hidden'); }, 10);
        }
    });

    document.body.addEventListener('htmx:afterSettle', function() {
        const loader = document.getElementById('global-loader');
        if (loader) {
            loader.classList.add('loader-hidden');
            setTimeout(() => { loader.style.display = 'none'; }, 400);
        }
    });
</script>
JS;

$content = preg_replace('/<script>.*?<\/script>/is', $script, $content);
file_put_contents('resources/views/layouts/app.blade.php', $content);
echo "Done";
