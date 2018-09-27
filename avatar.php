<?php
header('Content-Type: image/svg+xml');
//caching
header('Cache-Control: public, max-age=2592000');
header('Expires: ' . date(DATE_RFC822, strtotime('30 day')));

//saturation and lightness - you can change them to make different
$sat = 60;
$light = 40;

//hue: 0 - 360
$hue = intval($_GET['c']);

//SVG template
$svg = '<?xml version="1.0" ?>
<svg style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<style type="text/css">
.bg{fill:hsl(%d, %d%%, %d%%);}
.fg{fill:#FFFFFF;}
</style>
<circle class="bg" cx="256" cy="256" r="250"/>
<g><circle class="fg" cx="256" cy="198.8" r="51.4"/><path class="fg" d="M294.7,275.1h-77.4c-28.1,0-50.8,22.7-50.8,50.8v38.7h179v-38.7C345.5,297.9,322.7,275.1,294.7,275.1z"/></g>
</svg>
';

echo sprintf($svg, $hue, $sat, $light);

?>