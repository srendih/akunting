<?php 
// $query = mysqli_query($connect, "SELECT * FROM invoice WHERE tgl_terima IS NULL ORDER BY id");
$query = mysqli_query($connect, "SELECT COUNT(id) AS tanggal FROM invoice WHERE tgl_terima IS NULL ORDER BY id");
?>
<script>
    
    window.onload = function () {
    
        var options = {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: "Transaksi Jumlah Invoice"
            },
            axisY: {
                title: "Jumlah Data Masuk",
                valueFormatString: "#0"
            },
            legend: {
                cursor: "pointer",
                itemclick: toogleDataSeries
            },
            toolTip: {
                shared: true
                },
            data: [{
                type: "area",
                name: "Tanda Terima",
                markerSize: 5,
                showInLegend: true,
                xValueFormatString: "MMMM",
                dataPoints: [

                <?php 
                // $query = mysqli_query($connect, "SELECT * FROM invoice WHERE tgl_terima IS NULL ORDER BY id");
                $querysurat = mysqli_query($connect, "SELECT * FROM invoice ORDER BY id");
                $tmpilsurat = mysqli_fetch_array($querysurat);
                ?>
                    // while($data =mysql_fetch_array($query))
                    {
                         x: new Date(2017, 0), y: <?php echo $tmpilsurat['bayar_inv']; ?> 
                        }
                ]
            }, {
                type: "area",
                name: "Jumlah Invoice Pembayaran",
                markerSize: 5,
                showInLegend: true,
                dataPoints: [
                    <?php 
                // $query = mysqli_query($connect, "SELECT * FROM invoice WHERE tgl_terima IS NULL ORDER BY id");
                $query1 = mysqli_query($connect, "SELECT COUNT(id) AS bayar FROM invoice WHERE bayar_inv IS NOT NULL ORDER BY id");
                $tmpil = mysqli_fetch_assoc($query1);
                ?>
                    { x: new Date(2017, 0), y: <?php echo $tmpil['bayar']; ?>
                     }
                ]
            }]
        };
        $("#chartContainer").CanvasJSChart(options);
        
        function toogleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }
        
        }
    </script>