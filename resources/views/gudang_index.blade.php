<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudangku - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    :root { --purple-main: #5e4bb6; --bg-light: #f4f7fe; }
    
    body { 
        background-color: var(--bg-light); 
        font-family: 'Inter', sans-serif; 
        overflow-x: hidden; 
        margin: 0;
    }

    /* Sidebar - Sudah Fix agar tidak kaku & bisa scroll */
    .sidebar { 
        width: 250px; 
        height: 100vh; 
        background: white; 
        position: fixed; 
        top: 0;
        left: 0;
        box-shadow: 2px 0 10px rgba(0,0,0,0.05); 
        overflow-y: auto; 
        z-index: 1000;
    }

    .sidebar-header { background: var(--purple-main); color: white; padding: 20px; font-weight: bold; font-size: 1.2rem; }
    
    .nav-link { 
        color: #666; 
        padding: 12px 25px; 
        display: flex; 
        align-items: center; 
        transition: 0.3s; 
        font-size: 0.9rem; 
        text-decoration: none; 
    }
    
    .nav-link i { width: 25px; margin-right: 10px; }
    
    .nav-link.active { 
        background: #f0eeff; 
        color: var(--purple-main); 
        border-right: 4px solid var(--purple-main); 
        font-weight: 600; 
    }
    
    .nav-link:hover { background: #f8f9fa; color: var(--purple-main); }
    
    .menu-label { 
        padding: 20px 25px 10px; 
        font-size: 0.75rem; 
        color: #aaa; 
        text-transform: uppercase; 
        letter-spacing: 1px; 
    }

    /* Top Header */
    .top-header { 
        background: var(--purple-main); 
        height: 150px; 
        margin-left: 250px; 
        padding: 30px; 
        color: white; 
    }

    /* Main Content - Sudah ada jarak aman bawah */
    .main-content { 
        margin-left: 250px; 
        margin-top: -60px; 
        padding: 0 30px 100px; /* Jarak 100px biar gak kepotong */
        min-height: 100vh;
    }

    /* Stats Card */
    .stat-card { 
        border: none; 
        border-radius: 10px; 
        padding: 20px; 
        background: white; 
        box-shadow: 0 4px 15px rgba(0,0,0,0.03); 
        height: 100%;
    }
    
    .stat-icon { 
        width: 50px; 
        height: 50px; 
        border-radius: 10px; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        font-size: 1.5rem; 
        margin-bottom: 15px; 
    }
    
    .stat-val { font-size: 1.8rem; font-weight: 700; color: #333; }
    .stat-label { color: #888; font-size: 0.85rem; }

    /* Table Area */
    .data-card { 
        background: white; 
        border-radius: 15px; 
        padding: 25px; 
        border: none; 
        box-shadow: 0 4px 15px rgba(0,0,0,0.03); 
    }
    
    .table thead { background: #f8f9fa; }
</style>

<div class="sidebar">
    <div class="sidebar-header"><i class="fas fa-box-open me-2"></i> Gudangku </div>
    
    <div class="d-flex align-items-center p-3 border-bottom mb-2">
        <img src="https://ui-avatars.com/api/?name=Admin+Gudang&background=random" class="rounded-circle me-3" width="45">
        <div>
            <div class="fw-bold small">Dina Ayu</div>
            <div class="text-muted" style="font-size: 0.7rem;"><i class="fas fa-circle text-success me-1" style="font-size: 0.5rem;"></i> Administrator</div>
        </div>
    </div>

    
    <div class="menu-label">Master</div>
    <a href="#" class="nav-link"><i class="fas fa-layer-group"></i> Data Barang</a>
    <a href="#" class="nav-link"><i class="fas fa-tags"></i> Jenis Barang</a>

    <div class="menu-label">Transaksi</div>
    <a href="#" class="nav-link"><i class="fas fa-arrow-circle-down text-success"></i> Barang Masuk</a>
    <a href="#" class="nav-link"><i class="fas fa-arrow-circle-up text-danger"></i> Barang Keluar</a>

    <div class="menu-label">Laporan</div>
    <a href="#" class="nav-link"><i class="fas fa-clipboard-list"></i> Laporan Stok</a>
    <a href="#" class="nav-link"><i class="fas fa-file-invoice text-primary"></i> Laporan penjualan</a>


    <div class="menu-label">Pengaturan</div>
    <a href="#" class="nav-link"><i class="fas fa-user-cog"></i> Manajemen User</a>
    <a href="#" class="nav-link text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div class="top-header">
    <h4 class="m-0"><i class="fas fa-home me-2"></i> Dashboard</h4>
</div>

<div class="main-content">
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary"><i class="fas fa-box"></i></div>
                <div class="stat-label">Data Barang</div>
                <div class="stat-val">{{ $barangs->count() }}</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card border-start border-success border-4">
                <div class="stat-icon bg-success bg-opacity-10 text-success"><i class="fas fa-arrow-down"></i></div>
                <div class="stat-label">Barang Masuk</div>
                <div class="stat-val">3</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card border-start border-warning border-4">
                <div class="stat-icon bg-warning bg-opacity-10 text-warning"><i class="fas fa-arrow-up"></i></div>
                <div class="stat-label">Barang Keluar</div>
                <div class="stat-val">0</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card border-start border-info border-4">
                <div class="stat-icon bg-info bg-opacity-10 text-info"><i class="fas fa-penjualan"></i></div>
                <div class="stat-label">Penjualan</div>
                <div class="stat-val">2</div>
            </div>
        </div>
    </div>

    <div class="data-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h6 class="m-0 fw-bold"><i class="fas fa-exclamation-triangle text-warning me-2"></i> Stok barang telah mencapai batas minimum</h6>
            <button class="btn btn-sm btn-primary px-3" data-bs-toggle="modal" data-bs-target="#addModal">+ Tambah Barang</button>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-muted small fw-normal">No.</th>
                        <th class="text-muted small fw-normal">Nama Barang</th>
                        <th class="text-muted small fw-normal">Jenis/Kategori</th>
                        <th class="text-muted small fw-normal">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangs as $index => $b)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $b->nama_barang }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $b->kategori }}</span></td>
                        <td>
                            <span class="badge rounded-pill {{ $b->stok <= 5 ? 'bg-danger' : 'bg-warning text-dark' }} px-3">
                                {{ $b->stok }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">Input Material Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('barang.simpan') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control bg-light border-0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Kategori</label>
                        <input type="text" name="kategori" class="form-control bg-light border-0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small">Jumlah Stok</label>
                        <input type="number" name="stok" class="form-control bg-light border-0" required>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary px-4 w-100 shadow">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>