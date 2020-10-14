-- mcu.spesialis_audiometri definition

-- Drop table

-- DROP TABLE mcu.spesialis_audiometri;

CREATE TABLE mcu.spesialis_audiometri (
	id_spesialis_audiometri serial NOT NULL,
	no_rekam_medik varchar(120) NOT NULL,
	no_daftar varchar NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	created_by int4 NULL,
	updated_by int4 NULL,
	ac_125_kanan varchar(10) NULL,
	ac_250_kanan varchar(10) NULL,
	ac_500_kanan varchar(10) NULL,
	ac_1000_kanan varchar(10) NULL,
	ac_2000_kanan varchar(10) NULL,
	ac_3000_kanan varchar(10) NULL,
	ac_4000_kanan varchar(10) NULL,
	ac_5000_kanan varchar(10) NULL,
	ac_6000_kanan varchar(10) NULL,
	ac_7000_kanan varchar(10) NULL,
	ac_8000_kanan varchar(10) NULL,
	bc_125_kanan varchar(10) NULL,
	bc_250_kanan varchar(10) NULL,
	bc_500_kanan varchar(10) NULL,
	bc_1000_kanan varchar(10) NULL,
	bc_2000_kanan varchar(10) NULL,
	bc_3000_kanan varchar(10) NULL,
	bc_4000_kanan varchar(10) NULL,
	bc_5000_kanan varchar(10) NULL,
	bc_6000_kanan varchar(10) NULL,
	bc_7000_kanan varchar(10) NULL,
	bc_8000_kanan varchar(10) NULL,
	ac_125_kiri varchar(10) NULL,
	ac_250_kiri varchar(10) NULL,
	ac_500_kiri varchar(10) NULL,
	ac_1000_kiri varchar(10) NULL,
	ac_2000_kiri varchar(10) NULL,
	ac_3000_kiri varchar(10) NULL,
	ac_4000_kiri varchar(10) NULL,
	ac_5000_kiri varchar(10) NULL,
	ac_6000_kiri varchar(10) NULL,
	ac_7000_kiri varchar(10) NULL,
	ac_8000_kiri varchar(10) NULL,
	bc_125_kiri varchar(10) NULL,
	bc_250_kiri varchar(10) NULL,
	bc_500_kiri varchar(10) NULL,
	bc_1000_kiri varchar(10) NULL,
	bc_2000_kiri varchar(10) NULL,
	bc_3000_kiri varchar(10) NULL,
	bc_4000_kiri varchar(10) NULL,
	bc_5000_kiri varchar(10) NULL,
	bc_6000_kiri varchar(10) NULL,
	bc_7000_kiri varchar(10) NULL,
	bc_8000_kiri varchar(10) NULL,
	kesimpulan_kanan varchar(30) NULL,
	kesimpulan_kiri varchar(30) NULL,
	kesimpulan text NULL,
	rata_kanan_ac varchar(30) NULL,
	rata_kanan_bc varchar(30) NULL,
	rata_kiri_ac varchar(30) NULL,
	rata_kiri_bc varchar(30) NULL,
	gambar text NULL,
	riwayat text NULL,
	kesan text NULL,
	status_pemeriksaan text NULL,
	CONSTRAINT spesialis_audiometri_pkey PRIMARY KEY (id_spesialis_audiometri)
);


-- mcu.spesialis_gigi definition

-- Drop table

-- DROP TABLE mcu.spesialis_gigi;

CREATE TABLE mcu.spesialis_gigi (
	id_spesialis_gigi serial NOT NULL,
	no_rekam_medik varchar(120) NOT NULL,
	no_daftar varchar NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	created_by int4 NULL,
	updated_by int4 NULL,
	g18 varchar(100) NULL,
	g17 varchar(100) NULL,
	g16 varchar(100) NULL,
	g15 varchar(100) NULL,
	g14 varchar(100) NULL,
	g13 varchar(100) NULL,
	g12 varchar(100) NULL,
	g11 varchar(100) NULL,
	g21 varchar(100) NULL,
	g22 varchar(100) NULL,
	g23 varchar(100) NULL,
	g24 varchar(100) NULL,
	g25 varchar(100) NULL,
	g26 varchar(100) NULL,
	g27 varchar(100) NULL,
	g28 varchar(100) NULL,
	g38 varchar(100) NULL,
	g37 varchar(100) NULL,
	g36 varchar(100) NULL,
	g35 varchar(100) NULL,
	g34 varchar(100) NULL,
	g33 varchar(100) NULL,
	g32 varchar(100) NULL,
	g31 varchar(100) NULL,
	g41 varchar(100) NULL,
	g42 varchar(100) NULL,
	g43 varchar(100) NULL,
	g44 varchar(100) NULL,
	g45 varchar(100) NULL,
	g46 varchar(100) NULL,
	g47 varchar(100) NULL,
	g48 varchar(100) NULL,
	oklusi varchar(30) NULL,
	torus_palatinus varchar(30) NULL,
	torus_mandibularis varchar(30) NULL,
	palatum varchar(30) NULL,
	supernumerary_teeth varchar(30) NULL,
	diastema varchar(30) NULL,
	spacing varchar(30) NULL,
	oral_hygiene varchar(30) NULL,
	gingiva_periodontal varchar(30) NULL,
	oral_mucosa varchar(30) NULL,
	tongue varchar(30) NULL,
	lain_lain text NULL,
	kesimpulan text NULL,
	saran text NULL,
	riwayat text NULL,
	kesan text NULL,
	status_pemeriksaan text NULL,
	CONSTRAINT spesialis_gigi_pkey PRIMARY KEY (id_spesialis_gigi)
);


-- mcu.spesialis_mata definition

-- Drop table

-- DROP TABLE mcu.spesialis_mata;

CREATE TABLE mcu.spesialis_mata (
	id_spesialis_mata serial NOT NULL,
	no_rekam_medik varchar(120) NOT NULL,
	no_daftar varchar NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	created_by int4 NULL,
	updated_by int4 NULL,
	persepsi_warna_mata_kanan varchar(70) NULL,
	persepsi_warna_mata_kiri varchar(70) NULL,
	kelopak_mata_kanan varchar(70) NULL,
	kelopak_mata_kiri varchar(70) NULL,
	konjungtiva_mata_kanan varchar(70) NULL,
	konjungtiva_mata_kiri varchar(70) NULL,
	kesegarisan_gerak_bola_mata_kanan varchar(70) NULL,
	kesegarisan_gerak_bola_mata_kiri varchar(70) NULL,
	skiera_mata_kanan varchar(70) NULL,
	skiera_mata_kiri varchar(70) NULL,
	lensa_mata_kanan varchar(70) NULL,
	lensa_mata_kiri varchar(70) NULL,
	kornea_mata_kanan varchar(70) NULL,
	kornea_mata_kiri varchar(70) NULL,
	bulu_mata_kanan varchar(70) NULL,
	bulu_mata_kiri varchar(70) NULL,
	tekanan_bola_mata_kanan varchar(70) NULL,
	tekanan_bola_mata_kiri varchar(70) NULL,
	penglihatan_3_dimensi_mata_kanan varchar(70) NULL,
	penglihatan_3_dimensi_mata_kiri varchar(70) NULL,
	virus_mata_tanpa_koreksi_mata_kanan varchar(70) NULL,
	virus_mata_tanpa_koreksi_mata_kiri varchar(70) NULL,
	virus_mata_dengan_koreksi_mata_kanan varchar(70) NULL,
	virus_mata_dengan_koreksi_mata_kiri varchar(70) NULL,
	lain_lain text NULL,
	kesimpulan text NULL,
	riwayat text NULL,
	kesan text NULL,
	status_pemeriksaan text NULL,
	CONSTRAINT spesialis_mata_pkey PRIMARY KEY (id_spesialis_mata)
);


-- mcu.spesialis_tht definition

-- Drop table

-- DROP TABLE mcu.spesialis_tht;

CREATE TABLE mcu.spesialis_tht (
	id_spesialis_tht serial NOT NULL,
	no_rekam_medik varchar(120) NOT NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	created_by int4 NULL,
	updated_by int4 NULL,
	tl_daun_telinga_kanan varchar(70) NULL,
	tl_daun_telinga_kiri varchar(70) NULL,
	tl_liang_telinga_kanan varchar(70) NULL,
	tl_liang_telinga_kiri varchar(70) NULL,
	tl_serumen_telinga_kanan varchar(70) NULL,
	tl_serumen_telinga_kiri varchar(70) NULL,
	tl_membrana_timpani_telinga_kanan varchar(70) NULL,
	tl_membrana_timpani_telinga_kiri varchar(70) NULL,
	tl_test_berbisik_telinga_kanan varchar(70) NULL,
	tl_test_berbisik_telinga_kiri varchar(70) NULL,
	tl_test_berbisik_telinga_kanan_6 varchar(70) NULL,
	tl_test_berbisik_telinga_kiri_6 varchar(70) NULL,
	tl_test_berbisik_telinga_kanan_4 varchar(70) NULL,
	tl_test_berbisik_telinga_kiri_4 varchar(70) NULL,
	tl_test_berbisik_telinga_kanan_3 varchar(70) NULL,
	tl_test_berbisik_telinga_kiri_3 varchar(70) NULL,
	tl_test_berbisik_telinga_kanan_1 varchar(70) NULL,
	tl_test_berbisik_telinga_kiri_1 varchar(70) NULL,
	tl_test_garpu_tala_rinne_telinga_kanan varchar(70) NULL,
	tl_test_garpu_tala_rinne_telinga_kiri varchar(70) NULL,
	tl_weber_telinga_kanan varchar(70) NULL,
	tl_weber_telinga_kiri varchar(70) NULL,
	tl_swabach_telinga_kanan varchar(70) NULL,
	tl_swabach_telinga_kiri varchar(70) NULL,
	tl_bing_telinga_kanan varchar(70) NULL,
	tl_bing_telinga_kiri varchar(70) NULL,
	tl_lain_lain varchar(70) NULL,
	hd_meatus_nasi varchar(70) NULL,
	hd_septum_nasi varchar(70) NULL,
	hd_septum_nasi_lainnya varchar(70) NULL,
	hd_konka_nasal varchar(70) NULL,
	hd_konka_nasal_lainnya varchar(70) NULL,
	hd_nyeri_ketok_sinus_maksilar varchar(70) NULL,
	hd_nyeri_ketok_sinus_maksilar_lainnya varchar(70) NULL,
	hd_penciuman varchar(70) NULL,
	hd_lain_lain varchar(70) NULL,
	tg_pharynx varchar(70) NULL,
	tg_tonsil_kanan varchar(70) NULL,
	tg_tonsil_kiri varchar(70) NULL,
	tg_ukuran_kanan varchar(70) NULL,
	tg_ukuran_kiri varchar(70) NULL,
	tg_palatum varchar(70) NULL,
	tg_lain_lain varchar(70) NULL,
	audiometri text NULL,
	kesimpulan text NULL,
	riwayat text NULL,
	CONSTRAINT spesialis_tht_pkey PRIMARY KEY (id_spesialis_tht)
);


-- mcu.spesialis_tht_berbisik definition

-- Drop table

-- DROP TABLE mcu.spesialis_tht_berbisik;

CREATE TABLE mcu.spesialis_tht_berbisik (
	id_spesialis_tht_berbisik serial NOT NULL,
	no_rekam_medik varchar(120) NOT NULL,
	no_daftar varchar NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	created_by int4 NULL,
	updated_by int4 NULL,
	tl_test_berbisik_telinga_kanan varchar(70) NULL,
	tl_test_berbisik_telinga_kiri varchar(70) NULL,
	tl_test_berbisik_telinga_kanan_6 varchar(70) NULL,
	tl_test_berbisik_telinga_kiri_6 varchar(70) NULL,
	tl_test_berbisik_telinga_kanan_4 varchar(70) NULL,
	tl_test_berbisik_telinga_kiri_4 varchar(70) NULL,
	tl_test_berbisik_telinga_kanan_3 varchar(70) NULL,
	tl_test_berbisik_telinga_kiri_3 varchar(70) NULL,
	tl_test_berbisik_telinga_kanan_1 varchar(70) NULL,
	tl_test_berbisik_telinga_kiri_1 varchar(70) NULL,
	kesimpulan text NULL,
	riwayat text NULL,
	kesan text NULL,
	tl_test_berbisik_telinga_kanan_option varchar(70) NULL,
	tl_test_berbisik_telinga_kiri_option varchar(70) NULL,
	status_pemeriksaan text NULL,
	CONSTRAINT spesialis_tht_berbisik_pkey PRIMARY KEY (id_spesialis_tht_berbisik)
);


-- mcu.spesialis_tht_garpu_tala definition

-- Drop table

-- DROP TABLE mcu.spesialis_tht_garpu_tala;

CREATE TABLE mcu.spesialis_tht_garpu_tala (
	id_spesialis_tht_garpu_tala serial NOT NULL,
	no_rekam_medik varchar(120) NOT NULL,
	no_daftar varchar NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	created_by int4 NULL,
	updated_by int4 NULL,
	tl_test_garpu_tala_rinne_telinga_kanan varchar(70) NULL,
	tl_test_garpu_tala_rinne_telinga_kiri varchar(70) NULL,
	tl_weber_telinga_kanan varchar(70) NULL,
	tl_weber_telinga_kiri varchar(70) NULL,
	tl_swabach_telinga_kanan varchar(70) NULL,
	tl_swabach_telinga_kiri varchar(70) NULL,
	tl_bing_telinga_kanan varchar(70) NULL,
	tl_bing_telinga_kiri varchar(70) NULL,
	kesimpulan text NULL,
	riwayat text NULL,
	kesan text NULL,
	status_pemeriksaan text NULL,
	CONSTRAINT spesialis_tht_garpu_tala_pkey PRIMARY KEY (id_spesialis_tht_garpu_tala)
);