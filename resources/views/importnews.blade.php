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

<form>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="">Select to Import</label>
        <select name="type"  id="type">
            <option value="1">source</option>
            <option value="2">Everything</option>
            <option value="2"></option>
        </select>
    </div>
    <button type="button" onclick="importAll()" class="btn btn-primary">Import</button>
</form>

<div id="refreshDiv">

</div>


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
function importAll(){
    var _token = $('input[name="_token"]').val();
    $.ajax({
        type: "POST",
        url: "/importdata",
        data: {type:$('#type').val(), _token :_token},
        success: function (result) {

            alert('success')
        },

        error: function () {
            alert("An error occoured, please try again!")
        }
    });
}
</script>