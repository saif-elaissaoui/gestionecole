$(document).ready(function () {
    $.ajax({
        url: 'controller/FiliereController.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option selected>Choisir une fonction</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].id + '">' + data[i].libelle + '</option>';
            }
            $("#filiere").html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });



    $.ajax({
        url: 'controller/ClasseController.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            console.log(data)
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });


    var table = $('#table').DataTable({
        ajax: {
            url: 'controller/ClasseController.php',
            dataSrc: ''
        },
        columns: [
            {data: 'id'},
            {data: 'code'},
            {data: 'libelle'},
            {data: 'id', render: function (data) {
                    return `<button type="button" id="` + data + `" class="btn btn-outline-danger supprimer">Supprimer</button>`
                }},
            {data: 'id', render: function (data) {
                    return `<button type="button" id="` + data + `" class="btn btn-outline-secondary modifier">Modifier</button>`
                }}
        ]
    });



    $(document).on('click', '.supprimer', function (event) {
        var id = event.target.id;
        $.ajax({
            url: 'controller/ClasseController.php',
            data: {op: 'delete', id: id},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                table.ajax.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
        table.ajax.reload();
    });

    $('#btn').click(function () {
        if ($('#btn').text() == 'Ajouter') {
            var filiere = $("#filiere");
            var code = $('#code');
            $.ajax({
                url: 'controller/ClasseController.php',
                data: {op: 'add', code: code.val(), idFiliere: filiere.val()},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    table.ajax.reload();
                    code.val('');
                    filiere.val('');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus);
                }
            });
        }
    });


    $(document).on('click', '.modifier', function (event) {

        var btn = $('#btn');
        var _id = event.target.id;
        var _code = $(this).closest('tr').find('td').eq(0).text();
        var _filiere = $(this).closest('tr').find('td').eq(1).attr('value');
        btn.text('Modifier');
        $('#code').val(_code);
        $('#filiere').val(_filiere);


        btn.click(function () {
            if ($('#btn').text() == 'Modifier') {
                $.ajax({
                    url: 'controller/ClasseController.php',
                    data: {op: 'update', id: _id, code: $('#code').val(), idFiliere: $('#filiere').val()},
                    type: 'POST',
                    success: function (data, textStatus, jqXHR) {
                        table.ajax.reload();
                        $('#code').val('');

                        $(".custom-file-label").eq(0).text('Choose file...');
                        btn.text('Ajouter');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });

            }
        });
    });




    function remplir(data) {
        var contenu = $('#table-content');
        var ligne = "";
        for (i = 0; i < data.length; i++) {
            ligne += '<tr><th scope="row">' + data[i].id + '</th>';
            ligne += '<td>' + data[i].code + '</td>';
            ligne += '<td value="' + data[i].id_filiere + '">' + data[i].libelle + '</td>';
            ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
            ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';
        }
        contenu.html(ligne);
    }


});




