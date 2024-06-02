<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
</head>
<body>
    <div class="container">
        <h1><?= $judul; ?></h1>
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aktif Sejak</th>
                    <th>No Pinjam</th>
                    <th>ID Buku</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= isset($user['nama']) ? $user['nama'] : ''; ?></td>
                            <td><?= isset($user['email']) ? $user['email'] : ''; ?></td>
                            <td><?= isset($user['role']) ? $user['role'] : ''; ?></td>
                            <td><?= isset($user['date_created']) ? date('d F Y', $user['date_created']) : ''; ?></td>
                            <td><?= isset($user['no_pinjam']) ? $user['no_pinjam'] : 'N/A'; ?></td>
                            <td><?= isset($user['id_buku']) ? $user['id_buku'] : 'N/A'; ?></td>
                            <td><?= isset($user['judul_buku']) ? $user['judul_buku'] : 'N/A'; ?></td>
                            <td><?= isset($user['tanggal_pinjam']) ? date('d F Y', strtotime($user['tanggal_pinjam'])) : 'N/A'; ?></td>
                            <td><?= isset($user['tanggal_kembali']) ? date('d F Y', strtotime($user['tanggal_kembali'])) : 'N/A'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="10">Tidak ada data pengguna.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
