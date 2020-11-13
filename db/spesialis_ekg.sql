-- mcu.spesialis_ekg definition

-- Drop table

-- DROP TABLE mcu.spesialis_ekg;

CREATE TABLE mcu.spesialis_ekg (
	id_spesialis_ekg serial NOT NULL,
	no_rekam_medik varchar(120) NOT NULL,
	no_daftar varchar NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	created_by int4 NULL,
	updated_by int4 NULL,
	irama_jantung varchar NULL,
	frekuensi_denyut_jantung varchar NULL,
	gelombang_p varchar NULL,
	interval_pr varchar NULL,
	kompleks_qrs varchar NULL,
	segmen_st varchar NULL,
	gelombang_t varchar NULL,
	lain_lain varchar NULL,
	kesan_ekg_istirahat varchar NULL,
	anjuran text NULL,
	riwayat text NULL,
	kesan text NULL,
	status_pemeriksaan text NULL,
	CONSTRAINT spesialis_ekg_pkey PRIMARY KEY (id_spesialis_ekg)
);