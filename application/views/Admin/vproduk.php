<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Produk Coffe Kolam Kita</h6>
                    <?php
                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-default" role="alert">';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    }
                    if (isset($error)) {
                        echo '  <div class="callout callout-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h6><i class="icon fas fa-check"></i>';
                        echo $error;
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <button href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#produk"><i class="ni ni-fat-add"></i> Produk</button>
                    <a href="<?= base_url('Admin/c_laporan/produk') ?>" class="btn btn-sm btn-neutral"><i class="ni ni-books"></i> Laporan</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Berikut list produk</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Nama</th>
                                    <th scope="col" class="sort" data-sort="budget">Kategori</th>
                                    <th scope="col" class="sort" data-sort="status">Harga</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php
                                foreach ($produk as $key => $value) {
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="<?= $value->nama_produk ?>" src="<?= base_url() ?>asset/gambar/<?= $value->gambar ?>">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm"><?= $value->nama_produk ?></span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            <?= $value->nama_kategori ?>
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i>
                                                <span class="badge badge-default">Rp. <?= number_format($value->harga, 0) ?></span>
                                            </span>
                                        </td>
                                        <td><?= $value->deskripsi ?></td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <button type="button" class="dropdown-item text-center" data-toggle="modal" data-target="#edit<?= $value->id_produk ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="dropdown-item text-center" data-toggle="modal" data-target="#hapus<?= $value->id_produk ?>">
                                                        Hapus
                                                    </button>
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

    <?php echo form_open_multipart('Admin/c_produk/insert_produk'); ?>
    <div class="modal fade" id="produk" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Tambah Data Produk</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="p-2 bg-secondary">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control form-control-alternative" placeholder="Masukkan Nama Produk" required>
                    </div>
                    <div class="p-2 bg-secondary">
                        <label>Kategori</label>
                        <select class="form-control form-control-alternative" name="kategori" required>
                            <option>---Pilih Kategori---</option>
                            <?php
                            foreach ($kategori as $key => $value) {
                            ?>
                                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="p-2 bg-secondary">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control form-control-alternative" placeholder="Masukkan Harga Produk" required>
                    </div>
                    <div class="p-2 bg-secondary">
                        <label>Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control form-control-alternative" placeholder="Masukkan Deskripsi Produk" required>
                    </div>
                    <div class="p-2 bg-secondary">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control form-control-alternative" placeholder="Alternative input">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close(); ?>

    <!-- Modal Edit-->
    <?php
    foreach ($produk as $key => $value) {
    ?>
        <?php echo form_open_multipart('Admin/c_produk/edit_produk/' . $value->id_produk); ?>
        <div class="modal fade" id="edit<?= $value->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Edit Data Produk</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="p-2 bg-secondary">
                            <label>Nama</label>
                            <input type="text" name="nama" value="<?= $value->nama_produk ?>" class="form-control form-control-alternative" placeholder="Masukkan Nama Produk" required>
                        </div>
                        <div class="p-2 bg-secondary">
                            <label>Kategori</label>
                            <select class="form-control form-control-alternative" name="kategori">
                                <option>---Pilih Kategori---</option>
                                <?php
                                $id = $value->id_kategori;
                                echo $id;
                                foreach ($kategori as $key => $data) {
                                ?>
                                    <option <?php if ($data->id_kategori == $id) {
                                                echo 'selected="selected"';
                                            } ?> value="<?php echo $data->id_kategori ?>"><?= $data->nama_kategori ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="p-2 bg-secondary">
                            <label>Harga</label>
                            <input type="text" name="harga" value="<?= $value->harga ?>" class="form-control form-control-alternative" placeholder="Masukkan Harga Produk" required>
                        </div>
                        <div class="p-2 bg-secondary">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" value="<?= $value->deskripsi ?>" class="form-control form-control-alternative" placeholder="Masukkan Deskripsi Produk" required>
                        </div>
                        <div class="p-2 bg-secondary">
                            <label>Gambar</label>
                            <img src="<?= base_url() ?>asset/gambar/<?= $value->gambar ?>" name="gambar" style="width: 200px;">
                            <input type="file" name="gambar" value="<?= $value->gambar ?>" class="form-control form-control-alternative" placeholder="Alternative input">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
        echo form_close();
    }
    ?>


    <!-- Modal Hapus-->
    <?php
    foreach ($produk as $key => $value) {
    ?>
        <form action="<?= base_url('Admin/c_produk/hapus_produk/' . $value->id_produk) ?>" method="POST">
            <div class="modal fade" id="hapus<?= $value->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            Apakah Anda Yakin Untuk Menghapus Data Produk <strong><?= $value->nama_produk ?></strong>
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