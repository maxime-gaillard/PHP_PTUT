(function () {
    "use strict";

    let erreurCritique = function () {
        $('body').html(
            '<strong>Erreur critique</strong><br/><br/>' +
            'Veuillez contacter l\'éditeur'
        );
    };

    $('document').ready(function () {
        $.ajax({
            url: '/json/getPublications.php',
            method: 'get'
        }).done(function (data) {
            $('#div-publications').append(
                //$('<h1 />').append('Publications publiques'),
                //$('<h1 />').append('Publications privées'),
                $('<div />').css({
                    //'border': 'solid black 1px',
                    'margin-left': 'auto',
                    'margin-right': 'auto',
                    'margin-bottom': '50px',
                    'width': '75%'
                }).append(
                    $('<div id="div-publicationsPubl"/>').css({
                        'border': 'solid blue 1px',
                        'border-radius': '10px',
                        'display': 'inline-block',
                        'margin-right': '25px',
                        'padding': '10px',
                        'width': '49%'
                    }),
                    $('<div id="div-publicationsPriv"/>').css({
                        'border': 'solid blue 1px',
                        'border-radius': '10px',
                        'display': 'inline-block',
                        //'margin-right': '10px',
                        'padding': '10px',
                        'width': '49%'
                    })
                )
            );

            for (let i = 0; i < data.publicationsPubl.length; ++i) {
                let publication = data.publicationsPubl[i];
                $('#div-publicationsPubl').append(
                    $('<h2 />').append(publication.LibellePubl),
                    $('<p />').append('Numéro de publication : ').append(publication.NumPPubl),
                    $('<p />').append('Numéro d\'inscrit : ').append(publication.NumInscrit),
                    $('<br />')
                )
            }

            for (let i = 0; i < data.publicationsPriv.length; ++i) {
                let publication = data.publicationsPriv[i];
                $('#div-publicationsPriv').append(
                    $('<h2 />').append(publication.LibellePriv),
                    $('<p />').append('Numéro de publication : ').append(publication.NumPPriv),
                    $('<p />').append('Numéro d\'inscrit : ').append(publication.NumInscrit),
                    $('<br />')
                )
            }
        }).fail(erreurCritique);
    });
})();