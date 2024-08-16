
<section class="py-5">


    <div class="container">
        <div class="locale text-center mb-5 ">
            <button class="btn btn-white btn-sm" onclick="showContent('en')">en</button>
            <button class="btn btn-white btn-sm" onclick="showContent('np')">np</button>
        </div>


        <div class="row">
            <div class="col text-center text-md-start">
                <div id="contentToShow">
                    <div class="english" style="display:show">
                        <h2>{{ $page->title['en'] }}</h2>
                        <hr>
                        <p>{!! $page->content['en'] !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<script>
    function showContent(language) {
        var contentContainer = document.getElementById('contentToShow');
        if (language === 'en') {
            contentContainer.innerHTML =
                '<h2>{{ $page->title['en'] }}</h2>' +
                '<p>{{ $page->content['en'] }}</p>';
        } else if (language === 'np') {
            contentContainer.innerHTML =
                '<h2>{{ $page->title['np'] }}</h2>' +
                '<p>{{ $page->content['np'] }}</p>';
        }
    }
</script>
