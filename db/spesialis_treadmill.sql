-- mcu.spesialis_treadmill definition

-- Drop table

-- DROP TABLE mcu.spesialis_treadmill;

CREATE TABLE mcu.spesialis_treadmill (
	id_spesialis_treadmill serial NOT NULL,
	no_rekam_medik varchar(120) NOT NULL,
	no_daftar varchar NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	created_by int4 NULL,
	updated_by int4 NULL,
	permintaan varchar NULL,
	metode varchar NULL,
	lama_latihan varchar NULL,
	test_dihentikan_karena varchar NULL,
	dj_maksimal varchar NULL,
	td_maksimal varchar NULL,
	ekg_istirahat varchar NULL,
	ekg_latihan varchar NULL,
	ekg_pemulihan varchar NULL,
	tingkat_kesegaran_jasmani varchar NULL,
	kelas_fungsional varchar NULL,
	kapasitas_aerobik varchar NULL,
	respon_hemodinamik varchar NULL,
	respon_iskemik text NULL,
	anjuran text NULL,
	riwayat text NULL,
	kesan text NULL,
	status_pemeriksaan text NULL,
	CONSTRAINT spesialis_treadmill_pkey PRIMARY KEY (id_spesialis_treadmill)
);