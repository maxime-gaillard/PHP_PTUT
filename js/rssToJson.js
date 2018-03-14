$(document).ready(function() {

    // The helper function to convert XML to JSON
    function parseRSS(url, callback) {
        $.ajax({
            url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=2.0&callback=?&q=' + encodeURIComponent(url),
            dataType: 'json',
            success: function (data) {
                callback(data.responseData.feed);
            }
        });
    }

    // Get the latest 5 articles from a WordPress site
    function showArticles(json) {
        for(let k=0; k<5; ++k)
        {
            var container = $(toString('#article'+k)).html(''), dynamicItems = '';
            $.each(json.entries, function (i, val) {
                dynamicItems += '<li><a href="' + val.link + '">' + val.title + '</a></li>';
                return i < 4;
            });
            container.append(dynamicItems);
        }

    }


    parseRSS('http://www.actu-transport-logistique.fr/rss.xml', showArticles);

});