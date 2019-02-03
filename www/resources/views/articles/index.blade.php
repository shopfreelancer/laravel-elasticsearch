{% raw %}<html>
<head>
    <title>Articles</title>
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}" />
</head>

<body>
<div class="container">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Articles <small>({{ $articles->count() }})</small>
            </div>
            <div class="panel-body">
                @forelse ($articles as $article)
                    <article>
                        <h2>{{ $article->title }}</h2>

                        <p>{{ $article->body }}</body>

<p class="well">{{ implode(', ', $article->tags ?: []) }}</p>
</article>
@empty
    <p>No articles found</p>
    @endforelse
    </div>
    </div>
    </div>
    </div>
    </body>
</html>{% endraw %}
