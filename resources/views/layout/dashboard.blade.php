<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>NE Exchange Rate</title>
        <style>
            body{
                margin: 0;
                font-family: 'Segoe UI', sans-serif;
                background-color: #f0f2f5;
            }

            .container{
                max-width: 800;
                margin: 50px auto;
                background: white;
                padding: 2rem;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.1)
            }

            .header h1{
                text-align: center;
                color: #007bff
            }

            table{
                width: 100%;
                border-collapse: collapse;
                margin: 2rem;
            }

            th, td{
                padding: 12px;
                border-bottom: 1px solid #ddd;
                text-align: center;
            }

            th{
                background-color: #007bff;
                color: white
            }

            .footer{
                text-align: center;
                margin-top: 2rem;
                font-size: 0.9rem;
                color: #888;
            }
            </style>
    </head>
    <body>
        <div class="container">
            <h1>NE Exchange Rate</h1>
            <table>
                <thead>
                    <tr>
                        <th>Corrency</th>
                        <th>Buy Rate</th>
                        <th>Sell Rate</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>USD</td>
                        <td>1.00</td>
                        <td>1.02</td>
                        <td>2025-05-30 10</td>
                    </tr>
                    <tr>
                        <td>GBP</td>
                        <td>1.28</td>
                        <td>1.30</td>
                        <td>2025-05-30 </td>
                    </tr>
                </tbody>
            </table>
            <div class="footer">
                <p>&copy; 2023 NE Exchange Rate</p>
            </div>
        </div>
    </body>
</html>
