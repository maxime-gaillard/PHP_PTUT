(function() {

    $(document).ready(function() {


        function capitaliseFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function parseRSS(url, container) {
            $.ajax({
                url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=10&callback=?&q=' + encodeURIComponent(url),
                dataType: 'json'
            })
            .done(function (data) {
                // TODO ce code produit une erreur
                /*$(container).html('<h2>'+ data.responseData.feed.title +'</h2>');

                $.each(data.responseData.feed.entries, function(key, value){
                    let thehtml = '<h3><a href="' + value.link + '" target="_blank">' + value.title + '</a></h3>';
                    $(container).append(thehtml);
                });*/
            })
        }


        parseRSS('http://www.actu-transport-logistique.fr/rss.xml', "#site1");

    });

}) ();