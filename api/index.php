<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../ifms.ico" type="image/x-icon">
    <title>Calculadora de Ganho em Investimento</title>
	<style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin: 20px 0;
        }

        table {
            width: 400px;
            margin: 0 auto;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        input[type="number"] {
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
		
		.result {
            text-align: left;
            margin: auto;
            width: 70%;
            margin-top: 30px;
        }

        .result p {
            margin-bottom: 10px;
        }
        .results {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2 style="width: 35%;text-align: center; align-items: center; margin: auto;">Calculadora de Ganho em Investimento</h2>
    <br>
    <table>
        <tr>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <th>Descrição</th>
                <th>Valor</th>
                <tr>
                    <td>Valor do Investimento:</td>
                    <td><input type="number" name="valor_investido" step="0.01" required></td>
                </tr>
                <tr>
                    <td>Mensalidade:</td>
                    <td><input type="number" name="mensalidade" step="0.01" required></td>
                </tr>
                <tr>
                    <td>Período em meses:</td>
                    <td><input type="number" name="periodo_meses" required></td>
                </tr>
                <tr>
                    <td>Período em anos:</td>
                    <td><input type="number" name="periodo_anos" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="width: 35%;text-align: center; align-items: center; margin: auto;"><input type="submit" value="Calcular"></td>
                </tr>
            </form>
        </tr>
    </table>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor_investido = $_POST["valor_investido"];
        $mensalidade = $_POST["mensalidade"];
        $periodo_meses = $_POST["periodo_meses"];
        $periodo_anos = $_POST["periodo_anos"];

        $total_investido = $valor_investido + ($mensalidade * $periodo_meses);
        $ganho_poupanca = $total_investido * 0.005 * $periodo_meses;
        $ganho_selic = $total_investido * 0.01 * $periodo_meses;

        $montante_poupanca = $total_investido + $ganho_poupanca;
        $montante_selic = $total_investido + $ganho_selic;

        $ganho_poupanca_anual = $total_investido * 0.005 * ($periodo_anos * 12);
        $ganho_selic_anual = $total_investido * 0.01 * ($periodo_anos * 12);

        $montante_poupanca_anual = $total_investido + $ganho_poupanca_anual;
        $montante_selic_anual = $total_investido + $ganho_selic_anual;

        echo '<div class="result" style="width: 35%;text-align: center; align-items: center; margin: auto;">';
        echo "<h3>Resultados:</h3>";
        echo "<p>Total Investido: R$ " . number_format($total_investido, 2, ",", ".") . "</p>";
        echo "<p>Ganho na Poupança (mensal): R$ " . number_format($ganho_poupanca, 2, ",", ".") . "</p>";
        echo "<p>Montante na Poupança (mensal): R$ " . number_format($montante_poupanca, 2, ",", ".") . "</p>";
        echo "<p>Ganho na SELIC (mensal): R$ " . number_format($ganho_selic, 2, ",", ".") . "</p>";
        echo "<p>Montante na SELIC (mensal): R$ " . number_format($montante_selic, 2, ",", ".") . "</p>";
        echo "<p>Ganho na Poupança (anual): R$ " . number_format($ganho_poupanca_anual, 2, ",", ".") . "</p>";
        echo "<p>Montante na Poupança (anual): R$ " . number_format($montante_poupanca_anual, 2, ",", ".") . "</p>";
        echo "<p>Ganho na SELIC (anual): R$ " . number_format($ganho_selic_anual, 2, ",", ".") . "</p>";
        echo "<p>Montante na SELIC (anual): R$ " . number_format($montante_selic_anual, 2, ",", ".") . "</p>";
        echo '</div>';
    }
    ?>
</body>
</html>