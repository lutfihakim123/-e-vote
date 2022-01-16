<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.0/chart.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<canvas id="myChart" class="ml-5" style="width: 500px;"></canvas>
<?php
$koneksi     = mysqli_connect("localhost", "root", "", "e-vote");
$candidate_d = mysqli_query($koneksi, "SELECT * FROM candidate inner join leader on candidate.leader_id = leader.id_leader inner join v_leader on candidate.v_leader_id = v_leader.id_v_leader order by candidate ");
$candidatest = mysqli_query($koneksi, "select * from voter  inner join candidate on voter.candidate_id = candidate.id_candidate WHERE candidate ='Candidate 1'");
$candidatsnd = mysqli_query($koneksi, "select * from voter  inner join candidate on voter.candidate_id = candidate.id_candidate WHERE candidate ='Candidate 2'");
$c_candidatest = mysqli_num_rows($candidatest);
$c_candidatsnd = mysqli_num_rows($candidatsnd);
?>
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [<?php while ($c = mysqli_fetch_array($candidate_d)) {
                            echo '" ' . $c['nama_lengkap_leader'] . ' & ' . $c['nama_lengkap_v_leader'] . '",';
                        } ?>],
            datasets: [{
                label: 'Reatime Voting',
                data: [<?= $c_candidatest; ?>, <?= $c_candidatsnd; ?>],
                backgroundColor: [
                    'red    ',
                    'royalblue',
                ],
                hoverBorderWidth: 3,
                hoverBorderColor: 'lightgrey',
            }]
        },
        options: {
            elements: {
                arc: {
                    backgroundColor: 'white',
                }
            },
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        color: '000',
                        font: {
                            size: 15
                        },
                    },
                }
            }
        }
    });
</script>