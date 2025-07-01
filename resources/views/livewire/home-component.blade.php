<div class="container-fluid py-4">
    {{-- Bagian Card Statistik --}}
    @include("components.layouts.card")

    {{-- Bagian Diagram Peminjaman vs Pengembalian --}}
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card border-0 shadow rounded-4">
                <div class="card-body">
                    @include('components.layouts.diagram', [
                        'pinjam' => $pinjam,
                        'kembali' => $kembali
                    ])
                </div>
            </div>
        </div>
    </div>
</div>