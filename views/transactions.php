<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <!-- YOUR CODE -->
                <?php array_to_table($array_table) ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><!-- YOUR CODE --><?php echo $totalincome ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><!-- YOUR CODE --><?php echo $totalexpense ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><!-- YOUR CODE --><?php echo $net_total ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
