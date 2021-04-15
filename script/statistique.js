$(document).ready(function () {
        function getCountFrom(url, i) {
            $.ajax({
                url: url,
                data: {op: ''},
                type: 'POST',
                success: function (data, textStatus, jqXHR) {
                    $('h2[class="number"]').eq(i).text(data.length);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('h2[class="number"]').eq(i).text('...');
                }
            });
        }
        getCountFrom('controller/ClasseController.php', 0);
        getCountFrom('controller/filiereControler.php', 1);
   
    });