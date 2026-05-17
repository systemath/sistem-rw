<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Form Edit Warga: <?= $w['nama_lengkap']; ?></h3>
            </div>
            <form action="<?= base_url('admin/warga/edit/'.$w['id']); ?>" method="post">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" value="<?= $w['nik']; ?>" readonly>
                                <small class="text-muted">NIK tidak dapat diubah.</small>
                            </div>
                            <div class="form-group">
                                <label>No KK</label>
                                <input type="text" name="no_kk" class="form-control" value="<?= $w['no_kk']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" class="form-control" required value="<?= $w['nama_lengkap']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" class="form-control" value="<?= $w['tempat_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" class="form-control" value="<?= $w['tanggal_lahir']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="L" <?= ($w['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="P" <?= ($w['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <select name="agama" class="form-control">
                                    <option value="Islam" <?= ($w['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                                    <option value="Kristen" <?= ($w['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                                    <option value="Katolik" <?= ($w['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
                                    <option value="Hindu" <?= ($w['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                                    <option value="Budha" <?= ($w['agama'] == 'Budha') ? 'selected' : ''; ?>>Budha</option>
                                    <option value="Konghucu" <?= ($w['agama'] == 'Konghucu') ? 'selected' : ''; ?>>Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status Perkawinan</label>
                                <select name="status_perkawinan" class="form-control">
                                    <option value="Belum Kawin" <?= ($w['status_perkawinan'] == 'Belum Kawin') ? 'selected' : ''; ?>>Belum Kawin</option>
                                    <option value="Kawin" <?= ($w['status_perkawinan'] == 'Kawin') ? 'selected' : ''; ?>>Kawin</option>
                                    <option value="Cerai Hidup" <?= ($w['status_perkawinan'] == 'Cerai Hidup') ? 'selected' : ''; ?>>Cerai Hidup</option>
                                    <option value="Cerai Mati" <?= ($w['status_perkawinan'] == 'Cerai Mati') ? 'selected' : ''; ?>>Cerai Mati</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control" value="<?= $w['pekerjaan']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Kewarganegaraan</label>
                                <input type="text" name="kewarganegaraan" class="form-control" value="<?= $w['kewarganegaraan']; ?>">
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="text" name="no_hp" class="form-control" value="<?= $w['no_hp']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Status Warga</label>
                                <select name="status_warga" class="form-control">
                                    <option value="Tetap" <?= ($w['status_warga'] == 'Tetap') ? 'selected' : ''; ?>>Tetap</option>
                                    <option value="Kontrak" <?= ($w['status_warga'] == 'Kontrak') ? 'selected' : ''; ?>>Kontrak</option>
                                    <option value="Kost" <?= ($w['status_warga'] == 'Kost') ? 'selected' : ''; ?>>Kost</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" rows="2"><?= $w['alamat']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>RT</label>
                                <input type="text" name="rt" class="form-control" value="<?= $w['rt']; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>RW</label>
                                <input type="text" name="rw" class="form-control" value="<?= $w['rw']; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kelurahan/Desa</label>
                                <input type="text" name="kelurahan" class="form-control" value="<?= $w['kelurahan']; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" value="<?= $w['kecamatan']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kabupaten/Kota</label>
                                <input type="text" name="kabupaten" class="form-control" value="<?= $w['kabupaten']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <input type="text" name="provinsi" class="form-control" value="<?= $w['provinsi']; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control" value="<?= $w['kode_pos']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Update Data</button>
                    <a href="<?= base_url('admin/warga'); ?>" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
