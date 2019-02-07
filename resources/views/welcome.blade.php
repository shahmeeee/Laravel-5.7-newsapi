@extends('content.header')
<nav class=''>
    <div class='newsnav'>

        <ul class='newslinks'>

            <a href='/'>
                <li>Live News</li>
            </a>
            <a href='{{ url('/importnews') }}'>
                <li>Import</li>
            </a>
            <a href='#'>
                <li>CONTACT</li>
            </a>
        </ul>
    </div>
</nav>
<div>
        <form class="form-inline well">

            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Select a news channel</label>
                <select name="news_channel"  id="news_channel">

                    @foreach ($news_channel as $channel)
                        <option value="{{$channel['id']}} : {{$channel['name'] }}">{{$channel['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Search by keyword</label>
                <input type="text" class="form-control" placeholder=""
                       id="keyword" >
            </div>
            <div class="form-group">
                <button type="button" onclick="reloadTheNews()" class="btn btn-primary">Search</button>
            </div>
        </form>


        <div id="refreshDiv">

        </div>
</div>



@extends('content.footer')
<script>

    function reloadTheNews() {
        var source = $('#news_channel').val();
        var _token = $('input[name="_token"]').val();
        var keyword = $('#keyword').val();
        $.ajax({
            type: "POST",
            url: "/source_id",
            data: {source: source, _token: _token, keyword: keyword},
            success: function (result) {

                $('#refreshDiv').html(result);
            },

            error: function () {
                alert("An error occoured, please try again!")
            }
        });
    }

    function keywordSearch(thes) {
        if (thes.value.length < 3) return;
        reloadTheNews();
    }
</script>
