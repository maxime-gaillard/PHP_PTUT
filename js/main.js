(function () {
    "use strict";

    let erreurCritique = function () {
        $('body').html(
            '<strong>Erreur critique</strong><br/><br/>' +
            'Veuillez contacter l\'éditeur'
        );
    };

    let creationFormulaire = function (nomFichier){
        let formDownload = $('<form />');
        formDownload.attr("action","../controleur/download.php");
        formDownload.attr("method","POST");
        let inputNomFic = $('<input />');
        let leBouton = $('<input />');
        inputNomFic.attr("type","text");
        inputNomFic.attr("name","nomFic");
        inputNomFic.attr("value",nomFichier);
        inputNomFic.css("display","none");
        leBouton.attr("type","submit");
        leBouton.attr("class","active1");
        leBouton.attr("value","Télécharger la pièce jointe");
        formDownload.append(inputNomFic);
        formDownload.append(leBouton);
        return formDownload;
    };

    function boucle (data, k, j, div, divFinale, typeLibelle) {

        for (let i = k; i < j; ++i) {
            div.append($('<div id="publ" />')
                .css({
                    'background-color' : 'white',
                    'margin' : 'auto',
                    'width' : '95%',
                    'height' : '260px',
                    'padding-top' : '5px',
                    'margin-bottom' : '15px',
                    'position' : 'relative',
                    // 'border-style' : 'solid',
                    // 'border-color' : '#FFA500',
                    // 'border-bottom-width' : '0px',
                    'padding-left' : '20px'
                })
                .append($('<h2 />')
                    .html(data[i]['titre'])
                    .css({'font-weight' : 'bold'})
                )
                .append($('<p />').html(data[i]['date']))
                .append($('<p />').html(data[i][typeLibelle]))
                .append(data[i]['fichier'] ? creationFormulaire(data[i]['fichier']) : null)
            );
        }
        divFinale.append(div);
    }

    let cssDiv = {
        'width' : '50%',
        'float' : 'left',
        'min-width' : '640px',
        'margin-top' : '15px',
        'display' : 'inline-block'
    };

    let titreDiv = {
        'font-size' : '40px',
        'text-align' : 'center'
    };

    function afficheAccueil (data) {

        let div = $('<div id="publAccueil1" />')
            .css(cssDiv);

        let div2 = $('<div id="publAccueil2" />')
            .css(cssDiv);

        boucle (data.publicationsPubl, 0, 2, div, $('#div-publications-accueil'), 'LibellePubl');
        boucle (data.publicationsPubl, 2, 4, div2, $('#div-publications-accueil'), 'LibellePubl');
    }

    function affichePublications(data) {

        let isempty = true;

        if (data.publicationsPubl.length) {
            let div = $('<div id="publPublications" />').css(cssDiv);

            div.append($('<h2 />')
                .html("Publications publiques")
                .css(titreDiv)
            ).append($('<br />'));

            boucle(data.publicationsPubl, 0, data.publicationsPubl.length, div, $('#div-publications'), 'LibellePubl');
            isempty = false;
        }

        if (data.est_entreprise && data.publicationsPriv.length) {
            let div1 = $('<div id="publPublicationsPriv" />').css(cssDiv);

            div1.append($('<h2 />')
                .html("Publications privées")
                .css(titreDiv)
            ).append($('<br />'));

            boucle (data.publicationsPriv, 0, data.publicationsPriv.length, div1, $('#div-publications'), 'LibellePriv');
            isempty = false;
        }


        // console.log("bouuuuu");
        if (isempty) {
            $('#div-publications').html("Aucune publications ne correspond à votre recherche.")
                .css('float', 'right');
        }
        // $('#recherche').show();
    }

    $('document').ready(function () {
        $.ajax({
            url: '/json/getPublications.php',
            method: 'get',

        }).done(function (data) {

            if (!data.est_entreprise) {
                // console.log("testtsifh");
                $('#selectPartenaire').css("display", "none");
            }
            // // vue/Body.html
            // $('#div-publications-accueil').append(
            //     $('<div />').css({
            //         //'border': 'solid black 1px',
            //         'margin-top': '2em',
            //         'margin-left': 'auto',
            //         'margin-right': 'auto',
            //         'margin-bottom': '50px',
            //         'width': '75%'
            //     }).append(
            //         $('<div id="publications-accueil-1"/>').css({
            //             'background-color': 'lightgray',
            //             'border': 'solid white 3px',
            //             'border-radius': '5px',
            //             'display': 'inline-block',
            //             'margin-right': '25px',
            //             'padding': '10px',
            //             'width': '49%'
            //         }),
            //         $('<div id="publications-accueil-2"/>').css({
            //             'background-color': 'lightgray',
            //             'border': 'solid white 3px',
            //             'border-radius': '5px',
            //             'display': 'inline-block',
            //             'padding': '10px',
            //             'width': '49%'
            //         })
            //     )
            // );
            //
            // // vue/publications.php
            // $('#div-publications').append(
            //     $('<div id="sub-div-publications"/>').css({
            //         //'border': 'solid black 1px',
            //         'margin-top': '2em',
            //         'margin-left': 'auto',
            //         'margin-right': 'auto',
            //         'margin-bottom': '50px',
            //         'width': '75%'
            //     }).append(
            //         $('<div id="publications-publiques"/>').css({
            //             'background-color': 'lightgray',
            //             'border': 'solid white 3px',
            //             'border-radius': '10px',
            //             'display': 'inline-block',
            //             'margin-right': '25px',
            //             'padding': '10px',
            //             'width': '49%'
            //         })/*, // Déclaration plus bas, quand l'utilisateur est une entreprise
            //         $('<div id="publications-privees"/>').css({
            //             'background-color': 'lightgray',
            //             'border': 'solid white 3px',
            //             'border-radius': '10px',
            //             'display': 'inline-block',
            //             'padding': '10px',
            //             'width': '49%'
            //         })*/
            //     )
            // );
            //
            // for (let i = 0; i < data.publicationsPubl.length; ++i) {
            //     let publication = data.publicationsPubl[i];
            //
            //     // vue/Body.html
            //     if (i % 2 === 0) {
            //         $('#publications-accueil-1').append(
            //             $('<h2 />').append(publication.titre),
            //             $('<p />').append(publication.date),
            //             $('<p />').append(publication.LibellePubl),
            //             $('<br />')
            //         )
            //     } else {
            //         $('#publications-accueil-2').append(
            //             $('<h2 />').append(publication.titre),
            //             $('<p />').append(publication.date),
            //             $('<p />').append(publication.LibellePubl),
            //             // $('<p />').append('Numéro d\'inscrit : ').append(publication.NumInscrit),
            //             $('<br />')
            //         )
            //     }
            //
            //     // vue/publications.php
            //     $('#publications-publiques').append(
            //         $('<h2 />').append(publication.titre),
            //         $('<p />').append(publication.date),
            //         $('<p />').append(publication.LibellePubl),
            //         $('<br />')
            //     )
            // }
            //
            // // Pour conserver
            // let publicationsPriv = data.publicationsPriv;
            //
            // $.ajax({
            //     url: '../json/estEntreprise.php'
            // }).done(function (data) {
            //     if (data.est_entreprise === true) {
            //         $('#sub-div-publications').append(
            //             $('<div id="publications-privees"/>').css({
            //                 'background-color': 'lightgray',
            //                 'border': 'solid white 3px',
            //                 'border-radius': '10px',
            //                 'display': 'inline-block',
            //                 'padding': '10px',
            //                 'width': '49%'
            //             })
            //         );
            //
            //         for (let i = 0; i < publicationsPriv.length; ++i) {
            //             let publication = publicationsPriv[i];
            //
            //             // vue/publications.php
            //             $('#publications-privees').append(
            //                 $('<h2 />').append(publication.titre),
            //                 $('<p />').append(publication.date),
            //                 $('<p />').append(publication.LibellePriv),
            //                 $('<br />')
            //             )
            //         }
            //     } // if
            // }).fail(erreurCritique);
            //$('#messhaut').hide();a
            afficheAccueil(data);
            affichePublications(data);

        }).fail(erreurCritique);

        $('#recherche').submit(function () {
            $.ajax({
                'url' : $(this).attr('action'),
                'method' : $(this).attr('method'),
                'data' : $(this).serialize()
            })
                .done(function (data) {
                    $('#div-publications').empty();
                    // console.log(data);
                    if (data.publicationsPubl == null|| data.publicationsPriv == null) {
                        window.location.reload();
                    } else {
                        affichePublications(data);
                    }

                    // $('#div-publications').append(
                    //     $('<div id="publications"/>').css({
                    //         'background-color': 'lightgray',
                    //         'border': 'solid white 3px',
                    //         'margin' : 'auto',
                    //         'border-radius': '10px',
                    //         'display': 'inline-block',
                    //         'padding': '10px',
                    //         'width': '49%'
                    //     })
                    // );
                    // for (let i in data) {
                    //
                    //     $('#publications').append(
                    //         $('<h2 />').append(data[i]['titre']),
                    //         $('<p />').append(data[i]['date']),
                    //         $('<p />').append(data[i][1]),
                    //         $('<br />')
                    //     )
                    // }
                });
            return false;
        });

        // $('#btn-publ').click(function () {
        //     $('#recherche').show();
        // })
        // $('#div-publications-accueil').css(cssDivAccueil);

    }); // $('document')


})();