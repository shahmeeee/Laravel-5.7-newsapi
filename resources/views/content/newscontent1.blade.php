<div class="row-fluid">
    <div class="col-md-12">
    <p> News Source : {{$source_name}}</p>
    <section class="news">
        @foreach($news as $selected_news)
            <article>
                <img src="{{$selected_news['urlToImage']}}" alt="" />
                <div class="text">
                    <h1>{{$selected_news['title']}}</h1>
                    <p style="font-size: 14px">{{$selected_news['description']}} <a href="{{$selected_news['url']}}" target="_blank"><small>read more...</small></a> </p>
                    <div style="padding-top: 5px;font-size: 12px">Author: {{$selected_news['author'] or "Unknown" }}</div>
                    @if($selected_news['publishedAt'] != null)
                        <div style="padding-top: 5px;">Date Published: {{ Carbon\Carbon::parse($selected_news['publishedAt'])->format('l jS \\of F Y ') }}</div>
                    @else
                        <div style="padding-top: 5px;">Date Published: Unknown</div>

                    @endif

                </div>
            </article>
        @endforeach
    </section>
    </div>
</div>