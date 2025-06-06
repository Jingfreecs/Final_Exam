<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.2-dist/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    <title>Currency Exchange Rates</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <style>
        .currency-cards {
            max-width: 200px;
            margin-right: 20px;
        }

        .currency-card {
            display: flex;
            align-items: center;
            justify-content: start;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .currency-card img {
            width: 30px;
            height: 20px;
            margin-right: 10px;
        }

        .currency-card.active {
            background-color: #0d6efd;
            color: white;
        }

        .table-container {
            flex: 1;
            margin-right: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f8f9fa;
        }

        .exchange-data {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Exchange Rates</h2>
        <p id="lastUpdateTime">Last updated: N/A</p>
        <a href="https://www.exchangerate-api.com">Rates By Exchange Rate API</a>

        <div class="row">
            <div class="col-md-8">
                <table>
                    <thead>
                        <tr>
                            <th>Currency</th>
                            <th>Exchange Rates</th>
                        </tr>
                    </thead>
                    <tbody id="exchangeTableBody">
                        <tr>
                            <td colspan="2">Fetching rates...</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <div class="currency-cards">
                    <h4>Select Currency</h4>
                    <div class="currency-card" data-currency="USD">
                        <img src="https://flagcdn.com/w40/us.png" alt="US Flag"> USD
                    </div>
                    <div class="currency-card" data-currency="EUR">
                        <img src="https://flagcdn.com/w40/eu.png" alt="EU Flag"> EUR
                    </div>
                    <div class="currency-card" data-currency="GBP">
                        <img src="https://flagcdn.com/w40/gb.png" alt="UK Flag"> GBP
                    </div>
                    <div class="currency-card" data-currency="AUD">
                        <img src="https://flagcdn.com/w40/au.png" alt="Australia Flag"> AUD
                    </div>
                    <div class="currency-card" data-currency="PHP">
                        <img src="https://flagcdn.com/w40/ph.png" alt="Philippines Flag"> PHP
                    </div>
                    <div class="currency-card" data-currency="AFN">
                        <img src="https://flagcdn.com/w40/af.png" alt="Afghanistan Flag"> AFN
                    </div>
                    <div class="currency-card" data-currency="CAD">
                        <img src="https://flagcdn.com/w40/ca.png" alt="Canada Flag"> CAD
                    </div>
                    <div class="currency-card" data-currency="JPY">
                        <img src="https://flagcdn.com/w40/jp.png" alt="Japan Flag"> JPY
                    </div>
                    <div class="currency-card" data-currency="CNY">
                        <img src="https://flagcdn.com/w40/cn.png" alt="China Flag"> CNY
                    </div>
                    <div class="currency-card" data-currency="INR">
                        <img src="https://flagcdn.com/w40/in.png" alt="India Flag"> INR
                    </div>
                    <div class="currency-card" data-currency="BRL">
                        <img src="https://flagcdn.com/w40/br.png" alt="Brazil Flag"> BRL
                    </div>
                    <div class="currency-card" data-currency="MXN">
                        <img src="https://flagcdn.com/w40/mx.png" alt="Mexico Flag"> MXN
                    </div>
                    <div class="currency-card" data-currency="ZAR">
                        <img src="https://flagcdn.com/w40/za.png" alt="South Africa Flag"> ZAR
                    </div>
                    <div class="currency-card" data-currency="RUB">
                        <img src="https://flagcdn.com/w40/ru.png" alt="Russia Flag"> RUB
                    </div>
                    <div class="currency-card" data-currency="KRW">
                        <img src="https://flagcdn.com/w40/kr.png" alt="South Korea Flag"> KRW
                    </div>
                    <div class="currency-card" data-currency="TRY">
                        <img src="https://flagcdn.com/w40/tr.png" alt="Turkey Flag"> TRY
                    </div>
                    <div class="currency-card" data-currency="NZD">
                        <img src="https://flagcdn.com/w40/nz.png" alt="New Zealand Flag"> NZD
                    </div>
                    <div class="currency-card" data-currency="CHF">
                        <img src="https://flagcdn.com/w40/ch.png" alt="Switzerland Flag"> CHF
                    </div>
                    <div class="currency-card" data-currency="SGD">
                        <img src="https://flagcdn.com/w40/sg.png" alt="Singapore Flag"> SGD
                    </div>
                    <div class="currency-card" data-currency="HKD">
                        <img src="https://flagcdn.com/w40/hk.png" alt="Hong Kong Flag"> HKD
                    </div>
                    <div class="currency-card" data-currency="SEK">
                        <img src="https://flagcdn.com/w40/se.png" alt="Sweden Flag"> SEK
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            let source;

            function startSSE(currency) {
                if (source) source.close(); // Close existing SSE connection
                source = new EventSource(`/currency-converter/sse?currency=${currency}`);

                source.onmessage = function(event) {
                    const data = JSON.parse(event.data);

                    if (data.result !== 'success') {
                        $('#exchangeTableBody').html('<tr><td colspan="2">Error fetching data</td></tr>');
                        source.close();
                    } else {
                        updateTable(data.rates);
                        updateLastUpdateTime(data.lastUpdated);
                    }
                };

                source.onerror = function() {
                    $('#exchangeTableBody').html('<tr><td colspan="2">Error fetching data</td></tr>');
                    source.close();
                };
            }

            function updateTable(rates) {
                const tableBody = $('#exchangeTableBody');
                tableBody.empty(); // Clear the table

                for (const [currency, rate] of Object.entries(rates)) {
                    tableBody.append(`
                        <tr>
                            <td>${currency}</td>
                            <td>${rate.toFixed(2)}</td>
                        </tr>
                    `);
                }
            }

            function updateLastUpdateTime(timestamp) {
                $('#lastUpdateTime').text(`Last updated: ${timestamp}`);
            }

            $('.currency-card').click(function() {
                const selectedCurrency = $(this).data('currency').toUpperCase();
                console.log(`Fetching exchange rates for: ${selectedCurrency}`);

                $('.currency-card').removeClass('active');
                $(this).addClass('active');

                startSSE(selectedCurrency);
            });

            // Start with USD as the default currency
            $('.currency-card[data-currency="USD"]').addClass('active');
            startSSE('USD');
        });
    </script>
</body>
</html>
