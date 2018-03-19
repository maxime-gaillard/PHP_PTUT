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
            // vue/Body.html
            $('#div-publications-accueil').append(
                $('<div />').css({
                    //'border': 'solid black 1px',
                    'margin-top': '2em',
                    'margin-left': 'auto',
                    'margin-right': 'auto',
                    'margin-bottom': '50px',
                    'width': '75%'
                }).append(
                    $('<div id="publications-accueil-1"/>').css({
                        'background-color': 'lightgray',
                        'border': 'solid white 3px',
                        'border-radius': '5px',
                        'display': 'inline-block',
                        'margin-right': '25px',
                        'padding': '10px',
                        'width': '49%'
                    }),
                    $('<div id="publications-accueil-2"/>').css({
                        'background-color': 'lightgray',
                        'border': 'solid white 3px',
                        'border-radius': '5px',
                        'display': 'inline-block',
                        'padding': '10px',
                        'width': '49%'
                    })
                )
            );

            // vue/publications.php
            $('#div-publications').append(
                $('<div id="sub-div-publications"/>').css({
                    //'border': 'solid black 1px',
                    'margin-top': '2em',
                    'margin-left': 'auto',
                    'margin-right': 'auto',
                    'margin-bottom': '50px',
                    'width': '75%'
                }).append(
                    $('<div id="publications-publiques"/>').css({
                        'background-color': 'lightgray',
                        'border': 'solid white 3px',
                        'border-radius': '10px',
                        'display': 'inline-block',
                        'margin-right': '25px',
                        'padding': '10px',
                        'width': '49%'
                    })/*, // Déclaration plus bas, quand l'utilisateur est une entreprise
                    $('<div id="publications-privees"/>').css({
                        'background-color': 'lightgray',
                        'border': 'solid white 3px',
                        'border-radius': '10px',
                        'display': 'inline-block',
                        'padding': '10px',
                        'width': '49%'
                    })*/
                )
            );

            for (let i = 0; i < data.publicationsPubl.length; ++i) {
                let publication = data.publicationsPubl[i];

                // vue/Body.html
                if (i % 2 === 0) {
                    $('#publications-accueil-1').append(
                        $('<h2 />').append(publication.titre),
                        $('<p />').append(publication.date),
                        $('<p />').append(publication.LibellePubl),
                        $('<br />')
                    )
                } else {
                    $('#publications-accueil-2').append(
                        $('<h2 />').append(publication.titre),
                        $('<p />').append(publication.date),
                        $('<p />').append(publication.LibellePubl),
                        // $('<p />').append('Numéro d\'inscrit : ').append(publication.NumInscrit),
                        $('<br />')
                    )
                }

                // vue/publications.php
                $('#publications-publiques').append(
                    $('<h2 />').append(publication.titre),
                    $('<p />').append(publication.date),
                    $('<p />').append(publication.LibellePubl),
                    $('<br />')
                )
            }

            // Pour conserver
            let publicationsPriv = data.publicationsPriv;

            $.ajax({
                url: '../json/estEntreprise.php'
            }).done(function (data) {
                if (data.est_entreprise === true) {
                    $('#sub-div-publications').append(
                        $('<div id="publications-privees"/>').css({
                            'background-color': 'lightgray',
                            'border': 'solid white 3px',
                            'border-radius': '10px',
                            'display': 'inline-block',
                            'padding': '10px',
                            'width': '49%'
                        })
                    );

                    for (let i = 0; i < publicationsPriv.length; ++i) {
                        let publication = publicationsPriv[i];

                        // vue/publications.php
                        $('#publications-privees').append(
                            $('<h2 />').append(publication.titre),
                            $('<p />').append(publication.date),
                            $('<p />').append(publication.LibellePriv),
                            $('<br />')
                        )
                    }
                } // if
            }).fail(erreurCritique);
        }).fail(erreurCritique);

        $('#recherche').submit(function () {
            $.ajax({
                'url' : $(this).attr('action'),
                'method' : $(this).attr('method'),
                'data' : $(this).serialize()
            })
                .done(function (data) {
                    console.log(data);
                    $('#div-publications').empty();

                    $('#div-publications').append(
                        $('<div id="publications"/>').css({
                            'background-color': 'lightgray',
                            'border': 'solid white 3px',
                            'margin' : 'auto',
                            'border-radius': '10px',
                            'display': 'inline-block',
                            'padding': '10px',
                            'width': '49%'
                        })
                    );
                    for (let i in data) {

                        $('#publications').append(
                            $('<h2 />').append(data[i]['titre']),
                            $('<p />').append(data[i]['date']),
                            $('<p />').append(data[i][1]),
                            $('<br />')
                        )
                    }
                });
            return false;
        });

    }); // $('document')


})();