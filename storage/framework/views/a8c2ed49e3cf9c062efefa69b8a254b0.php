

<?php $__env->startSection('isi'); ?>
<div class="container mt-5">
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header text-center">
            <h5>Form Input Data Barang Elektronik</h5>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('barang.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" name="nama_barang" required>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" name="kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php $__currentLoopData = $elektronik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($elt); ?>"><?php echo e($elt); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-control" name="harga" required>
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Upload Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master1', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\project_akhir\resources\views/elektro/input_data_barang.blade.php ENDPATH**/ ?>