$(document).ready(function () {
    /*Je vérifie que le formulaire est soumis*/
    $('.formulaireRecherche').submit(function () {

        /*Je récupere la valeur text de l'input productName sur le formulaire*/
        var maRecherche = $('#maRecherche option:selected').text();
        var laDateStart = $('#laDate_start').val();
        var laDateEnd = $('#laDate_end').val();

        $.post('/views/productscustomers/recup.php', {laRecherche: maRecherche}, function (data) {
            /*En masque le tableau principal*/
            $('.master').hide();

            $('.afficher').html(data);
        });


        $.post('/views/employeesproductscustomerscity/recup.php', {laRecherche: maRecherche}, function (data) {
            /*En masque le tableau principal*/
            $('.master').hide();

            $('.afficher').html(data);
        });

        $.post('/views/employeesproductscustomersdate/recup.php', {
            laDate_start: laDateStart,
            laDate_end: laDateEnd
        }, function (data) {
            /*En masque le tableau principal*/
            $('.master').hide();

            $('.afficher').html(data);
        });

        /*Pour éviter la soumission*/
        return false;
    });

    function recupDonnees() {
        $.post('/views/productscustomers/recup.php', function (data) {
            $('.afficher').html(data);
        })
    }
});
