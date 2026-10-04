<?php
$content = file_get_contents('resources/views/layouts/app.blade.php');
$content = preg_replace('/<script>\s*window\.addEventListener.*?<\/script>\s*<\/body>\s*<script>\s*window\.addEventListener.*?<\/script>/is', "</script>\n</body>", $content);
file_put_contents('resources/views/layouts/app.blade.php', $content);
echo "Cleaned duplicates";
