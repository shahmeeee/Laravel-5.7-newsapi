

<div class='row'>
    @if(!empty($news))
    @foreach($news as $selected_news)
        <a target="_blank" href='{{$selected_news->url}}' class=' col-md-4 col-sm-6 col-xs-6 col-xxs-12'>
            <article class='style1'>
                <div class='date'>
                    @if($selected_news->publishedAt != null)



                        <div style="padding-top: 5px;">{{ Carbon\Carbon::parse($selected_news->publishedAt)->toFormattedDateString()}}</div>
                    @else
                        <div style="padding-top: 5px;">-</div>

                    @endif
                </div>

                <i class="loader fa fa-spinner"></i>
                <img src="{{$selected_news->urlToImage}}" alt=""/>
                <div class='content'>
                    <!--32 charecter max-->
                    <div class='title'>
                        <span style="">
                            {{$selected_news->title}} <i class="share fa fa-share-square-o"></i> </span>
                        <br>  <span style="font-size: 11px"> Author - {{($selected_news->author !='' ? $selected_news->author: 'Unknown') }}</span>
                    </div>
                    <div class='info'>
                        <p>{{$selected_news->description}}</p>

                    </div>
                </div>
            </article>
        </a>
@endforeach
@else
        <div class="row-fluid">
            <div class="col-md-12">
        <div class="alert alert-warning" role="alert">
            <a href="#" class="alert-link"> Nothing to display</a>
        </div>
            </div>
        </div>


@endif




<!--STYLE2-->


</div>
</div>



