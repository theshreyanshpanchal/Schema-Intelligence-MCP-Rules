<?php

namespace App\Support;

use Illuminate\Support\Str;

class MarkdownHtml
{
    public static function expandHeadingIdSyntax(string $markdown): string
    {
        return preg_replace_callback(
            '/^(#{1,6})\s+(.+?)\s+\{#([^}]+)\}\s*$/m',
            fn (array $matches) => '<h'.strlen($matches[1]).' id="'.e($matches[3]).'">'.$matches[2].'</h'.strlen($matches[1]).'>',
            $markdown
        );
    }

    public static function addHeadingAnchors(string $html): string
    {
        $used = [];

        return preg_replace_callback(
            '/<h([1-6])([^>]*)>(.*?)<\/h\1>/s',
            function (array $matches) use (&$used) {
                $text = html_entity_decode(strip_tags($matches[3]));
                $base = Str::slug($text);
                $id = $base;
                $suffix = 2;

                while (isset($used[$id])) {
                    $id = $base.'-'.$suffix++;
                }

                $used[$id] = true;

                if (preg_match('/\bid="/', $matches[2])) {
                    return $matches[0];
                }

                return '<h'.$matches[1].' id="'.$id.'"'.$matches[2].'>'.$matches[3].'</h'.$matches[1].'>';
            },
            $html
        );
    }
}
