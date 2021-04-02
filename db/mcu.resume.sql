-- mcu.resume definition

-- Drop table

-- DROP TABLE mcu.resume;

CREATE TABLE mcu.resume (
	id_resume serial NOT NULL,
	no_rekam_medik varchar(120) NOT NULL,
	no_daftar varchar NULL,
	created_at timestamp NULL,
	updated_at timestamp NULL,
	created_by int4 NULL,
	updated_by int4 NULL,
	jenis_pemeriksaan varchar(100) NOT NULL DEFAULT 'FISIK'::character varying,
	tidak_normal text NOT NULL,
	riwayat text NULL,
	CONSTRAINT resume_pkey PRIMARY KEY (id_resume)
);