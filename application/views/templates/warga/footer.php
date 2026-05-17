      </div>
    </section>
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2026 Sistem RW Online.</strong>
  </footer>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $(function () {
    <?php if ($this->session->flashdata('success')): ?>
      Swal.fire({ icon: 'success', title: 'Berhasil', text: '<?= $this->session->flashdata('success'); ?>' });
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
      Swal.fire({ icon: 'error', title: 'Gagal', text: '<?= $this->session->flashdata('error'); ?>' });
    <?php endif; ?>
  });
</script>
</body>
</html>
