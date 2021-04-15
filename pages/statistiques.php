<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['employe'])) {
    ?>
    <div class="card bg-white" >
        <div class="card-header card-color">
            <p class="h2 text-center text-uppercase font-weight-bold pt-2">Statistiques</p>
        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js' ></script>

    <div class="row">
        <canvas id="myChart" width="200" height="100"></canvas>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        $.ajax({
            url: 'http://localhost/gestionecole/controller/ClasseController.php',
            data: {op :'count'},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                console.log(JSON.stringify(data))
                var x = Array();
                var y = Array();
                data.forEach(function (e) {
                    y.push(e.nbr);
                    x.push(e.filiere);
                });
                showGraph(x, y);
            }, error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus)
            }
        });
        function showGraph(x, y) {
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: x,
                    datasets: [{

                            data: y,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {

                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                generateLabels: function (chart) {
                                    return chart.data.labels.map(function (label, i) {
                                        return {
                                            text: label,
                                            fillStyle: chart.data.datasets[0].backgroundColor[i],

                                        };
                                    });
                                }
                            }


                        },

                        title: {
                            display: true,
                            text: 'Nombre de classe par filiere'
                        }
                    },

                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Classe'
                            }
                        },
                        x: {

                            title: {
                                display: true,
                                text: 'Filiere'
                            }
                        }
                    }
                }
            });
        }
    </script>

    <?php
} else {
    header("Location: ../index.php");
}
?>