<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0"><i class="ni ni-basket text-default"></i> Laporan Transaksi</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="<?= base_url('Admin/c_laporan/transaksi') ?>" class="btn btn-sm btn-neutral"><i class="ni ni-books"></i> Laporan</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <!-- Dark table -->
    <div class="row">
        <div class="col">
            <div class="card bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h3 class="text-white mb-0">Order Pesanan Coffe Kolam Kita</h3><br>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-primary" role="alert">';
                        echo '<strong>Sukses!</strong>' . $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Id Transaksi</th>
                                <th scope="col" class="sort" data-sort="budget">Atas Nama</th>
                                <th scope="col" class="sort" data-sort="budget">Status Pembayaran</th>
                                <th scope="col" class="sort" data-sort="status">Total Bayar</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($transaksi as $key => $value) {
                        ?>
                            <tbody class="list">
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <span class="name mb-0 text-sm"><?= $value->id_transaksi ?></span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="budget">
                                        <?= $value->atas_nama ?>
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            <?php if ($value->bayar == '0') {
                                            ?>
                                                <i class="bg-warning"></i>
                                                <span class="status"><?php
                                                                        echo '<span class="badge badge-warning">belum bayar</span></span>';
                                                                    } else {
                                                                        ?>
                                                    <i class="bg-success"></i>
                                                    <span class="status">
                                                    <?php
                                                                        echo '<span class="badge badge badge-success">pembayaran valid</span></span>';
                                                                    } ?>
                                                    </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-success badge-md ">Rp. <?= number_format($value->total_bayar, 0)  ?></span>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="<?= base_url('Admin/c_transaksi/detail_transaksi/' . $value->id_transaksi) ?>">View Pemesanan</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>