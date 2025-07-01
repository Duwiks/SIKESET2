<div class="text-center">
    <div style="max-width: 250px; margin: 0 auto;">
        <canvas id="chartPie" width="250" height="250"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartPie').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Peminjaman', 'Pengembalian'],
            datasets: [{
                label: 'Jumlah',
                data: [{{ $pinjam }}, {{ $kembali }}],
                backgroundColor: ['#0d6efd', '#198754'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });
</script>