<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Profil Saya</h3>
            </div>
            <form action="<?= base_url('warga/profil'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <?php if ($w['foto']): ?>
                            <img src="<?= base_url('uploads/warga/' . $w['foto']); ?>" class="img-circle elevation-2" style="width: 150px; height: 150px; object-fit: cover;" alt="Foto Profil">
                        <?php else: ?>
                            <i class="fas fa-user-circle fa-7x text-primary"></i>
                        <?php endif; ?>
                        <div class="mt-2">
                            <label for="foto" class="btn btn-outline-primary btn-sm">Ubah Foto Profil</label>
                            <input type="file" name="foto" id="foto" class="d-none">
                            <br><small class="text-muted">Format: JPG, PNG, JPEG. Max 2MB.</small>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" value="<?= $w['nik']; ?>" readonly>
                                <small class="text-muted">NIK tidak dapat diubah sendiri.</small>
                            </div>
                            <div class="form-group">
                                <label>No KK</label>
                                <input type="text" class="form-control" value="<?= $w['no_kk']; ?>" readonly>
                                <small class="text-muted">No KK tidak dapat diubah sendiri.</small>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="<?= $w['nama_lengkap']; ?>" required>
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
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" rows="2"><?= $w['alamat']; ?></textarea>
                    </div>
                    <div class="row">
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
                    </div>
                    <div class="row">
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
                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="text" name="no_hp" class="form-control" value="<?= $w['no_hp']; ?>">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan Profil</button>
                </div>
            </form>
        </div>
    </div>
</div>
