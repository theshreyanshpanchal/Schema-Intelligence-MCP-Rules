<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="color-scheme" content="dark">
        <title>Schema Intelligence MCP</title>

        @fonts

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <style>
            :root {
                color-scheme: dark;
                --bg-base: #0d0d12;
                --bg-surface: #16161f;
                --bg-elevated: #1e1e2a;
                --border: #2a2a3a;
                --text-primary: #f0f0f5;
                --text-secondary: #9898a8;
                --text-muted: #6b6b7b;
                --accent: #3b82f6;
                --accent-hover: #60a5fa;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                min-height: 100vh;
                font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
                background: linear-gradient(145deg, #0a0a0f 0%, #12121a 40%, #0f1520 100%);
                color: var(--text-primary);
                -webkit-font-smoothing: antialiased;
            }

            .page {
                max-width: 72rem;
                margin: 0 auto;
                padding: 2.5rem 1rem;
            }

            @media (min-width: 640px) {
                .page { padding: 2.5rem 1.5rem; }
            }

            .header {
                margin-bottom: 2.5rem;
                text-align: center;
            }

            .header-icon {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1rem;
                padding: 0.75rem;
                border-radius: 1rem;
                background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
                box-shadow: 0 8px 24px rgba(59, 130, 246, 0.3);
            }

            .header-icon svg {
                width: 2rem;
                height: 2rem;
                color: #fff;
            }

            .header h1 {
                margin: 0;
                font-size: 2.5rem;
                font-weight: 700;
                letter-spacing: -0.02em;
                color: var(--text-primary);
            }

            .header p {
                margin: 0.75rem 0 0;
                font-size: 1.125rem;
                color: var(--text-secondary);
            }

            .btn-group {
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
                margin-bottom: 2rem;
            }

            @media (min-width: 640px) {
                .btn-group {
                    flex-direction: row;
                    justify-content: center;
                }
            }

            .doc-btn {
                padding: 0.75rem 1.5rem;
                font-size: 0.875rem;
                font-weight: 600;
                font-family: inherit;
                color: var(--text-secondary);
                background: var(--bg-elevated);
                border: 1px solid var(--border);
                border-radius: 0.75rem;
                cursor: pointer;
                transition: all 0.2s ease;
            }

            .doc-btn:hover {
                color: var(--accent-hover);
                border-color: rgba(59, 130, 246, 0.4);
                background: #252532;
            }

            .doc-btn.active {
                color: #fff;
                background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
                border-color: transparent;
                box-shadow: 0 4px 14px rgba(59, 130, 246, 0.35);
            }

            .content-card {
                padding: 1.5rem;
                background: var(--bg-surface);
                border: 1px solid var(--border);
                border-radius: 1rem;
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
            }

            @media (min-width: 640px) {
                .content-card { padding: 2.5rem; }
            }

            .placeholder {
                padding: 4rem 1rem;
                text-align: center;
            }

            .placeholder svg {
                width: 3rem;
                height: 3rem;
                margin: 0 auto 1rem;
                color: var(--text-muted);
            }

            .placeholder p {
                margin: 0;
                color: var(--text-muted);
            }

            .footer {
                margin-top: 2rem;
                text-align: center;
                font-size: 0.875rem;
                color: var(--text-muted);
            }

            .hidden {
                display: none !important;
            }

            .doc-panel {
                animation: fadeIn 0.3s ease;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(8px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .markdown-body h1 {
                font-size: 1.875rem;
                font-weight: 700;
                margin: 0 0 1rem;
                padding-bottom: 0.75rem;
                border-bottom: 2px solid var(--accent);
                color: var(--text-primary);
            }

            .markdown-body h2 {
                font-size: 1.375rem;
                font-weight: 600;
                margin: 2rem 0 0.75rem;
                color: #e8e8ef;
            }

            .markdown-body h3 {
                font-size: 1.125rem;
                font-weight: 600;
                margin: 2rem 0 0.75rem;
                padding: 0.5rem 0 0.5rem 0.875rem;
                color: var(--accent-hover);
                border-left: 3px solid var(--accent);
                background: rgba(59, 130, 246, 0.06);
                border-radius: 0 6px 6px 0;
            }

            .markdown-body h3:first-of-type {
                margin-top: 1rem;
            }

            .markdown-body p {
                margin: 0.75rem 0;
                line-height: 1.75;
                color: #b0b0be;
            }

            .markdown-body a {
                color: var(--accent);
                text-decoration: underline;
                text-underline-offset: 3px;
                font-weight: 500;
            }

            .markdown-body a:hover {
                color: var(--accent-hover);
            }

            .markdown-body ul,
            .markdown-body ol {
                margin: 0.75rem 0;
                padding-left: 1.5rem;
                color: #b0b0be;
            }

            .markdown-body li {
                margin: 0.35rem 0;
                line-height: 1.65;
            }

            .markdown-body hr {
                border: none;
                border-top: 1px solid var(--border);
                margin: 2rem 0;
            }

            .markdown-body table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0;
                margin: 0.5rem 0 1.5rem;
                font-size: 0.875rem;
                border: 1px solid var(--border);
                border-radius: 10px;
                overflow: hidden;
            }

            .markdown-body th,
            .markdown-body td {
                border-bottom: 1px solid var(--border);
                padding: 0.75rem 1rem;
                text-align: left;
                vertical-align: top;
                color: #b0b0be;
                line-height: 1.55;
            }

            .markdown-body tr:last-child td {
                border-bottom: none;
            }

            .markdown-body th {
                background: var(--bg-elevated);
                font-weight: 600;
                font-size: 0.8rem;
                text-transform: uppercase;
                letter-spacing: 0.04em;
                color: var(--text-secondary);
            }

            .markdown-body tbody tr:nth-child(even) td {
                background: rgba(255, 255, 255, 0.02);
            }

            .markdown-body tbody tr:hover td {
                background: rgba(59, 130, 246, 0.06);
            }

            .markdown-body td:first-child {
                width: 28%;
                min-width: 10rem;
                color: var(--text-primary);
                font-weight: 500;
            }

            .markdown-body td:first-child a {
                color: var(--accent-hover);
                text-decoration: none;
                font-weight: 600;
                cursor: pointer;
            }

            .markdown-body td:first-child a:hover {
                color: #93c5fd;
                text-decoration: underline;
            }

            .markdown-body td:first-child a strong {
                color: inherit;
                font-weight: inherit;
            }

            .markdown-body [id] {
                scroll-margin-top: 1.25rem;
            }

            .section-highlight {
                border-radius: 6px;
                animation: sectionHighlight 2.2s ease;
            }

            @keyframes sectionHighlight {
                0%, 100% { background-color: transparent; box-shadow: none; }
                15% { background-color: rgba(59, 130, 246, 0.14); box-shadow: inset 0 0 0 1px rgba(59, 130, 246, 0.35); }
            }

            .markdown-body code {
                background: var(--bg-elevated);
                padding: 0.15rem 0.4rem;
                border-radius: 4px;
                font-size: 0.875em;
                color: var(--accent-hover);
            }

            .markdown-body pre {
                background: #0a0a10;
                color: #d4d4dc;
                padding: 1rem 1.25rem;
                border-radius: 8px;
                border: 1px solid var(--border);
                overflow-x: auto;
                margin: 1rem 0;
            }

            .markdown-body pre code {
                background: none;
                color: inherit;
                padding: 0;
            }

            .markdown-body blockquote {
                border-left: 4px solid var(--accent);
                margin: 1.5rem 0 0;
                padding: 0.875rem 1.25rem;
                color: var(--text-secondary);
                background: rgba(59, 130, 246, 0.1);
                border-radius: 0 8px 8px 0;
                font-size: 0.9rem;
            }

            .markdown-body blockquote p {
                margin: 0;
            }

            .markdown-body strong {
                color: var(--text-primary);
                font-weight: 600;
            }
        </style>
    </head>
    <body>
        <div class="page">
            <header class="header">
                <div class="header-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                        <ellipse cx="12" cy="5" rx="8" ry="3"/>
                        <path d="M4 5v6c0 1.66 3.58 3 8 3s8-1.34 8-3V5"/>
                        <path d="M4 11v6c0 1.66 3.58 3 8 3s8-1.34 8-3v-6"/>
                    </svg>
                </div>
                <h1>Schema Intelligence MCP</h1>
                <p>Documentation &amp; rules for database schema synchronization</p>
            </header>

            <div class="btn-group">
                @foreach ($documents as $key => $document)
                    <button type="button" data-doc="{{ $key }}" class="doc-btn">
                        {{ $document['title'] }}
                    </button>
                @endforeach
            </div>

            <main class="content-card">
                <div id="placeholder" class="placeholder">
                    <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <p>Select a document above to view its content</p>
                </div>

                @foreach ($documents as $key => $document)
                    <article id="doc-{{ $key }}" class="doc-panel markdown-body hidden">
                        {!! $document['html'] !!}
                    </article>
                @endforeach
            </main>

            <footer class="footer">
                Schema Intelligence MCP Documentation
            </footer>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const buttons = document.querySelectorAll('.doc-btn');
                const panels = document.querySelectorAll('.doc-panel');
                const placeholder = document.getElementById('placeholder');
                const rulePanel = document.getElementById('doc-rule');
                let highlightTimer = null;

                const ruleAnchorAliases = {
                    top: 'laravel-database-schema-sync-rule',
                    'default-behavior': 'operating-mode',
                };

                function resolveSlug(slug) {
                    return ruleAnchorAliases[slug] || slug;
                }

                function showDocument(key) {
                    buttons.forEach(btn => {
                        btn.classList.toggle('active', btn.dataset.doc === key);
                    });

                    panels.forEach(panel => {
                        panel.classList.toggle('hidden', panel.id !== `doc-${key}`);
                    });

                    placeholder.classList.add('hidden');
                }

                function highlightSection(element) {
                    if (highlightTimer) {
                        clearTimeout(highlightTimer);
                    }

                    element.classList.remove('section-highlight');
                    void element.offsetWidth;
                    element.classList.add('section-highlight');

                    highlightTimer = setTimeout(() => {
                        element.classList.remove('section-highlight');
                    }, 2200);
                }

                function scrollToRuleSection(slug) {
                    const resolved = resolveSlug(slug);
                    const target = rulePanel?.querySelector(`#${CSS.escape(resolved)}`);

                    if (!target) {
                        return false;
                    }

                    showDocument('rule');

                    requestAnimationFrame(() => {
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        highlightSection(target);
                    });

                    history.replaceState(null, '', `#${slug}`);

                    return true;
                }

                document.addEventListener('click', (event) => {
                    const link = event.target.closest('a[href^="rule:"]');

                    if (!link) {
                        return;
                    }

                    event.preventDefault();
                    scrollToRuleSection(link.getAttribute('href').slice(5));
                });

                buttons.forEach(button => {
                    button.addEventListener('click', () => showDocument(button.dataset.doc));
                });

                if (location.hash.length > 1) {
                    const slug = decodeURIComponent(location.hash.slice(1));
                    showDocument('important');
                    scrollToRuleSection(slug);
                }
            });
        </script>
    </body>
</html>
