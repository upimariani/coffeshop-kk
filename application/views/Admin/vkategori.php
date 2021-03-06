<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Kategori Coffe Kolam Kita</h6>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-default" role="alert">';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    ?>

                </div>
                <div class="col-lg-6 col-5 text-right">
                    <button href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#kategori"><i class="ni ni-fat-add"></i> Kategori</button>
                    <a href="<?= base_url('Admin/c_laporan/kategori') ?>" class="btn btn-sm btn-neutral"><i class="ni ni-books"></i> Laporan</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">

    <div class="row mt--5">
        <div class="col-md-5 ml-auto mr-auto">
            <div class="card card-upgrade">
                <div class="card-header bg-transparent text-center border-bottom-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Berikut list kategori produk</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">No</th>
                                    <th scope="col" class="sort" data-sort="name">Nama Kategori</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php
                                $no = 1;
                                foreach ($kategori as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm"><?= $value->nama_kategori ?></span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#edit<?= $value->id_kategori ?>">Edit</button>
                                                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#hapus<?= $value->id_kategori ?>">Hapus</button>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah data -->
    <form action="<?= base_url('Admin/c_produk/insert_kategori') ?>" method="POST">
        <div class="modal fade" id="kategori" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Tambah Data Kategori</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">??</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="p-2 bg-secondary">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control form-control-alternative" placeholder="Masukkan Nama Produk" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal Edit -->
    <?php
    foreach ($kategori as $key => $value) {
    ?>
        <form action="<?= base_url('Admin/c_produk/edit_kategori/' . $value->id_kategori) ?>" method="POST">
            <div class="modal fade" id="edit<?= $value->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="p-2 bg-secondary">
                                <label>Nama</label>
                                <input type="text" name="nama" value="<?= $value->nama_kategori ?>" class="form-control form-control-alternative" placeholder="Masukkan Nama Produk" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php
    }
    ?>

    <?php
    foreach ($kategori as $key => $value) {
    ?>
        <!-- Modal -->
        <form action="<?= base_url('Admin/c_produk/hapus_kategori/' . $value->id_kategori) ?>" method="POST">
            <div class="modal fade" id="hapus<?= $value->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda Yakin Akan Menghapus Data Kategori <strong><?= $value->nama_kategori ?></strong>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php
    }
    ?>