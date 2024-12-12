<div id="load" style="position: relative;">
    @foreach($articles as $article)
        <div>
            <h3>
                {{$article->company_name }}
            </h3>
        </div>
    @endforeach
    </div>
    {{ $articles->links() }}