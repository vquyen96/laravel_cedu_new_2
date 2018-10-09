<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>
    <base href="{{asset('public/layout/frontend')}}/">
    <link href="//vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
</head>
<body>
<div class="currentUrl" style="display: none;">{{ asset('') }}</div>
<div id="stream"></div>
<video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered"
       controls preload="auto" height="600" width="980">

    <source src="{{url($video)}}" type="{{$mime}}" />
</video>

<script src="//vjs.zencdn.net/4.12/video.js"></script>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
{{--<script>--}}
    {{--videojs(document.getElementById('example_video_1'), {}, function() {--}}
        {{--// This is functionally the same as the previous example.--}}
    {{--});--}}
    {{--var url = $('.currentUrl').text();--}}
    {{--$.ajax({--}}
        {{--method: 'GET',--}}
        {{--url: url+'video/[Offical%20MV]%20Đưa%20nhau%20đi%20trốn%20-%20Đen%20ft.%20Linh%20Cáo%20(Prod.%20by%20Suicidal%20illness).mp4',--}}
        {{--data: {--}}
        {{--},--}}
        {{--success: function (resp) {--}}
            {{--$('#stream').html(resp);--}}

        {{--},--}}
        {{--error: function () {--}}
            {{--console.log(resp);--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}
</body>
</html>