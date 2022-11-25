SELECT 
	t1.id AS id,
	t1.nip AS nip,
	t1.nama_lengkap AS nama_lengkap,
	max_jabatan.jabatan AS jabatan1,
	t2.tanggal_absen AS tanggal_absen,
	t2.jam_masuk AS jam_masuk,
	t2.jam_pulang AS jam_pulang,
	t1.`aktif` AS aktif
FROM kajiberkat.biodata_pegawai AS t1
LEFT JOIN kajiberkat.presensi AS t2 ON t2.id_pegawai=t1.id AND t2.tanggal_absen='2022-11-02'
LEFT JOIN
	(SELECT 
			kajiberkat.jabatan3.id_pegawai AS id_pegawai,
			kajiberkat.jabatan3.nip_pegawai AS nip_pegawai,
			MAX(kajiberkat.jabatan3.jabatan) AS jabatan
	FROM kajiberkat.jabatan3 GROUP BY kajiberkat.jabatan3.id_pegawai) AS max_jabatan
ON max_jabatan.id_pegawai=t1.id
ORDER BY max_jabatan.jabatan, t1.id