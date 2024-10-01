<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Bunga</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <nav class="mb-5">
        <div class="bg-gradient-to-r from-blue-500 to-green-500 text-white p-4 rounded-md">
            <h1 class="text-3xl font-bold">Selamat Datang di Kalkulator Bunga</h1>
        </div>
    </nav>
    <div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-6 bg-gradient-to-r from-blue-500 to-green-500 text-white p-4 rounded-md">Kalkulator Bunga</h1>
        <form id="bungaForm" class="space-y-4">
            <div>
                <label for="principal" class="block text-sm font-medium text-gray-700">Modal Awal</label>
                <input type="text" id="principal" name="principal" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="rate" class="block text-sm font-medium text-gray-700">Jumlah Bunga (%)</label>
                <input type="text" id="rate" name="rate" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="time" class="block text-sm font-medium text-gray-700">Waktu (Tahun)</label>
                <input type="text" id="time" name="time" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700">Jenis Bunga</label>
                <select id="type" name="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="simple">Bunga Tunggal</option>
                    <option value="compound">Bunga Majemuk</option>
                </select>
            </div>
            <div>
                <button type="button" onclick="calculate()" class="w-full bg-blue-500 text-white py-2 rounded-md">Hitung</button>
            </div>
        </form>
        <div id="result" class="mt-6 text-lg font-semibold"></div>
        <div id="result-final" class="text-lg font-semibold"></div>
    </div>

    <script>
        function calculate() {
            const principal = parseFloat(document.getElementById('principal').value);
            const rate = parseFloat(document.getElementById('rate').value) / 100;
            const time = parseFloat(document.getElementById('time').value);
            const type = document.getElementById('type').value;

            let result = 0;

            if (type === 'simple') {
                result = principal * rate * time;
            } else if (type === 'compound') {
                result = principal * Math.pow((1 + rate), time) - principal;
            }

            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 2
            });
            document.getElementById('result').innerText = `Total Bunga : ${formatter.format(result)}`;
            document.getElementById('result-final').innerText = `Modal Akhir : ${formatter.format(principal + result)}`;
        }
    </script>
</body>
</html>
