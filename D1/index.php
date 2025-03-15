<?php
$names = [
    'Charlotte', 'Megan', 'Sophie', 'Emily', 'Jessica', 'Lucy', 'Chloe', 'Olivia', 'Hannah', 'Ellie',
    'Katie', 'Ella', 'Amelia', 'Amy', 'Holly', 'Grace', 'Alice', 'Daisy', 'Isabella', 'Paige',
    'Caitlin', 'Anna', 'Leah', 'Millie', 'Molly', 'Oliver', 'Joseph', 'Harry', 'Joshua', 'James',
    'William', 'Samuel', 'Daniel', 'Jack', 'Thomas', 'Matthew', 'Luke', 'Ethan', 'Lewis', 'Benjamin',
    'Mohammed', 'Callum', 'Alexander', 'Louis', 'Harrison', 'Edward', 'Brandon', 'Jacob', 'Michael', 'Liam'
];

$data = [];
$bars = mt_rand(5, 15);
for ($i = 0; $i < $bars; $i++) {
    shuffle($names);
    $data[] = [
        'name' => array_pop($names),
        'value' => mt_rand(50, 500)
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagram</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>
<body>

    <div class="container">
        <canvas width="1000" height="600" id="canvas"></canvas>
    </div>

    <script>
        const dataDiagram = <?php echo json_encode($data); ?>;

        const canvas = document.getElementById("canvas")
        const ctx = canvas.getContext("2d")

        let daftarLabel = dataDiagram.map(item => item.name)
        let daftarNilai = dataDiagram.map(item => item.value)

        const margin = 50
        const lebarGrafik = canvas.width - 2 * margin
        const tinggiGrafik = canvas.height - 2 * margin

        function cariNilaiTertinggi() {
            let maks = Math.max(...daftarNilai)
            return Math.ceil(maks / 100) * 100 
        }

        

        function gambarUlang() {
            ctx.clearRect(0, 0, canvas.width, canvas.height)
            gambarGaris()
            gambarLabelX()
            gambarLabelY()
            gambarGrafik()
        }

        function gambarGaris() {
            ctx.beginPath()
            ctx.moveTo(margin, margin)
            ctx.lineTo(margin, canvas.height - margin)
            ctx.lineTo(canvas.width - margin, canvas.height - margin)
            ctx.strokeStyle = "black"
            ctx.stroke()
        }

        function gambarLabelX() {
            ctx.font = "14px Arial"
            ctx.fillStyle = "black"

            for (let i = 0; i < daftarLabel.length; i++) {
                let x = margin + (i * (lebarGrafik / daftarLabel.length)) + (lebarGrafik / daftarLabel.length) / 2
                ctx.textAlign = "center"
                ctx.fillText(daftarLabel[i], x, canvas.height - margin + 20)
            }
        }

        function gambarLabelY() {
            ctx.font = "14px Arial"
            ctx.fillStyle = "black"
            let maksY = cariNilaiTertinggi()

            for (let i = 0; i <= maksY; i += 100) { 
                let y = canvas.height - margin - (i / maksY * tinggiGrafik)
                ctx.fillText(i, margin - 40, y + 5)
            }
        }

        function gambarGrafik() {
            let maksY = cariNilaiTertinggi()
            let lebarBatang = lebarGrafik / daftarLabel.length * 0.6
            
            for (let i = 0; i < daftarNilai.length; i++) {
                
                let x = margin + i * (lebarGrafik / daftarLabel.length) + (lebarGrafik / daftarLabel.length) / 2 - (lebarBatang / 2)
                let tinggiBatang = (daftarNilai[i] / maksY) * tinggiGrafik
                let y = canvas.height - margin - tinggiBatang
                
                ctx.fillStyle = `rgb(${Math.random() * 255}, ${Math.random() * 255}, ${Math.random() * 255})`
                ctx.fillRect(x, y, lebarBatang, tinggiBatang)
            }
        }

        gambarUlang()
    </script>
</body>
</html>
