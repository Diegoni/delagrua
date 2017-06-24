<?php
// echo mailTemplate('Bienvenido', ['parrafo1', 'parr2'], 'click para comenzar', 'http://www.delagrua.com');
function mailTemplate($title = null, $paragraphs = [], $callout = null, $link = null)
{

    $output = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
    $output .= "<html xmlns='http://www.w3.org/1999/xhtml' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'>";

    $output .= "<head>";
        $output .= "<meta name='viewport' content='width=device-width'>";
        $output .= "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>";
        $output .= "<title>Template mails</title>";
    $output .= "</head>";

    $output .= "<body bgcolor='#FFFFFF' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;height: 100%;width: 100%!important;'>";
        $output .= "<table class='head-wrap' bgcolor='#009DD7' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;'>";
            $output .= "<tr style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'>";
                $output .= "<td style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'></td>";
                $output .= "<td class='header container' style='margin: 0 auto!important;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;'>";
                    $output .= "<div class='content' style='margin: 0 auto;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 600px;display: block;'>";
                        $output .= "<table bgcolor='#009DD7' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;'>";
                            $output .= "<tr style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'>";
                                $output .= "<td style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'>";
                                    $output .= "<a href='http://www.delagrua.com/' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;color: #2BA6CB;'>";
                                        $output .= "<img src='http://www.delagrua.com/img/logos/delagrua_sm.png' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 100%;'>";
                                    $output .= "</a>";
                                $output .= "</td>";
                                $output .= "<td align='right' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'>";
                                    $output .= "<h6 class='collapse' style='margin: 0!important;padding: 0;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #444;font-weight: 900;font-size: 14px;text-transform: uppercase;'></h6></td>";
                            $output .= "</tr>";
                        $output .= "</table>";
                    $output .= "</div>";
                $output .= "</td>";
                $output .= "<td style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'></td>";
            $output .= "</tr>";
        $output .= "</table>";
        $output .= "<table class='body-wrap' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;'>";
            $output .= "<tr style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'>";
                $output .= "<td style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'></td>";
                $output .= "<td class='container' bgcolor='#FFFFFF' style='margin: 0 auto!important;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;'>";
                    $output .= "<div class='content' style='margin: 0 auto;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 600px;display: block;'>";
                        $output .= "<table style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;'>";
                            $output .= "<tr style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'>";
                                $output .= "<td style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'>";

                                    // Title
                                    $output .= "<h3 style='margin: 0;padding: 0;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #000;font-weight: 500;font-size: 32px;'>$title</h3>";

                                    // Paragraphs
                                    foreach ($paragraphs as $paragraph) {
                                        $output .= "<p style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;color: #666;'>$paragraph</p>";
                                    }

                                    // Callout + links
                                    if ($callout || $link) {
                                           $output .= "<p class='callout' style='margin: 0;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 15px;font-weight: normal;font-size: 14px;line-height: 1.6;color: #666;background-color: #ECF8FF;'>";
                                           $output .= $callout;
                                           if ($link) {
                                            $output .= "<a href='$link' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;color: #2BA6CB;font-weight: bold;'> $link</a>";
                                        }
                                        $output .= "</p>";
                                    }


                                $output .= "</td>";
                            $output .= "</tr>";
                        $output .= "</table>";
                    $output .= "</div>";
                $output .= "</td>";
                $output .= "<td style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'></td>";
            $output .= "</tr>";
        $output .= "</table>";
        $output .= "<table class='footer-wrap' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;clear: both!important;'>";
            $output .= "<tr style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'>";
                $output .= "<td style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'></td>";
                $output .= "<td class='container' style='margin: 0 auto!important;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;'>";
                    $output .= "<div class='content' style='margin: 0 auto;padding: 15px;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;max-width: 600px;display: block;'>";
                        $output .= "<table style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;width: 100%;'>";
                            $output .= "<tr style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'>";
                                $output .= "<td align='center' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'>";
                                    $output .= "<p style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;color: #666;'>";
                                        $output .= "<a href='http://www.delagrua.com/terminos/' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;color: #2BA6CB;'> Términos y condiciones</a> | ";
                                        $output .= "<a href='http://www.delagrua.com/faq/' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;color: #2BA6CB;'>Preguntas frecuentes</a> | ";
                                        $output .= "<a href='https://plus.google.com/103267201251041877547' style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;color: #2BA6CB;'>Google +</a>";
                                    $output .= "</p>";
                                $output .= "</td>";
                            $output .= "</tr>";
                        $output .= "</table>";
                    $output .= "</div>";
                $output .= "</td>";
                $output .= "<td style='margin: 0;padding: 0;font-family: &quot;Helvetica Neue&quot;, &quot;Helvetica&quot;, Helvetica, Arial, sans-serif;'></td>";
            $output .= "</tr>";
        $output .= "</table>";
    $output .= "</body>";

    $output .= "</html>";


    return $output;
}