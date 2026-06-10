<?php

namespace App\Http\Controllers;

use App\Support\MarkdownHtml;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DocsController extends Controller
{
    public function welcome(): View
    {
        $docsPath = app_path('Docs');

        $documents = [
            'important' => [
                'title' => 'Schema Intelligence MCP Important',
                'file' => 'schema-intelligence-mcp-important.md',
            ],
            'rule' => [
                'title' => 'Schema Intelligence MCP Rule',
                'file' => 'schema-intelligence-mcp-rule.mdc',
            ],
        ];

        foreach ($documents as $key => $document) {
            $path = $docsPath.DIRECTORY_SEPARATOR.$document['file'];

            $markdown = File::exists($path) ? File::get($path) : '# Document not found';

            if ($key === 'important') {
                $markdown = MarkdownHtml::expandHeadingIdSyntax($markdown);
            }

            $html = Str::markdown($markdown);

            if ($key === 'rule') {
                $html = MarkdownHtml::addHeadingAnchors($html);
            }

            $documents[$key]['html'] = $html;
        }

        return view('welcome', [
            'documents' => $documents,
        ]);
    }
}
